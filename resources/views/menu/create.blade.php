@extends('layout.index')
@section('content')
<h2 class="m-0 font-weight-bold text-dark">Add Menu</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<form class="user" method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <div class="form-group col-lg-12">
      @php
      $teg = App\Kategori::All();
      @endphp
      <select name="idmenu" class="form-control " id="exampleFormControlSelect1"  placeholder="Kategori">
        <option value="">Pilih Kode Kategori</option>
        @foreach($teg as $row)
        <option value="{{$row->idjenis}}">{{$row->kategori}}</option>
        @endforeach
      </select>	
      @if ($errors->has('idmenu'))
      <span class="help-block">
        <strong>{{ $errors->first('idmenu') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group col-lg-12">
      <input class="form-control" type="text" name="kode" placeholder="Input Kode">
      @if ($errors->has('kode'))
      <span class="help-block">
        <strong>{{ $errors->first('kode') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group col-lg-12">
     <input class="form-control" type="text" name="nama" placeholder="Nama Menu">
     @if ($errors->has('nama'))
     <span class="help-block">
      <strong>{{ $errors->first('nama') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group col-lg-12">
    <input class="form-control" name="foto" type="file" placeholder="">
    <label>Maximum file size to upload is 2MB</label>
    @if ($errors->has('foto'))
    <span class="help-block">
      <strong>{{ $errors->first('foto') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group col-lg-12">
    <input class="form-control" type="text" name="keterangan" placeholder="Deskripsi">
    @if ($errors->has('keterangan'))
    <span class="help-block">
      <strong>{{ $errors->first('keterangan') }}</strong>
    </span>
    @endif
  </div>
</div><br>
<center>
  <a href="/menu" class="btn btn-info btn-md">Kembali</a>
  <button type="submit" class="btn btn-danger">Simpan</button>
</center>
</form>
</div>
</div>
</div>
</div>

@endsection