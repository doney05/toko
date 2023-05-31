<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\ProductItem;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function success(Request $request)
    {
        $payment = Payment::with(['user', 'item', 'pesanan', 'paymentdetail.item.productlist'])->where('status', '=', 3)->orderBy('id', 'DESC')->get()->toArray();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 3)->get()->count();
        // dd($payment);
        return view('pages.backend.riwayat.success', compact('payment', 'hasil'));
    }
    public function deleteSuccess(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('riwayat.success')->with('success', 'Berhasil dihapus');
    }
    public function batal(Request $request)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 4)->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 4)->get()->count();
        // dd($payment);
        return view('pages.backend.riwayat.batal', compact('payment', 'hasil'));
    }
    public function deletebatal(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('riwayat.batal')->with('success', 'Berhasil dihapus');
    }
    public function invoice(Request $request)
    {
        $pesanan = Payment::with(['user', 'item', 'pesanan', 'paymentdetail.item.productlist'])->where('id', $request->id)->get()->toArray();
        $item = ProductItem::with(['cart.detail', 'paymentdetail'])->get();
        // dd($pesanan);
        return view('pages.backend.riwayat.invoice', compact('pesanan', 'item'));

    }
}
