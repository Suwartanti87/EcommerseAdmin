@extends('layout.index')
@section('content')
 <h2 class="m-0 font-weight-bold text-dark">Add Kategori</h2>
 <br/>
  <div class="card shadow mb-4">
  <div class="card-body">
        <form class="user" method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="form-group col-lg-12">
              <input type="text" class="form-control " id="idjenis"  placeholder="Input ID Kategori" name="idjenis">
              @if ($errors->has('idjenis'))
              <span class="help-block">
                <strong>{{ $errors->first('idjenis') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-lg-12">
              <input type="text" class="form-control " id="kategori" placeholder="Input Nama Kategori" name="kategori">
              @if ($errors->has('kategori'))
              <span class="help-block">
                <strong>{{ $errors->first('kategori') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <center>
            <a href="/kategori" class="btn btn-info btn-md">Kembali</a>
            <button type="submit" class="btn btn-danger">Simpan</button>
          </center>
        </form>      
    </div>
  </div>
@endsection