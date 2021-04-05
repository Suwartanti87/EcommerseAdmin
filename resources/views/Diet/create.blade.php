@extends('layout.index')
@section('content')

<h2 class="m-0 font-weight-bold text-dark">Add Menu Diet</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<form class="user" method="POST" action="{{route('MenuDiet.store')}}" enctype="multipart/form-data">
 @csrf
 <div class="form-group row">
  <div class="form-group col-lg-12">
    @php
    $kateg = App\DietKategori::All();
    @endphp
    <select name="idmenu" class="form-control" id="exampleFormControlSelect1"  placeholder="Kategori">
      <option value="">Pilih Kode Kategori</option>
      @foreach($kateg as $row)
      <option value="{{$row->idkategori}}">{{$row->kategori}}</option>
      @endforeach
    </select> 
    @if ($errors->has('idmenu'))
    <span class="help-block">
      <strong>{{ $errors->first('idmenu') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group col-lg-12">
    <input type="text" class="form-control" id="kode" name="kode" placeholder="Input Kode">
    @if ($errors->has('kode'))
    <span class="help-block">
      <strong>{{ $errors->first('kode') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group col-lg-12">
    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="Input Nama Makanan">
    @if ($errors->has('nama'))
    <span class="help-block">
      <strong>{{ $errors->first('nama') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group col-lg-12">
    <input type="file" class="form-control" id="foto" name="foto" placeholder="Input foto">
    <label>Maximum file size to upload is 2MB</label>
    <br/>
    @if ($errors->has('foto'))
    <span class="help-block">
      <strong>{{ $errors->first('foto') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group col-lg-12">
    <input type="text" class="form-control" name="keterangan" id="keterangan" aria-describedby="emailHelp" placeholder="Input Keterangan">
    @if ($errors->has('keterangan'))
    <span class="help-block">
      <strong>{{ $errors->first('keterangan') }}</strong>
    </span>
    @endif
  </div>
</div>
<center>
  <a href="/MenuDiet" class="btn btn-info btn-md">Kembali</a>
  <button type="submit" class="btn btn-danger">Simpan</button>
</center>  
</form>
</div>
</div>
@endsection