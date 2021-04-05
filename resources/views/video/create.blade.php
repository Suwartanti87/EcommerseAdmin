@extends('layout.index')
@section('content')
<h2 class="m-0 font-weight-bold text-dark">Upload File Video</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
   <form class="user" enctype="multipart/form-data" method="POST" action="{{route('vid.store')}}">
         @csrf
         <div class="form-group row">
          <div class="form-group col-lg-12">
            <input type="text" class="form-control " id="link" name="link" placeholder="Kode Kategori" value="">
             @if ($errors->has('link'))
              <span class="help-block">
                <strong>{{ $errors->first('link') }}</strong>
              </span>
              @endif
          </div>
          
          <div class="form-group col-lg-12">
            <input type="text" class="form-control " id="judul" name="judul" placeholder="Input Judul" value="">
             @if ($errors->has('judul'))
              <span class="help-block">
                <strong>{{ $errors->first('judul') }}</strong>
              </span>
              @endif
          </div>
          <div class="form-group col-lg-12">
            <input type="testarea" class="form-control " id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="">
             @if ($errors->has('deskripsi'))
              <span class="help-block">
                <strong>{{ $errors->first('deskripsi') }}</strong>
              </span>
              @endif
          </div>
          <div class="form-group col-lg-12">
            <input type="file" class="form-control " id="nama" name="nama" placeholder="Nama File" value="">
            <label>Maximum file size to upload is 5MB</label>
            <br/>
             @if ($errors->has('nama'))
              <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
              </span>
              @endif
          </div>
          </div>              
      <center>
        <a href="/vid" class="btn btn-info btn-md">Kembali</a>
        <button type="submit" class="btn btn-danger">Simpan</button>
      </center>
    </form>  
  </div>
</div>
@endsection