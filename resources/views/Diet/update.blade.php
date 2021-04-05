@extends('layout.index')
@section('content')
@foreach($diet as $diet)
<h2 class="m-0 font-weight-bold text-dark">Edit Menu</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<form class="user" method="POST" action="{{route('MenuDiet.update',$diet->id)}}" enctype="multipart/form-data">
 @csrf
 @method('PUT')
 <div class="form-group row">
  <div class="form-group col-lg-12">
    <label>ID Kategori</label>
    <input type="text" class="form-control " id="idmenu" name="idmenu" placeholder="Input Kode" value="{{ $diet->idmenu}}">
  </div>
  <div class="form-group col-lg-12">
    <label>Kode</label>
    <input type="text" class="form-control " id="kode" name="kode" placeholder="Input Kode" value="{{ $diet->kode}}">
  </div>
  <div class="form-group col-lg-12">
    <label>Nama Menu Makanan</label>
    <input type="text" class="form-control " name="nama" id="nama" placeholder="Input Nama Makanan" value="{{ $diet->nama}}">
  </div>
  <div class="form-group col-lg-12">
    <label>Deskripsi</label>
    <input type="text" class="form-control " name="keterangan" id="keterangan" value="{{ $diet->keterangan}}">
  </div>
  <div class="form-group col-lg-12">
    <img width="100" height="100" @if($diet->foto) src="{{ asset('img/menu'.$diet->foto) }}" @endif />
    <br/>
    <input type="text" class="form-control " id="foto"  value="File : {{ $diet->foto}}">
    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto"><p>Maximum file size to upload is 2MB</p>
  </div>
</div>
<center>
  <a href="/MenuDiet" class="btn btn-info btn-md">Kembali</a>
  <button type="submit" class="btn btn-danger">Update</button>
</center>
</form>
</div>

@endforeach
</div>
@endsection