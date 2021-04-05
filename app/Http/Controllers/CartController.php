<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class CartController extends Controller
{

public function index()
{
        $ar_menu = DB::table('product')->get();

        return view('ecommerce.cart', compact('ar_menu'));
}

    public function addToCart(Request $request)
{
    
    $this->validate($request, [
        'product_id' => 'required|exists:product,id', //PASTIKAN PRODUCT_IDNYA ADA DI DB
        'qty' => 'required|integer' 
    ]);

    $carts = json_decode($request->cookie('dw-carts'), true); 
  
    if ($carts && array_key_exists($request->product_id, $carts)) {
        $carts[$request->product_id]['qty'] += $request->qty;
    } else {
        
        $product = Product::find($request->product_id);
        //TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
        $carts[$request->product_id] = [
            'qty' => $request->qty,
            'product_id' => $product->id,
            'nama' => $product->nama,
            'harga' => $product->harga,
            'foto' => $product->foto
        ];
    }

    
    $cookie = cookie('dw-carts', json_encode($carts), 2880);
    
    return redirect()->back()->cookie($cookie);
}
public function listCart()
{
    
    $carts = json_decode(request()->cookie('dw-carts'), true);
    $subtotal = collect($carts)->sum(function($q) {
        return $q['qty'] * $q['harga']; 
    });
    
    return view('ecommerce.cart', compact('carts', 'subtotal'));
}
public function updateCart(Request $request)
{
    //AMBIL DATA DARI COOKIE
    $carts = json_decode(request()->cookie('dw-carts'), true);
    //KEMUDIAN LOOPING DATA PRODUCT_ID, KARENA NAMENYA ARRAY PADA VIEW SEBELUMNYA
    //MAKA DATA YANG DITERIMA ADALAH ARRAY SEHINGGA BISA DI-LOOPING
    foreach ($request->product_id as $key => $row) {
        //DI CHECK, JIKA QTY DENGAN KEY YANG SAMA DENGAN PRODUCT_ID = 0
        if ($request->qty[$key] == 0) {
            //MAKA DATA TERSEBUT DIHAPUS DARI ARRAY
            unset($carts[$row]);
        } else {
            //SELAIN ITU MAKA AKAN DIPERBAHARUI
            $carts[$row]['qty'] = $request->qty[$key];
        }
    }
    //SET KEMBALI COOKIE-NYA SEPERTI SEBELUMNYA
    $cookie = cookie('dw-carts', json_encode($carts), 2880);
    //DAN STORE KE BROWSER.
    return redirect()->back()->cookie($cookie);
}

}
