@extends('layout.index')
@section('content')
@foreach($data as $diet)
<h2 class="m-0 font-weight-bold text-dark">Edit Kategori</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<form class="user" method="POST" action="{{route('KategorimenuDiet.update',$diet->id)}}">
 @csrf
 @method('PUT')
 <div class="form-group row">
  <div class="form-group col-lg-12">
    <label>Kode</label>
    <input type="text" class="form-control " id="idkategori" name="idkategori" value="{{ $diet->idkategori}}">
  </div>
  <div class="form-group col-lg-12">
    <label>Kategori</label>
    <input type="text" class="form-control " id="kategori" name="kategori" value="{{ $diet->kategori}}">
  </div>
</div> 
<center>
  <a href="/KategorimenuDiet" class="btn btn-info btn-md">Kembali</a>
  <button type="submit" class="btn btn-danger">Update</button>
</center>  
</form>   
</div>
</div>
@endforeach
@endsection