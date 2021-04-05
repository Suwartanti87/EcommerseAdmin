<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Kategori;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        
        //select menu.*, kategori.kategori AS kategori from menu inner join kategori on kategori.idjenis = menu.idmenu
        // $ar_menu = DB::table('menu')->get();
        


        $ar_menu = DB::table('menu')
        ->join('kategori','kategori.idjenis', '=', 'menu.idmenu')
        ->select('menu.*', 'kategori.kategori as menu')
        ->paginate(10);
        
        // return $ar_menu;
        
        return view('menu/index', compact('ar_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu/create');
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
            'idmenu'=>'required|string',
            'kode' => 'required|string',
            'nama'=>'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan'=>'required|string',
            
        ]);
        $file = $request->file('foto');
        $nama_file = time().'.'.$file->getClientOriginalName();

        $tujuan_upload = 'img/menu';
        $file->move($tujuan_upload,$nama_file);

        DB::table('menu')->insert(
            [
            'idmenu'=>$request->get('idmenu'),
            'kode'=>$request->get('kode'),
            'nama'=>$request->get('nama'),
            
            'foto'=>$nama_file,
            'keterangan'=>$request->get('keterangan'),
        ]);

         return redirect('/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data = \App\Menu::where('id',$id)->get();
       // return $data;
       return view('menu.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $menu = Menu::where('id',$id)->get();
        return view('menu/update', compact('menu'));
    
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
        $data = menu::where('id',$id)->get();
        foreach ($data as $value) {
            $foto = $value->foto;
        }
        if(!empty(request()->foto) && !empty($foto)){
            unlink('img/menu/'.$foto);
        }
        request()->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!empty(request()->foto)){
            $imageName = time().'.'.request()->foto->getClientOriginalExtension();
        request()->foto->move(public_path('img/menu'), $imageName);

        DB::table('menu')->where('id',$request->id)->update(
            [
            'idmenu'=>$request->idmenu,
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'foto'=>$imageName,
            'keterangan'=>$request->keterangan,
            ]);
        }else{
            DB::table('menu')->where('id',$request->id)->update(
            [
            'idmenu'=>$request->idmenu,
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'keterangan'=>$request->keterangan,
            ]);
    }
        
        return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('menu')->where('id',$id)->delete();
        return redirect('/menu');
    }
}
