<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $products = Product::when(request('search'), function($query){
                        return $query->where('name','like','%'.request('search').'%');
                    })
                    ->orderBy('created_at','desc')
                    ->get();
        return view('product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'foto' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'deskripsi'=> 'required',
        ]);
        $file = $request->file('foto');
        $nama_file = time().'.'.$file->getClientOriginalName();

        $tujuan_upload = 'img/menucake';
        $file->move($tujuan_upload, $nama_file);

        DB::table('product')->insert([
            'nama'=>$request->get('nama'),
            'foto'=>$nama_file,
            'harga'=> $request->get('harga'),
            'qty' => $request->get('qty'),
            'deskripsi' => $request->get('deskripsi'),
            ]);

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\product::where('id',$id)->get();
       
        return view('product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::where('id', $id)->get();
        return view('product.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = product::where('id', $id)->get();
        foreach($data as $value){
            $foto = $value->foto;
        }
        if(!empty(request()->foto)&& !empty($foto)){
            unlink('img/menucake'.$foto);
        }
        request()->validate([
            'foto'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!empty(request()->foto)){
            $nama_file = time().'.'.request()->foto->getClientOriginalExtension();
        request()->foto->move(public_path('img/menucake'), $nama_file);

        DB::table('product')->where('id', $request->id)->update(
            [
                'nama'=> $request->nama,
                'foto'=>$nama_file,
                'harga'=>$request->harga,
                'qty'=>$request->qty,
                'deskripsi'=>$request->deskripsi,
            ]);

        }else{
        DB::table('product')->where('id', $request->id)->update(
            [
                'nama'=> $request->nama,
                
                'harga'=>$request->harga,
                'qty'=>$request->qty,
                'deskripsi'=>$request->deskripsi,
            ]);
    }
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product')->where('id',$id)->delete();
        return redirect('/product');
    }
}
