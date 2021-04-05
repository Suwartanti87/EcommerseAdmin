@extends('layout.index')
@section('content')
<h2 class="m-0 font-weight-bold text-dark">Edit Menu</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
@foreach($data as $product)
<form class="user" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group row">
    <div class="form-group col-lg-12"> 
      <label>Id</label>
      <input class="form-control " type="text" name="id" value="{{ $product->id }}">
    </div>
    <div class="form-group col-lg-12">
      <label >Nama Menu Makanan</label>
      <input class="form-control " type="text" name="nama" value="{{ $product->nama }}">
    </div>
    <div class="form-group col-lg-12">
      <label >Harga Menu Makanan</label>
      <input class="form-control " type="text" name="harga" value=" {{ $product->harga }}">
    </div>
    <div class="form-group col-lg-12">
      <label >Quantity</label>
      <input class="form-control " type="text" name="qty" value=" {{$product->qty}}">
    </div>
    <div class="form-group col-lg-12">
      <label>Deskripsi</label>
      <input class="form-control " type="text" name="deskripsi" value="{{ $product->deskripsi }}">
    </div>
  
    <div class="form-group col-lg-12">
      <img width="100" height="100" @if($product->foto) src="{{ asset('img/menucake'.$product->foto) }}" @endif />
      <br/>
      <br/>
      <input type="text" class="form-control " id="foto"  value="File : {{ $product->foto}}">
      <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto"><p>Maximum file size to upload is 2MB</p>
    </div>
  </div>
  <center>
    <a href="/product" class="btn btn-info btn-md">Kembali</a>
    <button type="submit" class="btn btn-warning">Update</button>
  </center>
</form>
@endforeach
</div>
</div>

@endsection