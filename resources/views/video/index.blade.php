@extends('layout.index')
@section('content')
@php
$data = App\Video::All();
$no = 1;
@endphp

<h2 class="m-0 font-weight-bold text-dark">Video</h2>
<br/>
<div class="row">
  <div class="col-md-2">
    <a href="{{ url('/vid/create') }}" class="btn btn-danger btn-block btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
  </div>
</div>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
    <table class="table table-striped">
      <thead class="bg-danger text-light">
        <tr>
          <th>File</th>
          <th>Judul</th>
          <th>Alamat Url</th>
          <th>Show</th>
          <th>Edit</th> 
          <th>Delete</th> 
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $row)
        <tr>
          <td>{{ $row->nama }}</td>
          <td>{{ $row->judul }}</td>
          <td>{{ $row->link }}</td> 
          <td>
            <a href="{{ route('vid.show', $row->id)}}"><i class="fas fa-book"></i></a>
          </td>
          <td>
            <a type="btn-sm" href="{{ route('vid.edit', $row->id)}}" ><i class="far fa-edit"></i></a>
          </td>
          <td>
            <form method="POST" action="{{ route('vid.destroy', $row->id) }}">
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
      <h3 class="m-0 font-weight-bold text-primary">Video</h3>
    </center>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <center>
          <a href="{{ url('/vid/create') }}" class="btn btn-warning btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
        </center>
        <br/>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Link</th>
              <th>Nama File</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $video)
            <tr>
              <td>{{ $no++}}</td>
              <td><a href="{{ $video->link }}">{{ $video->link }}</a></td>
              <td>
                <a href="{{ asset('video/'.$video->nama) }}" target="_blank">
                  {{ $video->nama }}
                </a>
              </td>
              <td>{{ $video->judul }}</td>
              <td>{{ $video->deskripsi }}</td>
              <td>
                <form method="POST" action="{{ route('vid.destroy', $video->id) }}">
                  <a href="{{ route('vid.show', $video->id)}}">
                    <i class="fas fa-book"></i>
                  </a>&nbsp; &nbsp;
                  <a href="{{ route('vid.edit', $video->id)}}">
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
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</div> -->
@endsection