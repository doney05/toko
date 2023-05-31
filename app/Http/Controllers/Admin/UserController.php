<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddressDestination;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akses = User::with(['province.citi', 'city'])->get();
        return view('pages.backend.pengaturan.akses.index', compact('akses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $address = AddressDestination::with(['province.citi', 'city', 'user'])->get();
        $provinces = Province::get();

        return view('pages.backend.pengaturan.akses.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'provinces_id' => 'required',
            'cities_id' => 'required',
            'alamat' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'provinces_id' => $request->provinces_id,
            'cities_id' => $request->cities_id,
            'alamat' => $request->alamat
        ];
        User::create($data);
        return redirect()->route('akses.index')->with('success', 'kompetitor berhasil ditambahkan');
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
        $item = User::with(['province', 'city'])->findOrFail($id);
        $provinces = Province::get();

        // dd($item);
        return view('pages.backend.pengaturan.akses.edit', compact('item', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->password);

        $item = User::findOrFail($id);
        Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'provinces_id' => 'required',
            'cities_id' => 'required',
            'alamat' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'provinces_id' => $request->provinces_id,
            'cities_id' => $request->cities_id,
            'alamat' => $request->alamat
        ];
        $item->update($data);
        return redirect()->route('akses.index')->with('success', 'kompetitor berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findOrFail($id)->delete();
        return redirect()->route('akses.index')->with('success', 'kompetitor berhasil dihapus');
    }
}
