<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Tiptrik;

class TipstrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $data = DB::table('_tiptrik')->get();
        // return view('Tipstrik.index');

        //select _tiptrik.*, _tiptrik_kategori.kategori AS kategori from _tiptrik inner join _tiptrik_kategori on _tiptrik_kategori.idkategori = _tiptrik.idkategori
        
        $data = DB::table('_tiptrik')
        ->join('_tiptrik_kategori','_tiptrik_kategori.idkategori', '=', '_tiptrik.idkategori')
        ->select('_tiptrik.*', '_tiptrik_kategori.kategori as kategori')
        ->get();
        return view('Tipstrik.index',compact('data') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tipstrik/create');
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
            'idkategori' => 'required',
            'nama' => 'required|string|max:255',
            'foto' => 'required|mimes:jpg,png,jpeg,gif|max:2048',
            'keterangan' => 'required|string',
        ]);
       $file = $request->file('foto');
       $namafile = time().'.'.$file->getClientOriginalName();
       $tujuan_upload = 'img/tips';
       $file->move($tujuan_upload, $namafile);

        DB::table('_tiptrik')->insert(
            [
            'idkategori'    =>$request->get('idkategori'),
            'nama'          =>$request->get('nama'),
            'foto'          =>$namafile,
            'keterangan'    =>$request->get('keterangan'),
        ]);

         return redirect('/tips-and-trik'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
         $data = \App\Tiptrik::where('id',$id)->get();
       // return $data;
       return view('Tipstrik.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data1 = DB::table('_tiptrik')->where('id',$id)->get();
        return view('Tipstrik/update', compact('data1'));
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
        $gambar = Tiptrik::where('id',$id)->first();
        
        if (!empty($request->foto)) {
            File::delete('img/tips'.$gambar->foto);
            request()->validate([
            'foto'  => 'image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $namafile = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('img/tips'), $namafile);
        }else{
            $namafile = $gambar->foto;
        }

          Tiptrik::where('id',$id)->update([
            'idkategori'=>$request->idkategori,
            'nama'=>$request->nama,
            'foto'=>$namafile,
            'keterangan'=>$request->keterangan,
        ]);
        
          return redirect('/tips-and-trik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('_tiptrik')->where('id',$id)->delete();
        return redirect('/tips-and-trik');
    }


    public function tdee(Request $request)
    {
        return view('TDEE/tdee');
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bmr(Request $request)
    {   
        $aktifitas = $request->input('aktifitas');

    $rumuslalaki ='66' + ('13.7'* $request->BB) + ('5'* $request->TB ) - ('6.8' * $request->U);
    $rumusawewe ='655' + ('9.6'* $request->BB)+('1.8'* $request->TB)-('4.7'* $request->U);

    if ($request->gender=='male') {
      $data= $rumuslalaki * $aktifitas;
    }else {
       $data =$rumusawewe * $aktifitas;
    }
    return $data;
 // return view('TDEE/tdee', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
