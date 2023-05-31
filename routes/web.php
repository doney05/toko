<?php

use App\Http\Controllers\Admin\AlamatController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductItemController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('produk/{id}', [HomeController::class, 'produk'])->name('produk');
Route::get('produk/{id}/detail/{dataid}', [HomeController::class, 'produkdetail'])->name('produk.detail');
//add to cart
Route::post('add_to_cart/{id}', [HomeController::class, 'addCart'])->name('add_to_cart');
Route::get('keranjang/{id}', [HomeController::class, 'keranjang']);
Route::delete('delete-keranjang/{id}', [HomeController::class, 'remove'])->name('delete-keranjang');
//update cart
Route::post('update-cart/{id}', [HomeController::class, 'updatecart']);
Route::post('update-price', [HomeController::class, 'updateprice']);
Route::get('getcity/{id}/cities', [HomeController::class, 'getCity']);
Route::post('update/alamat/{id}', [HomeController::class, 'updatealamat']);

//Multiple produk
Route::post('proses-checkout/{id}', [HomeController::class, 'prosescheckout']);
Route::get('checkout/{id}', [HomeController::class, 'checkout'])->name('checkout');
Route::get('getongkir/{id}', [HomeController::class, 'getOngkir']);
Route::post('cekOngkir/{id}', [HomeController::class, 'cekOngkir']);
Route::post('upload-bukti/{id}', [HomeController::class, 'payment']);

//Single product
Route::post('checkout-beli/{id}', [HomeController::class, 'checkoutBeli']);
Route::get('produk/single-checkout/{id}', [HomeController::class, 'singleCheckout']);
Route::get('singleongkir/{ongkir}/{id}/{qty}', [HomeController::class, 'singleOngkir']);
Route::post('singleCekongkir/{id}', [HomeController::class, 'singleCekongkir']);
Route::post('bukti-upload/{id}', [HomeController::class, 'singlePayment']);


//Status Pengiriman
Route::get('status/konfirmasi/{id}', [StatusController::class, 'konfirmasi']);
Route::get('status/dikemas/{id}', [StatusController::class, 'dikemas']);
Route::get('status/dikirim/{id}', [StatusController::class, 'dikirim']);
Route::get('status/sampai/{id}', [StatusController::class, 'sampai']);
Route::get('status/batal/{id}', [StatusController::class, 'batal']);
Route::get('status/detail-beli/{id}', [StatusController::class, 'detail']);
Route::get('invoice/{id}', [StatusController::class, 'invoice'])->name('invoice');

//Route send-wa
Route::get('sendWa/{id}', [HomeController::class, 'sendWa'])->name('sendWa');

Route::get('alamat', [HomeController::class, 'alamat'])->name('alamat');

Route::get('login/index', [LoginController::class, 'index'])->name('login.index');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth','admin:1']], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Produk
    Route::get('admin/brand/index', [BrandController::class, 'index'])->name('brand.index');
    Route::get('admin/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('admin/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('admin/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('admin/brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');

    //List Produk
    Route::get('admin/product-list/index/{id}', [ProductListController::class, 'index'])->name('product-list.index');
    Route::get('admin/product-list/create/{id}', [ProductListController::class, 'create'])->name('product-list.create');
    Route::post('admin/product-list/store/{id}', [ProductListController::class, 'store'])->name('product-list.store');
    Route::get('admin/product-list/{id}/edit/{dataid}', [ProductListController::class, 'edit'])->name('product-list.edit');
    Route::put('admin/product-list/{id}/update/{dataid}', [ProductListController::class, 'update'])->name('product-list.update');
    Route::delete('admin/product-list/{id}/delete/{dataid}', [ProductListController::class, 'destroy'])->name('product-list.delete');

    //Item Produk
    Route::get('admin/product-item/{id}/index/{dataid}', [ProductItemController::class, 'index'])->name('product-item.index');
    Route::get('admin/product-item/{id}/create/{dataid}', [ProductItemController::class, 'create'])->name('product-item.create');
    Route::post('admin/product-item/{id}/store/{dataid}', [ProductItemController::class, 'store'])->name('product-item.store');
    Route::get('admin/product-item/{id}/edit/{dataid}/{itemid}', [ProductItemController::class, 'edit'])->name('product-item.edit');
    Route::put('admin/product-item/{id}/update/{dataid}/{itemid}', [ProductItemController::class, 'update'])->name('product-item.update');
    Route::delete('admin/product-item/{id}/delete/{dataid}/{itemid}', [ProductItemController::class, 'destroy'])->name('product-item.delete');

    //Alamat
    Route::get('admin/alamat/index', [AlamatController::class, 'index'])->name('alamat.index');
    Route::get('admin/alamat/create/{id}', [AlamatController::class, 'create'])->name('alamat.create');
    Route::get('admin/{id}/cities', [AlamatController::class, 'getCity']);
    Route::post('admin/alamat/store/{id}', [AlamatController::class, 'store'])->name('alamat.store');

    //Payment - Belum Bayar
    Route::get('admin/payment/belum-bayar/bukti/{id}', [PaymentController::class, 'bukti'])->name('bukti-bayar');
    Route::get('admin/payment/belum-bayar/index', [PaymentController::class, 'indexBelum'])->name('belum_bayar.index');
    Route::get('admin/payment/belum-bayar/detail/{id}', [PaymentController::class, 'detailBelum'])->name('belum_bayar.detail');

    //Payment - Konfirmasi Bayar/Dikirim
    Route::get('admin/payment/konfirmasi/index', [PaymentController::class, 'indexDibayar'])->name('dibayar.index');
    Route::put('admin/payment/konfirmasi/update/{id}', [PaymentController::class, 'updateDibayar'])->name('dibayar.update');

    //Payment - Dikirim
    Route::get('admin/payment/dikirim/index', [PaymentController::class, 'indexDikirim'])->name('dikirim.index');
    Route::put('admin/payment/dikirim/update/{id}', [PaymentController::class, 'updateDikirim'])->name('dikirim.update');

    //Payment -Selesai
    Route::get('admin/payment/selesai/index', [PaymentController::class, 'indexSelesai'])->name('selesai.index');
    Route::put('admin/payment/selesai/update/{id}', [PaymentController::class, 'updateSelesai'])->name('selesai.update');

    //Payment - Batal
    Route::get('admin/payment/batal/index', [PaymentController::class,  'indexBatal'])->name('batal.index');
    Route::put('admin/payment/batal/update/{id}', [PaymentController::class, 'updateBatal'])->name('batal.update');
    // Route::get('admin/payment/belum-bayar/create', [PaymentController::class, 'createBelum'])->name('belum_bayar.create');
    // Route::post('admin/payment/belum-bayar/store', [PaymentController::class, 'storeBelum'])->name('belum_bayar.store');
    // Route::get('admin/payment/belum-bayar/edit/{id}', [PaymentController::class, 'editBelum'])->name('belum_bayar.edit');
    // Route::put('admin/payment/belum-bayar/update/{id}', [PaymentController::class, 'updateBelum'])->name('belum_bayar.update');
    // Route::delete('admin/payment/belum-bayar/delete/{id}', [PaymentController::class, 'destroyBelum'])->name('belum_bayar.delete');


    //Riwayat Pembelian
    Route::get('admin/riwayat/success', [RiwayatController::class, 'success'])->name('riwayat.success');
    Route::delete('admin/riwayat/success/delete/{id}', [RiwayatController::class, 'deleteSuccess'])->name('riwayat.success.delete');
    Route::get('admin/riwayat/batal', [RiwayatController::class, 'batal'])->name('riwayat.batal');
    Route::delete('admin/riwayat/batal/delete/{id}', [RiwayatController::class, 'deletebatal'])->name('riwayat.batal.delete');
    Route::get('admin/invoice/{id}', [RiwayatController::class, 'invoice'])->name('admin.invoice');


    //Akses Kompetitor
    Route::get('admin/akses/index', [UserController::class, 'index'])->name('akses.index');
    Route::get('admin/akses/create', [UserController::class, 'create'])->name('akses.create');
    Route::post('admin/akses/store', [UserController::class, 'store'])->name('akses.store');
    Route::get('admin/akses/edit/{id}', [UserController::class, 'edit'])->name('akses.edit');
    Route::put('admin/akses/update/{id}', [UserController::class, 'update'])->name('akses.update');
    Route::delete('admin/akses/delete/{id}', [UserController::class, 'destroy'])->name('akses.delete');

});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
