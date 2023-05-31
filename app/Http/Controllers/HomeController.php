<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\AddressDestination;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\City;
use App\Models\Payment;
use App\Models\Pesanan;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\ProductList;
use App\Models\Province;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Product::all();
        return view('pages.frontend.beranda', $produk);
    }
    public function produk($id)
    {
        $produk = Product::find($id);
        $list = $produk->id;
        $produkdetail = Product::with(['list.productitem'])->where('id', '=',$id)->firstOrFail();

        $cart = Cart::with(['item','listitem'])->get();
        // dd($cart);
        // foreach ($produk as $value) {
        //     if ($value->list->id == $value->item->product_lists_id) {
        //         # code...
        //     }
        // }

        // $produklist = ProductList::with(['product', 'productitem'])->where('products_id', '=', $list)->first();
        // foreach ($produklist as $key => $value) {
        //     dd($value);
        // }
        // $listproduk = $produklist->id;

        $itemproduk = ProductItem::with('product','productlist')->where('products_id', '=', $list)->paginate(5);

        return view('pages.frontend.produk', compact('itemproduk', 'produkdetail', 'cart'));
    }
    public function addCart(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->all();
        $user = Auth::user()->id;
        $data = [
            'users_id' => $user,
            'product_lists_id' => $request->product,
            'product_items_id' => $request->item,
            'qty' => $request->qty,
            'price' => $request->price
        ];
        // dd($data);
        Cart::create($data);

        // $dataa = $request->qty;
        // $pro = $request->product;
        // $data = ProductItem::findOrFail($id);

        // $cart = session()->get('cart', []);

        // if(isset($cart[$id])) {
        //     $cart[$id]['qty']++;
        // }  else {
        //     $cart[$id] = [
        //         "product" => $pro,
        //         "name" => $data->name,
        //         "thumbnail" => $data->thumbnail,
        //         "price" => $data->price,
        //         "qty" => $dataa
        //     ];
        // }
        //  session()->put('cart', $cart);
         return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
    public function keranjang($id)
    {
        $carts = Cart::with(['item', 'listitem'])->where('users_id', '=', Auth::user()->id)->get();
        $detail = CartDetail::with(['user', 'cart.item', 'cart.listitem'])->where('users_id', Auth::user()->id)->get()->toArray();
        // dd($carts, $detail);
        return view('pages.frontend.keranjang', compact('carts', 'detail'));
    }
    public function remove($id)
    {
        // dd($id);
        Cart::find($id)->delete();
        return response()->json([
            'success', 'Keranjang berhasil dihapus!'
        ], 200);
    }
    public function updatecart(Request $request, $id)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // if($request->id && $request->qty){
        //     $cart = session()->get('cart');
        //     $cart[$request->id]["quantity"] = $request->qty;
        //     session()->put('cart', $cart);
        //     session()->flash('success', 'Cart successfully updated!');
        // }
        Cart::where('id', $id)->update([
            'qty' => $quantity
        ]);
        return redirect()->back()->with('success', 'Keranjang berhasil diupdate!');
    }

    public function updateprice(Request $request)
    {

        // $cart = Cart::find($id);
        // $qty = $cart->qty + 1;
        // $cart->update($qty);
    }


    // MULTIPLE PRODUCT
    public function prosescheckout(Request $request, $id)
    {

        if (!empty($request->status)) {

            $check_array = $request->status;

            $check = Cart::with(['item', 'user','listitem'])->whereIn('id', $check_array)->get()->toArray();
            $idCart = CartDetail::with(['cart.item'])->whereIn('carts_id', $check_array)->get()->toArray();
            // dd($id);
            if ($idCart == true) {
                // $data = [];
                for ($i=0; $i < sizeof($check) ; $i++) {
                    $da = array(
                        'users_id' => Auth::user()->id,
                        'carts_id' => $check_array[$i],
                        'qty' => $check[$i]['qty'],
                        'weight' => $check[$i]['item']['weight'] * $check[$i]['qty'],
                        'price' => $check[$i]['price'] * $check[$i]['qty']
                    );
                    // dd($da);
                    DB::table('cart_detail')->where('carts_id', $da['carts_id'])->update($da);

                    // dd($item);

                    // array_push($data, $da);
                }
                // dd($idCart, $data);

                // if ($data == $idCart) {
                //     DB::table('cart_detail')->update($data);
                // } else {
                //     DB::table('cart_detail')->ins($data);

                // }
                return redirect()->route('checkout', $id);

                // DB::table('cart_detail')->update($data);
                // return redirect()->back()->with('error', 'Produk '. $idCart[0]['cart']['item']['name'] .' sudah didalam! Hapus keranjang terlebih dahulu');
            } else {
                for ($i=0; $i < sizeof($check) ; $i++) {
                    $data = array(
                        'users_id' => Auth::user()->id,
                        'carts_id' => $check_array[$i],
                        'qty' => $check[$i]['qty'],
                        'weight' => $check[$i]['item']['weight'] * $check[$i]['qty'],
                        'price' => $check[$i]['price'] * $check[$i]['qty']
                    );
                    DB::table('cart_detail')->insert($data);
                }
            }
            return redirect()->route('checkout', $id);
        } else {
            request()->status = '';
        }

            return redirect()->route('checkout', $id);
    }



    // SINGLE PRODUCT
    public function checkoutBeli(Request $request, $id)
    {
        $itemproduk = ProductItem::with('product','productlist')->find($id);
        // dd($request->all(), $itemproduk);
        $total = $itemproduk->price * $request->qty_two;
        $qty = $request->qty_two;
        $user = $request->user_id;
        $weight = $itemproduk->weight * $qty;

        // dd($total, $qty, $user, $weight);
        $addressOrigin = Address::with(['province.citi', 'city'])->first();
        $addressDestination = User::with(['province.citi', 'city'])->find($user);

        // dd($addressOrigin, $addressDestination);
        $destinasi = $addressDestination->cities_id;
        $origin = $addressOrigin->cities_id;
        $provinces = Province::get();

        // dd($destinasi, $origin, $provinces);
        $responseCity = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destinasi,
            'weight' => $weight,
            'courier' => 'jne'
        ]);
        $data = json_decode($responseCost, true);

        // return response()->json([$itemproduk, $total, $qty, $user]);
        return view('pages.frontend.single-checkout', compact('itemproduk','total', 'qty', 'user', 'addressDestination', 'destinasi','provinces', 'data'));
    }
    public function singleCheckout(Request $request, $id)
    {
        dd($request->all());
        $itemproduk = ProductItem::with('product','productlist')->find($request->id);
        $total = $itemproduk->price * $request->qty;
        $qty = $request->qty;
        $user = $request->user_id;
        $weight = $itemproduk->weight * $qty;

        $addressOrigin = Address::with(['province.citi', 'city'])->first();
        $addressDestination = User::with(['province.citi', 'city'])->find($user);

        $destinasi = $addressDestination->cities_id;
        $origin = $addressOrigin->cities_id;
        $provinces = Province::get();

        $responseCity = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destinasi,
            'weight' => $weight,
            'courier' => 'jne'
        ]);
        $data = json_decode($responseCost, true);

        // return response()->json([$itemproduk, $total, $qty, $user]);
        return view('pages.frontend.single-checkout', compact('itemproduk','total', 'qty', 'user', 'addressDestination', 'destinasi','provinces', 'data'));
    }

    // HALAMAN CHECKOUT
    public function checkout(Request $request, $id)
    {
        $addressOrigin = Address::with(['province.citi', 'city'])->first();
        $addressDestination = User::with(['province.citi', 'city'])->find($id);
        $destinasi = $addressDestination->cities_id;
        // dd($addressDestination);
        $origin = $addressOrigin->cities_id;

        $cart = Cart::with(['item', 'listitem'])->where('users_id', '=', Auth::user()->id)->get();

        $detail = CartDetail::with(['user', 'cart.item', 'cart.listitem'])->where('users_id', Auth::user()->id)->get()->toArray();
        $weight = CartDetail::with(['user', 'cart.item', 'cart.listitem'])->where('users_id', Auth::user()->id)->get()->sum('weight');
        // dd($detail);

        // $weight = [];
        // for ($i=0; $i < sizeof($detail) ; $i++) {
        //         $weight[$i] = ($detail[$i]['weight'] * $detail[$i]['cart']['qty']);
        //     }
        // foreach ($detail as $value) {
        //     $weight = $value;

        // }

        $provinces = Province::get();

        $responseCity = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destinasi,
            'weight' => $weight,
            'courier' => 'jne'
        ]);
        $data = json_decode($responseCost, true);
        // dd($destinasi);

        return view('pages.frontend.checkout', compact('cart','detail', 'addressDestination', 'destinasi','provinces', 'data'));
    }

    public function getCity($id)
    {
        $city = City::where('provinces_id', $id)->pluck('title', 'id');
        return response()->json($city);
    }

    // Multiple ONGKIR
    public function getOngkir($id)
    {
        $addressOrigin = Address::with(['province.citi', 'city'])->first();
        $addressDestination = User::with(['province.citi', 'city'])->find(Auth::user()->id);
        $destinasi = $addressDestination->cities_id;
        $origin = $addressOrigin->cities_id;

        $weight = CartDetail::with(['user', 'cart.item', 'cart.listitem'])->where('users_id', Auth::user()->id)->get()->sum('weight');

        $provinces = Province::get();

        $responseCity = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destinasi,
            'weight' => $weight,
            'courier' => $id
        ]);
        $data = json_decode($responseCost, true);
        return response()->json($data);
    }

    // Single ONGKIR
    public function singleOngkir($ongkir, $id, $qty)
    {
        // dd($ongkir, $qty, $id);
        $addressOrigin = Address::with(['province.citi', 'city'])->first();
        $addressDestination = User::with(['province.citi', 'city'])->find(Auth::user()->id);
        $destinasi = $addressDestination->cities_id;
        $origin = $addressOrigin->cities_id;

        $itemproduk = ProductItem::with('product','productlist')->find($id);
        $weight = $itemproduk->weight * $qty;
        // $weight = CartDetail::with(['user', 'cart.item', 'cart.listitem'])->where('id', Auth::user()->id)->get()->sum('weight');
        // dd($weight);

        $provinces = Province::get();

        $responseCity = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destinasi,
            'weight' => $weight,
            'courier' => $ongkir
        ]);
        $data = json_decode($responseCost, true);
        return response()->json($data);
    }

    public function singleCekongkir(Request $request, $id)
    {
        // dd($request->all());
        $addressOrigin = Address::with(['province.citi', 'city'])->first();
        $addressDestination = User::with(['province.citi', 'city'])->find(Auth::user()->id);
        $destinasi = $addressDestination->cities_id;
        $origin = $addressOrigin->cities_id;
        // dd($addressDestination, $addressOrigin, $origin, $destinasi);

        $itemproduk = ProductItem::with('product','productlist')->find($id);
        $qty = $request->qty;
        $total = $itemproduk->price * $qty;
        $weight = $itemproduk->weight * $request->qty;
        // $weight = CartDetail::with(['user', 'cart.item', 'cart.listitem'])->where('id', Auth::user()->id)->get()->sum('weight');
        // dd($total);

        $provinces = Province::get();

        $responseCity = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destinasi,
            'weight' => $weight,
            'courier' => $request->pengiriman
        ]);
        $data = json_decode($responseCost, true);
        $cek = $data['rajaongkir']['results'][0]['costs'];
        $ongkos = [];
        for ($i=0; $i < sizeof($cek) ; $i++) {
          if ($cek[$i]['service'] == $request->kurir) {
                $get = $cek[$i];
                array_push($ongkos, $get);
          }
        }
        // dd($ongkos);
        $kurir = strtoupper($data['rajaongkir']['results'][0]['code']);
        $kode_kurir = $ongkos[0]['description'];
        // dd($kurir, $kode_kurir);
        return view('pages.frontend.single-checkout', compact(
        'itemproduk','total', 'qty','addressDestination', 'destinasi',
        'kurir', 'kode_kurir', 'provinces', 'data', 'ongkos'));
    }

    // MULTIPLE ONGKIR
    public function cekOngkir(Request $request, $id)
    {
        $addressOrigin = Address::with(['province.citi', 'city'])->first();
        $addressDestination = User::with(['province.citi', 'city'])->find(Auth::user()->id);
        $destinasi = $addressDestination->cities_id;
        $origin = $addressOrigin->cities_id;

        $cart = Cart::with(['item', 'listitem'])->where('users_id', '=', Auth::user()->id)->get();

        $detail = CartDetail::with(['user', 'cart.item', 'cart.listitem'])->where('users_id', Auth::user()->id)->get()->toArray();

        $weight = CartDetail::with(['user', 'cart.item', 'cart.listitem'])->where('users_id', Auth::user()->id)->get()->sum('weight');

        $provinces = Province::get();

        $responseCity = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destinasi,
            'weight' => $weight,
            'courier' => $request->pengiriman
        ]);
        $data = json_decode($responseCost, true);
        $cek = $data['rajaongkir']['results'][0]['costs'];
        $ongkos = [];
        for ($i=0; $i < sizeof($cek) ; $i++) {
          if ($cek[$i]['service'] == $request->kurir) {
                $get = $cek[$i];
                array_push($ongkos, $get);
          }
        }
        $kurir = strtoupper($data['rajaongkir']['results'][0]['code']);
        $kode_kurir = $ongkos[0]['description'];
        // dd($kurir, $kode_kurir);
        return view('pages.frontend.cekongkir', compact('cart','detail', 'addressDestination', 'destinasi',
        'kurir', 'kode_kurir', 'provinces', 'data', 'ongkos'));
    }

    public function updatealamat(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $data = [
            'provinces_id' => $request->provinces_id,
            'cities_id' => $request->cities_id,
            'alamat' => $request->alamat
        ];
        $item->update($data);
        return redirect()->route('checkout', $id);
    }

    //MULTIPLE PAYMENT
    public function payment(Request $request, $id)
    {
        // dd($request->all());
        $user = User::with(['cart.item', 'detail.cart.item'])->where('id', $id)->get()->toArray();

        $pes = Pesanan::where('users_id', Auth::user()->id)->first();
        $pesanan = [
            'users_id' => Auth::user()->id,
            'tanggal_pesanan' => Carbon::now()
        ];
        $pesanan = Pesanan::create($pesanan);

        // dd($pesanan->id);
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg,gif',
        ]);
        $image = $request->file('image')->store('public/backend/bukti_bayar');

        for ($i=0; $i < sizeof($user) ; $i++) {
            $product = array();
            foreach ($user[$i]['detail'] as  $value) {
                $product[] = $value['cart']['item']['id'];
            }
            $detail = array();
            foreach ($user[$i]['detail'] as  $value) {
                $detail[] = $value['qty'];
            }
        }

            $implode = implode(',', $product);
            $implodeDetail = implode(',', $detail);


            $data = array(
                'users_id' => Auth::user()->id,
                'product_items_id' => $implode,
                'pesanans_id' => $pesanan->id,
                'price_total' => $request->price_total,
                'image' => $image,
                'status' => 0,
                'kurir' => $request->kurir,
                'ongkir' => $request->ongkir
            );

            $payment = Payment::create($data);

           $item = ProductItem::with(['cart.detail'])->whereIn('id', $product)->get();


           $kuan = $request->qty;

        //    $prod_up = array();

        for ($i=0; $i < sizeof($item); $i++) {
            //    dd($kuan[$i]);
                $data2 = array (
                    'users_id' => Auth::user()->id,
                    'product_items_id' => $item[$i]['id'],
                    'payments_id' => $payment['id'],
                    'qty' => $kuan[$i]
                );
                $dataitem = [
                    'products_id' => $item[$i]['products_id'],
                    'product_lists_id' => $item[$i]['product_lists_id'],
                    'thumbnail' => $item[$i]['thumbnail'],
                    'name' => $item[$i]['name'],
                    'price' => $item[$i]['price'],
                    'description' => $item[$i]['description'],
                    'stock' => $item[$i]['stock'] - $data2['qty'] ,
                    'weight' => $item[$i]['weight'],
                    'isi' => $item[$i]['isi'],
                    'jenis' => $item[$i]['jenis'],
                ];
                $a = $item[$i]->update($dataitem);
                // dd($a);
                DB::table('payment_details')->insert($data2);
                // dd($a);
                // $prod_up = [
                //     'id' => $item[$i]['id'],
                //     'products_id' => $item[$i]['products_id'],
                //     'product_lists_id' => $item[$i]['product_lists_id'],
                //     'thumbnail' => $item[$i]['thumbnail'],
                //     'name' => $item[$i]['name'],
                //     'description' => $item[$i]['description'],
                //     'price' => $item[$i]['price'],
                //     'stock' => $item[$i]['stock'],
                //     'weight' => $item[$i]['weight'],
                //     'qty' => $kuan[$i],
                //     'isi' => $item[$i]['isi'],
                //     'jenis' => $item[$i]['jenis']
                // ];
                // DB::table('product_items')->update($prod_up);
            // $aaa = DB::table('product_items')->update($prod_up);
            // dd($item);

            // for ($i=0; $i < sizeof($item); $i++) {
            // $prod_up = array();
            // foreach ($hasil as $value) {
            //     // for ($i=0; $i < sizeof($item); $i++) {
            //     //     dd($value[$i]['name']);
            //     // }
            //         $prod_up = [
            //             'products_id' => $item[$value]['products_id'],
            //             'product_lists_id' => $item[$value]['product_lists_id'],
            //             'thumbnail' => $item[$value]['thumbnail'],
            //             'name' => $item[$value]['name'],
            //             'description' => $item[$value]['description'],
            //             'price' => $item[$value]['price'],
            //             'stock' => $item[$value]['stock'],
            //             'weight' => $item[$value]['weight'],
            //             // 'qty' => $kuan[$i],
            //             'isi' => $item[$value]['isi'],
            //             'jenis' => $item[$value]['jenis']
            //         ];
            //     // $item[$value]->update($prod_up);
            //     dd($prod_up);
            // }
            // DB::table('payments')->insert($data);
        }

        return view('pages.frontend.checkout-success');
    }

    //SINGLE PAYMENT
    public function singlePayment(Request $request, $id)
    {

        $user = User::with(['cart.item', 'detail.cart.item'])->where('id', Auth::user()->id)->get()->toArray();
        $itemproduk = ProductItem::with('product','productlist')->find($id);

        // dd($itemproduk);

        $pes = Pesanan::where('users_id', Auth::user()->id)->first();
        $pesanan = [
            'users_id' => Auth::user()->id,
            'tanggal_pesanan' => Carbon::now()
        ];
        $pesanan = Pesanan::create($pesanan);

        // dd($pesanan->id);
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg,gif',
        ]);
        $image = $request->file('image')->store('public/backend/bukti_bayar');

            $data = array(
                'users_id' => Auth::user()->id,
                'product_items_id' => $itemproduk->id,
                'pesanans_id' => $pesanan->id,
                'price_total' => $request->price_total,
                'image' => $image,
                'status' => 0,
                'kurir' => $request->kurir,
                'ongkir' => $request->ongkir
            );

            $payment = Payment::create($data);

        //    $item = ProductItem::with(['cart.detail'])->whereIn('id', $product)->get();


           $kuan = $request->qty;


           $data2 = array (
            'users_id' => Auth::user()->id,
            'product_items_id' => $itemproduk->id,
            'payments_id' => $payment->id,
            'qty' => $kuan
            );
            $dataitem = [
                'products_id' => $itemproduk->products_id,
                'product_lists_id' => $itemproduk->product_lists_id,
                'thumbnail' => $itemproduk->thumbnail,
                'name' => $itemproduk->name,
                'price' => $itemproduk->price,
                'description' => $itemproduk->description,
                'stock' => $itemproduk->stock - $kuan ,
                'weight' => $itemproduk->weight,
                'isi' => $itemproduk->isi,
                'jenis' => $itemproduk->jenis
            ];
            // dd($data2, $dataitem);
            $a = $itemproduk->update($dataitem);
            // dd($a);
            DB::table('payment_details')->insert($data2);

        return view('pages.frontend.checkout-success');
    }
    public function sendWa($id)
    {
        $itemproduk = ProductItem::with('product','productlist')->find($id);
        $user = User::where('id', Auth::user()->id)->get();
        $WaTujuan = '6285157810003';
        $text = 'Apakah stok barang '. $itemproduk->name .' masih tersedia? ';
        $finaltext = urlencode($text);
        // dd($finaltext);
        return redirect('https://api.whatsapp.com/send?phone='. $WaTujuan .'/&text= '. $finaltext .' ');
    }
    public function alamat()
    {
        return view('pages.frontend.alamat');
    }
}
