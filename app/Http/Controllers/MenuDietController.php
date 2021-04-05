<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use \App\MenuDiet;

class MenuDietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('_menu_diet')->get();
        // // return $data;
        // return view('Diet.index');

        $data = DB::table('_menu_diet')
        ->join('_kategori_diet','_kategori_diet.idkategori', '=', '_menu_diet.idmenu')
        ->select('_menu_diet.*', '_kategori_diet.kategori as kategori')
        ->get();
        return view('Diet.index',compact('data') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Diet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'idmenu'    =>'required',
            'kode'      =>'required',
            'nama'      => 'required|string|max:255',
            'foto'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan'=> 'required|string',
            
        ]);
        $image = $request->file('foto');
        $new_name = time(). '.'. $image->getClientOriginalName();
        $tujuan_upload = 'img/menu';
        $image->move($tujuan_upload, $new_name);

        DB::table('_menu_diet')->insert([
            'idmenu'    => $request->idmenu,
            'kode'      => $request->kode,
            'nama'      => $request->nama,
            'foto'      =>$new_name,
            'keterangan'=> $request->keterangan
         ]);
        
        return redirect('/MenuDiet');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data = \App\MenuDiet::where('id',$id)->get();
       // return $data;
       return view('diet.show', compact('data'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diet = MenuDiet::where('id', $id)->get();
        return view('Diet.update', compact('diet'));
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
        $data = MenuDiet::where('id',$id)->first();

        if(!empty($request->foto)){
            File::delete('img/menu'. $data->foto);
        request()->validate([
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $namafile = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('img/menu'), $namafile);
    }else{
        $namafile = $data->foto;
    }

        MenuDiet::where('id',$id)->update([
                'idmenu'=>$request->idmenu,
                'kode'=>$request->kode,
                'nama'=>$request->nama,
                'foto'=>$namafile,
                'keterangan'=>$request->keterangan,
            ]);
        
         return redirect('/MenuDiet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_menu_diet')->where('id',$id)->delete();
        return redirect('/MenuDiet');
    }
}
