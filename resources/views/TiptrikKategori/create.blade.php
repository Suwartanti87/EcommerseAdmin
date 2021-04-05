@extends('layout.index')
@section('content')
<h2 class="m-0 font-weight-bold text-dark">Add Kategori</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
  <form class="user" method="POST" action="{{route('KategoriTipsTrik.store')}}">
           @csrf
           <div class="form-group row">
            <div class="form-group col-lg-12">
              <input type="text" class="form-control " id="idkategori" name="idkategori" placeholder="Kode Kategori" value="">
              @if ($errors->has('idkategori'))
              <span class="help-block">
                <strong>{{ $errors->first('idkategori') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-lg-12">
              <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" value="">
              @if ($errors->has('kategori'))
              <span class="help-block">
                <strong>{{ $errors->first('kategori') }}</strong>
              </span>
              @endif
            </div>
          </div> 
        <center>
          <a href="/KategoriTipsTrik" class="btn btn-info btn-md">Kembali</a>
          <button type="submit" class="btn btn-danger">Simpan</button>
        </center>
      </form>
    </div>
  </div>

@endsection