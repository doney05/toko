<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Product::all();
        return view('pages.backend.product.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'nama' => 'required'
        ]);
        if ($request->banner) {
            $banner = $request->file('banner')->store('public/backend/brand');
            $data = [
                'banner' => $banner,
                'nama' => $request->nama
            ];
            Product::create($data);
            return redirect()->route('brand.index')->with('success','Brand berhasil ditambahkan');;
        }else {
            $data = [
                // 'banner' => $banner,
                'nama' => $request->nama
            ];
            Product::create($data);
            return redirect()->route('brand.index')->with('success','Brand berhasil ditambahkan');;
        }


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
    public function edit(string $id)
    {
        $item = Product::find($id);
        return view('pages.backend.product.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $image = Product::find($id);

        // if (!is_null($image->banner) && Storage::delete($image->banner)) {
        //     $path = $request->file('banner')->store('public/backend/brand');
        //     dd($path);
        // }

        if($request->hasFile('banner')){
            // $request->validate([
            //   'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            // ]);
            Storage::delete($image->banner);
            $path = $request->file('banner')->store('public/backend/brand');
            $image->banner = $path;
        }
        $image->nama = $request->nama;
        $image->save();
        return redirect()->route('brand.index') ->with('success','Brand berhasil diperbarui');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        Storage::delete($data->banner);

        Product::findOrFail($id)->delete();

        return redirect()->route('brand.index')
                        ->with('success','Produk berhasil dihapus');
    }
}
