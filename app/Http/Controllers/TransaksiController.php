<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\ProductHistory;
use App\ProductTransaksi;
use App\Transaksi;
use DB;
use Auth;
use Darryldecode\Cart\CartCondition;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $produk = Product::when(request('search'), function($query){
            return $query->where('name','%'.request('search').'%');
        })->orderBy('created_at','desc')->get();

        if(request()->tax){
            $tax = "+10%";
        }else{
            $tax = "0%";
        }

        $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'pajak',
                'type' => 'tax', //tipenya apa
                'target' => 'total', //target kondisi ini apply ke mana (total, subtotal)
                'value' => $tax, //contoh -12% or -10 or +10 etc
                'order' => 1
            ));                
            
        \Cart::session(Auth()->id())->condition($condition);          

        $items = \Cart::session(Auth()->id())->getContent();

        if(\Cart::isEmpty()){
            $cart_data = [];            
        }
        else{
            foreach($items as $row) {
                $cart[] = [
                    'rowId' => $row->id,
                    'name' => $row->name,
                    'qty' => $row->quantity,
                    'pricesingle' => $row->price,
                    'price' => $row->getPriceSum(),
                    'created_at' => $row->attributes['created_at'],
                ];           
            }
            
            $cart_data = collect($cart)->sortBy('created_at');

        }
        
        //total
        $sub_total = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();

        $new_condition = \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak = $new_condition->getCalculatedValue($sub_total); 

        $data_total = [
            'sub_total' => $sub_total,
            'total' => $total,
            'tax' => $pajak
        ];

        dd($cart_data);
        
 
        return view('transaksi.transaksi', compact('produk','cart_data','data_total'));
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = \App\Product::where('id',$id)->get();
        return view('transaksi.transaksi', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function addProductCart($id){
        $product = product::find($id);
        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if($cek_itemId->isNotEmpty()){
            if($product->qty == $cek_itemId[$id]->quantity){
                return redirect()->back()->with('Error','Jumlah Item Kurang');
            }
            else{
                \Cart::session(Auth()->id())->update($id, array(
                    'quantity'=> 1));
            }
        } else{
            \Cart::session(Auth()->id())->add(array(
                'id'=>$id,
                 'nama'=> $product->nama,
                 'harga'=> $product->harga,
                 'quantity'=> 1,
                 'attributes'=> array(
                 'created_at'=> date('Y-m-d H:i:s'))
            ));
        }

        return redirect()->back();

    }
    public function removeProductCart($id){
        \Cart::session(Auth()->id())->remove($id);     
                         
        return redirect()->back();

    }
    public function clear(){
        \Cart::session(Auth()->id())->clear();
        return redirect()->back();

    }
    public function decreasecart($id){
        $product = Product::find($id);      
                
        $cart = \Cart::session(Auth()->id())->getContent();        
        $cek_itemId = $cart->whereIn('id', $id); 

        if($cek_itemId[$id]->quantity == 1){
            \Cart::session(Auth()->id())->remove($id);  
        }else{
            \Cart::session(Auth()->id())->update($id, array(
            'quantity' => array(
                'relative' => true,
                'value' => -1
            )));            
        }
        return redirect()->back();

    }
    public function increasecart($id){
        $product = Product::find($id);     
        
        $cart = \Cart::session(Auth()->id())->getContent();        
        $cek_itemId = $cart->whereIn('id', $id); 

        if($product->qty == $cek_itemId[$id]->quantity){
            return redirect()->back()->with('error','jumlah item kurang');
        }else{
            \Cart::session(Auth()->id())->update($id, array(
            'quantity' => array(
                'relative' => true,
                'value' => 1
            )));

            return redirect()->back();

    }
    }
    // INI FUNGSI YG BERBEDA
    public function addOrder()
{
    $products = product::orderBy('created_at', 'DESC')->get();
    return view('transaksi.transaksi', compact('products'));
}
public function getProduct($id)
{
    $products = Product::findOrFail($id);
    return response()->json($products, 200);
}
}
