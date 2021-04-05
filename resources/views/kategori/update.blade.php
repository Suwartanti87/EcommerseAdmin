@extends('layout.index')
@section('content')
@foreach($kategori as $kateg)
<h2 class="m-0 font-weight-bold text-dark">Edit Kategori</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<form class="user" method="POST" action="{{ route('kategori.update',$kateg->id) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="form-group col-lg-12">
      <label>Kode</label>
      <input type="text" class="form-control " id="idjenis"  value="{{ $kateg->idjenis }}" name="idjenis">
    </div>
    <div class="form-group col-lg-12">
      <label>Kategori</label>
      <input type="text" class="form-control" id="kategori" value="{{ $kateg->kategori }}" name="kategori">
    </div>
  </div>
  <center>
    <a href="/kategori" class="btn btn-info btn-md">Kembali</a>
    <button type="submit" class="btn btn-danger">Update</button>
  </center>
</form>
@endforeach
</div>          
</div>

@endsection