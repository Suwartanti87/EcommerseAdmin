@extends('layout.index')
@section('content')
@foreach($data1 as $tips)
<h2 class="m-0 font-weight-bold text-dark">Edit Tips and Trik</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<form class="user" method="POST" action="{{route('tips-and-trik.update',$tips->id)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group row">
    <div class="form-group col-lg-12">
      <label>Kategori</label>
      <input type="text" class="form-control " id="idkategori" name="idkategori" placeholder="Input Kode" value="{{ $tips->idkategori}}">
    </div>
    <div class="form-group col-lg-12">
      <label>Nama Tips & Trik</label>
      <input type="text" class="form-control " name="nama" id="nama" placeholder="Input Nama" value="{{ $tips->nama}}">
    </div>
    <div class="form-group col-lg-12">
      <label>Deskripsi</label>
      <input type="text" class="form-control " name="keterangan" id="keterangan" value="{{ $tips->keterangan}}">
    </div>
    <div class="form-grou col-lg-12">
      <img width="100" height="100" @if($tips->foto) src="{{ asset('img/tips'.$tips->foto) }}" @endif />
      <br/>
      <br/>
      <input type="text" class="form-control " id="foto"  value="File : {{ $tips->foto}}">
      <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto"><p>Maximum file size to upload is 2MB</p>          
    </div>
  </div>
  <center>
    <a href="/tips-and-trik" class="btn btn-info btn-md">Kembali</a>
    <button type="submit" class="btn btn-danger">Update</button>
  </center>
</form>
@endforeach
</div>
</div>
@endsection