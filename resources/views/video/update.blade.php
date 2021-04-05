@extends('layout.index')
@section('content')
@foreach($data as $vid)
<h2 class="m-0 font-weight-bold text-dark">Edit File</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<form class="user" method="POST" action="{{route('vid.update', $vid->id)}}" enctype="multipart/form-data">
 @csrf
 @method('PUT')
 <div class="form-group row">
  <div class="form-group col-lg-12">
    <label>Alamat Link</label>
    <input type="text" class="form-control " id="link" name="link" placeholder="link" value="{{$vid->link}}">
  </div>
  <div class="form-group col-lg-12">
    <label>Judul Video</label>
    <input type="text" class="form-control " id="judul" name="judul" placeholder="Input Judul" value="{{$vid->judul}}">
  </div>
  <div class="form-group col-lg-12">
    <label>Deskripsi</label>
    <input type="testarea" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="{{$vid->deskripsi}}">
  </div>
  <div class="form-group col-lg-12">
      <label>File </label>
      <div class="form-control" value="{{$vid->nama}}">File: &nbsp;{{$vid->nama}}</div>
<br/>
    <input type="file" class="form-control " id="nama" name="nama" placeholder="Nama File" value="{{$vid->nama}}">
  </div>
</div>                 

<center>
  <a href="/vid" class="btn btn-info btn-md">Kembali</a>
  <button type="submit" class="btn btn-danger">Update</button>
</center>
</form>

</div>
</div>
@endforeach

@endsection