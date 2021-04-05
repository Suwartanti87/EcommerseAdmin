@extends('layout.index')
@section('content')
<h2 class="m-0 font-weight-bold text-dark">Add Tips and Trik</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<form class="user" method="POST" action="{{route('tips-and-trik.store')}}" enctype="multipart/form-data">
 @csrf
 <div class="form-group row">
  <div class="form-group col-lg-12">
   @php
   $teg = App\TiptrikKategori::All();
   @endphp
   <select name="idkategori" class="form-control " id="exampleFormControlSelect1"  placeholder="Kategori">
    <option value="">Pilih Kode Kategori</option>
    @foreach($teg as $row)
    <option value="{{$row->idkategori}}">{{$row->kategori}}</option>
    @endforeach
  </select> 
  @if ($errors->has('idkategori'))
  <span class="help-block">
    <strong>{{ $errors->first('idkategori') }}</strong>
  </span>
  @endif
</div>
<div class="form-group col-lg-12">
  <input type="text" class="form-control " name="nama" id="nama" aria-describedby="emailHelp" placeholder="Input Nama">
  @if ($errors->has('nama'))
  <span class="help-block">
    <strong>{{ $errors->first('nama') }}</strong>
  </span>
  @endif
</div>
  <div class="form-group col-lg-12">
    <input type="file" class="form-control " id="foto" name="foto" placeholder="Input foto">
    <label>Maximum file size to upload is 2MB</label>
    <br/>
    @if ($errors->has('foto'))
    <span class="help-block">
      <strong>{{ $errors->first('foto') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group col-lg-12">
    <input type="textarea" class="form-control" name="keterangan" id="keterangan" aria-describedby="emailHelp" placeholder="Input Keterangan">
    @if ($errors->has('keterangan'))
    <span class="help-block">
      <strong>{{ $errors->first('keterangan') }}</strong>
    </span>
    @endif
  </div>
</div>
<center>
  <a href="/tips-and-trik" class="btn btn-info btn-md">Kembali</a>
  <button type="submit" class="btn btn-danger">Simpan</button>
</center>
</form>
</div>
</div>
</div>
</div>
@endsection