<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductItem;
use App\Models\ProductList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, $dataid)
    {
        $itemproduk = ProductItem::with(['product','productlist'])
                    ->where('products_id', '=', $id)
                    ->where('product_lists_id', '=', $dataid)->get();
        $listproduk = ProductList::find($dataid);
        // dd($itemproduk, $listproduk);
        return view('pages.backend.product.product_list.product_item.index', compact('itemproduk', 'listproduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, $dataid)
    {
        $produk = ProductList::find($dataid);
        return view('pages.backend.product.product_list.product_item.create', compact('id','produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id, $dataid)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'stock' => 'required',
        ]);
        $produklist = ProductList::find($dataid);
        $thumbnail = $request->file('thumbnail')->store('public/backend/brand/produk');
        $data = [
            'products_id' => $id,
            'product_lists_id' => $produklist->id,
            'thumbnail' => $thumbnail,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'isi' => $request->isi,
            'jenis' => $request->jenis
        ];
        ProductItem::create($data);
        return redirect('admin/product-item/'.$id.'/index/'.$dataid)->with('success','Produk berhasil ditambahkan');

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
    public function edit(string $id, $dataid, $itemid)
    {
        $produklist = ProductList::find($dataid);
        $item = ProductItem::find($itemid);
        return view('pages.backend.product.product_list.product_item.edit', compact('produklist', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id ,$dataid, $itemid)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'stock' => 'required',
        ]);
        $thumbnail = ProductItem::find($itemid);
        if ($request->hasFile('thumbnail')) {
            $request->validate([
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ]);
            Storage::delete($thumbnail->thumbnail);
            $path = $request->file('thumbnail')->store('public/backend/brand/produk');
            $thumbnail->thumbnail = $path;
        }
        $data = [
            'thumbnail' => $thumbnail->thumbnail,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'weight'=> $request->weight,
            'isi' => $request->isi,
            'jenis' => $request->jenis,
        ];
        $thumbnail->update($data);
        return redirect('admin/product-item/'.$id.'/index/'.$dataid)->with('success','Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $dataid, $itemid)
    {
        // dd($id,$dataid, $itemid);
        $data = ProductItem::find($itemid);
        Storage::delete($data->thumbnail);

        ProductItem::findOrFail($itemid)->delete();

        return redirect('admin/product-item/'.$id.'/index/'.$dataid)
                        ->with('success','Produk berhasil dihapus');
    }
}
