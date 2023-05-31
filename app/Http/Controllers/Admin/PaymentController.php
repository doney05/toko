<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use App\Models\Payment;
use App\Models\ProductItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function indexBelum()
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 0)->get()->count();

        // $count = $payment[1]['user']['detail']->count();
        // dd($payment);

        return view('pages.backend.transaksi.index', compact('payment', 'hasil'));
    }
    public function detailBelum(Request $request, $id)
    {
       $find = Payment::with(['user.detail', 'user.cart.item'])->find($id);
    //    $hasil = $find['user']['cart']->count();
        $pesanan = Payment::with(['user', 'item', 'pesanan', 'paymentdetail.item.productlist'])->where('id', $id)->get()->toArray();
        $detail = count($pesanan[0]['paymentdetail']);
        $item = ProductItem::with(['cart.detail', 'paymentdetail'])->get();
        $cart = CartDetail::all();
        // dd($pesanan);
       return view('pages.backend.transaksi.detail', compact('find', 'pesanan', 'detail', 'item', 'cart'));
    }
    public function bukti(Request $request, $id)
    {
        $img = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->find($id);
        // dd($img);
        return view('pages.backend.transaksi.bukti', compact('img'));
    }

    //Dibayar
    public function indexDibayar(Request $request)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 1)->get()->count();
        // dd($payment);
        return view('pages.backend.transaksi.dibayar', compact('payment', 'hasil'));
    }
    public function updateDibayar(Request $request, $id)
    {
        $status = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->find($id);
        $data = [
            'users_id' => $status->users_id,
            'price_total' => $status->price_total,
            'image' => $status->image,
            'status' => 1
        ];
        $status->update($data);
        return redirect()->route('dibayar.index');
    }

    //Dikirim
    public function indexDikirim(Request $request)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 2)->get()->count();
        // dd($payment);
        return view('pages.backend.transaksi.dikirim', compact('payment', 'hasil'));
    }
    public function updateDikirim(Request $request, $id)
    {
        $status = Payment::with(['user.detail', 'user.cart.item'])->find($id);
        $data = [
            'users_id' => $status->users_id,
            'price_total' => $status->price_total,
            'image' => $status->image,
            'status' => 2,
            'resi' => $request->resi
        ];
        $status->update($data);
        return redirect()->route('dikirim.index');
    }

    //Selesai
    public function indexSelesai(Request $request)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 3)->get()->count();
        // dd($payment);
        return view('pages.backend.transaksi.selesai', compact('payment', 'hasil'));
    }
    public function updateSelesai(Request $request, $id)
    {
        $status = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->find($id);
        $data = [
            'users_id' => $status->users_id,
            'price_total' => $status->price_total,
            'image' => $status->image,
            'status' => 3,
            'resi' => $status->resi
        ];
        // dd($data);
        $status->update($data);
        return redirect()->route('selesai.index');
    }

    //Batal
    public function indexBatal(Request $request)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 4)->get()->count();
        // dd($payment);
        return view('pages.backend.transaksi.batal', compact('payment', 'hasil'));
    }
    public function updateBatal(Request $request, $id)
    {
        $status = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->find($id);
        $data = [
            'users_id' => $status->users_id,
            'price_total' => $status->price_total,
            'image' => $status->image,
            'status' => 4,
            'resi' => $status->resi
        ];
        // dd($data);
        $status->update($data);
        return redirect()->route('batal.index');
    }

}
