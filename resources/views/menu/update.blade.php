@extends('layout.index')
@section('content')
<h2 class="m-0 font-weight-bold text-dark">Edit Menu</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
@foreach($menu as $menu)
<form class="user" method="POST" action="{{ route('menu.update', $menu->id) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group row">
    <div class="form-group col-lg-12"> 
      <label>Nomor</label>
      <input class="form-control " type="text" name="id" value="{{ $menu->id }}">
    </div>
    <div class="form-group col-lg-12">
      <label>ID Menu</label>
      <input class="form-control " type="text" name="idmenu" value="{{ $menu->idmenu }}">
    </div>
    <div class="form-group col-lg-12">
      <label>Kode Makanan</label>
      <input class="form-control " type="text" name="kode" value="{{ $menu->kode }}">
    </div>
    <div class="form-group col-lg-12">
      <label >Nama Menu Makanan</label>
      <input class="form-control " type="text" name="nama" value="{{ $menu->nama }}">
    </div>
    <div class="form-group col-lg-12">
      <label>Deskripsi</label>
      <input class="form-control " type="text" name="keterangan" value="{{ $menu->keterangan }}">
    </div>
  
    <div class="form-group col-lg-12">
      <img width="100" height="100" @if($menu->foto) src="{{ asset('img/menu'.$menu->foto) }}" @endif />
      <br/>
      <br/>
      <input type="text" class="form-control " id="foto"  value="File : {{ $menu->foto}}">
      <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto"><p>Maximum file size to upload is 2MB</p>
    </div>
  </div>
  <center>
    <a href="/menu" class="btn btn-info btn-md">Kembali</a>
    <button type="submit" class="btn btn-warning">Update</button>
  </center>
</form>
@endforeach
</div>
</div>

@endsection