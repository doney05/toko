<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $address = Address::with(['province.citi', 'city'])->first();
        return view('pages.backend.pengaturan.alamat.index', compact('address'));
    }

    public function getCity($id)
    {
        $city = City::where('provinces_id', $id)->pluck('title', 'id');
        return response()->json($city);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $address = Address::with(['province.citi', 'city'])->find($id);
        $provinces = Province::get();
        // dd($provinces);
        return view('pages.backend.pengaturan.alamat.create', compact('provinces', 'address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // $request->validate([
        //     'provinces_d' => 'required',
        //     'cities_id' => 'required',
        //     'title' => 'required'
        // ]);
        $address = Address::with(['province.citi', 'city'])->find($id);
        $data = array(
            'id' => $id,
            'provinces_id' => $request->provinces_id,
            'cities_id' => $request->cities_id,
            'title' => $request->title,
        );
        // dd($data);
        $address->update($data);
        return redirect()->route('alamat.index')->with('success', 'Berhasil diubah');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
