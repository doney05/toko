<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Pesanan;
use App\Models\ProductItem;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function konfirmasi(Request $request, $id)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->where('users_id', $id)->orderBy('id', 'DESC')->get();
        // $pesanan = Payment::with(['user', 'item', 'pesanan', 'paymentdetail.item.productlist'])->where('id', $id)->get()->toArray();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('users_id', $id)->where('status', '=', 0)->get()->count();
        // dd($payment);
        return view('pages.frontend.status-pengiriman.konfirmasi', compact('payment', 'hasil'));
    }
    public function dikemas(Request $request, $id)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->where('users_id', $id)->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('users_id', $id)->where('status', '=', 1)->get()->count();

        return view('pages.frontend.status-pengiriman.dikemas', compact('payment', 'hasil'));
    }
    public function dikirim(Request $request, $id)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->where('users_id', $id)->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('users_id', $id)->where('status', '=', 2)->get()->count();

        return view('pages.frontend.status-pengiriman.dikirim', compact('payment', 'hasil'));
    }
    public function sampai(Request $request, $id)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->where('users_id', $id)->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('users_id', $id)->where('status', '=', 3)->get()->count();

        return view('pages.frontend.status-pengiriman.sampai', compact('payment', 'hasil'));
    }
    public function detail(Request $request, $id)
    {
       $pesanan = Payment::with(['user', 'item', 'pesanan', 'paymentdetail.item.productlist'])->where('id', $id)->get()->toArray();
       $detail = count($pesanan[0]['paymentdetail']);
       $item = ProductItem::with(['cart.detail', 'paymentdetail'])->get();
       $cart = CartDetail::all();
        // dd($detail);
       return view('pages.frontend.status-pengiriman.detail', compact('pesanan', 'detail', 'item', 'cart'));
    }
    public function batal(Request $request, $id)
    {
        $payment = Payment::with(['user.detail', 'user.cart.item', 'pesanan', 'paymentdetail.item.productlist'])->where('users_id', $id)->orderBy('id', 'DESC')->get();
        $hasil = Payment::with(['user.detail', 'user.cart.item'])->where('users_id', $id)->where('status', '=', 4)->get()->count();

        return view('pages.frontend.status-pengiriman.batal', compact('payment', 'hasil'));
    }

    public function invoice(Request $request, $id)
    {
        $pesanan = Payment::with(['user', 'item', 'pesanan', 'paymentdetail.item.productlist'])->where('id', $id)->get()->toArray();
        $item = ProductItem::with(['cart.detail', 'paymentdetail'])->get();
        // dd($pesanan);
        return view('pages.frontend.invoice', compact('pesanan', 'item'));
    }
}
