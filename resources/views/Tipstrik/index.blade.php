@extends('layout.index')
@section('content')
@php
$data = App\Tiptrik::All();
$no = 1;
@endphp

<h2 class="m-0 font-weight-bold text-dark">Tips And Trik</h2>
<br/>
<div class="row">
  <div class="col-md-2">
    <a href="{{ url('/tips-and-trik/create') }}" class="btn btn-danger btn-block btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
  </div>
</div>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
    <table class="table table-striped">
      <thead class="bg-danger text-light">
        <tr>
          <th>File</th>
          <th>Kode</th>
          <th>Menu</th>
          <th>Show</th>
          <th>Edit</th> 
          <th>Delete</th> 
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $row)
        <tr>
          <td width="15%">
          
              @if(!empty($row->foto))
                <img src="{{asset('img/tips')}}/{{ $row->foto}}" width="35%" />
                @else
                <img src="{{asset('img')}}/nopoto.png" width="10%">
              @endif     
          </td>
          <td>{{ $row->idkategori }}</td>
          <td>{{ $row->nama }}</td> 
          <td>
            <a href="{{ route('tips-and-trik.show', $row->id)}}"><i class="fas fa-book"></i></a>
          </td>
          <td>
            <a type="btn-sm" href="{{ route('tips-and-trik.edit', $row->id)}}" ><i class="far fa-edit"></i></a>
          </td>
          <td>
            <form method="POST" action="{{ route('tips-and-trik.destroy', $row->id) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-link" onclick="return confirm('Yakin Mau Di Hapus?')">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td> 

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- <div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <center>
      <h3 class="m-0 font-weight-bold text-primary">Tips & Trik</h3>
      </center>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <center>
          <a href="{{ url('/tips-and-trik/create') }}" class="btn btn-warning btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
        </center>
        <br/>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Kategori</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Deskripsi</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($data as $tips)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $tips->idkategori }}</td>
              <td>{{ $tips->nama }}</td>
              <td>{{ $tips->foto }}
                <br/>
              @if(!empty($tips->foto))
                  <img src="{{asset('img/tips')}}/{{ $tips->foto}}" width="30%" />
                  @else
                  <img src="{{asset('img')}}/nopoto.png" width="10%">
                @endif</td>
              <td>{{ $tips->keterangan }}</td>
              <td>               
                <form method="POST" action="{{ route('tips-and-trik.destroy', $tips->id) }}">
                   <a href="{{ route('tips-and-trik.show', $tips->id)}}">
                    <i class="fas fa-book"></i>
                  </a>&nbsp; &nbsp;
                  <a href="{{ route('tips-and-trik.edit', $tips->id)}}">
                   <i class="far fa-edit"></i>
                 </a>
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-link" onclick="return confirm('Yakin Mau Di Hapus?')">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>        
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div> -->



@endsection