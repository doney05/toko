<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = ProductList::with('product')->where('products_id', '=', $id)->get();
        $produk = Product::find($id);
        return view('pages.backend.product.product_list.index', compact('data','produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $item = Product::find($id);
        return view('pages.backend.product.product_list.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // $data = $request->all();
        // $images = array();

        $product = Product::find($id);

        // if ($files = $request->file('thumbnail')) {
        //     foreach ($files as  $file) {
        //         $name = $file->getClientOriginalName();
        //         $file->move('public/backend/brand/produk',$name);
        //         $images[]=$name;
        //     }
        // }
        // $thumbnail = implode('|', $images);
        ProductList::insert([
            'products_id' => $product->id,
            'name' => $request->name,
            // 'thumbnail'=>  $thumbnail,
            // 'description' => $request->description,
            // 'price' => $request->price,
            // 'stock' => $request->stock,
        ]);
        return redirect()->route('product-list.index', $id)->with('success','Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $dataid)
    {
        $produk = Product::find($id);
        $data = ProductList::with('product')->where('id', '=', $dataid)->first();
        // dd($data);
        return view('pages.backend.product.product_list.edit', compact('produk', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, $dataid)
    {
        // $data = $request->all();
        // $images = array();

        $product = Product::find($id);
        $image = ProductList::find($dataid);

        // if ($files = $request->file('thumbnail')) {

            // if (file_exists($image->thumbnail)) {
            //      unlink(public_path('public/backend/brand/produk/').$image->thumbnail);
            // }
        //     foreach ($files as  $file) {
        //         $name = $file->getClientOriginalName();
        //         $name = preg_replace('/\s+/', '_', $name);
        //         $file->move('public/backend/brand/produk',$name);
        //         $oldImage = $image->thumbnail;
        //         Storage::delete($oldImage);
        //         $images[]=$name;
        //          $json_encode = json_encode($images);
        //         $image->thumbnail = $json_encode;
        //     }
        // }
        // $thumbnail = implode('|', $images);
        $data = [
            'products_id' => $product->id,
            'name' => $request->name,
            // 'thumbnail'=>  $thumbnail,
            // 'description' => $request->description,
            // 'price' => $request->price,
            // 'stock' => $request->stock,
        ];

        // dd($data);
        $image->update($data);
        return redirect()->route('product-list.index', $id)->with('success','Produk berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id, $dataid)
    {
        // foreach ($single_id as  $id) {
        //     $i = ProductList::findOrFail($id);
        //     $i->delete();
        //     $currentPhoto = $i->thumbnail;
        //     $user = public_path('storage/backend/brand/produk/').$currentPhoto;
        //     if(file_exists($user))
        //     {
        //         $da = @unlink($user);

        //         dd($da);
        //     }
        // }


        // $storePath = storage_path('storage/backend/brand/produk/'.$produk->thumbnail);
        // dd($storePath);
        // if (file_exists($storePath)) {
        //    $d =  Storage::disk('public')->delete($storePath);
        //    dd($d);
        // }

        // ============= Terbaru =====================
        $produk = ProductList::find($dataid);
        // $single_id = explode('|', $produk->thumbnail);
        // foreach ($single_id as  $item) {
        //  unlink(public_path('public/backend/brand/produk/').$item);
        // }
        $produk->delete();
            // ================================================
        // $imagepath = 'public/backend/brand/produk/';
        // if (File::exists($imagepath)) {
        //    File::delete($single_id);
        // //    dd($d);
        // }
        // dd($produk);
        // foreach ($produk as $item) {
        // $currentPhoto = $item->thumbnail;
        // $photo =  $request->file('thumbnail')->store('storage/backend/brand/produk'.$currentPhoto);
        // dd($photo);
        // if(file_exists($photo))
        // {
        //     $da = @unlink($photo);

        // }
    // }
        // $data = ProductList::find($dataid);
        // Storage::delete($data->thumbnail);

        // ProductList::findOrFail($dataid)->delete();

        return redirect()->route('product-list.index', $id)->with('success','Produk berhasil diperbarui');

    }
}
