@extends('layout.index')
@section('content')
@php
$data = App\MenuDiet::All();
$no = 1;
@endphp

<h2 class="m-0 font-weight-bold text-dark">Menu Diet</h2>
<br/>
<div class="row">
  <div class="col-md-2">
    <a href="{{ url('/MenuDiet/create') }}" class="btn btn-danger btn-block btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
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
                <img src="{{asset('img/menu')}}/{{ $row->foto}}" width="35%" />
                @else
                <img src="{{asset('img')}}/nopoto.png" width="10%">
              @endif     
          </td>
          <td>{{ $row->kode }}</td>
          <td>{{ $row->nama }}</td> 
          <td>
            <a href="{{ route('MenuDiet.show', $row->id)}}"><i class="fas fa-book"></i></a>
          </td>
          <td>
            <a type="btn-sm" href="{{ route('MenuDiet.edit', $row->id)}}" ><i class="far fa-edit"></i></a>
          </td>
          <td>
            <form method="POST" action="{{ route('MenuDiet.destroy', $row->id) }}">
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
      <h3 class="m-0 font-weight-bold text-primary">Menu Diet</h3>
    </center>
  </div>
  <br/>
  <div class="card-body">
      <div class="table-responsive">
        <center>
          <a href="{{ url('/MenuDiet/create') }}" class="btn btn-warning btn-sm"><i class="fas fa-plus"></i>
          &nbsp;Add</a>
        </center>
        <br/>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $diet)
            <tr>
              <td>{{$no++}}</td>
              <td>{{ $diet->idmenu }}</td>
              <td>{{ $diet->kode }}</td>
              <td>{{ $diet->nama }}</td>
              <td width="20%">{{ $diet->foto }}
                <br/>
                @if(!empty($diet->foto))
                <img src="{{asset('img/menu')}}/{{ $diet->foto}}" width="20%" />
                @endif
              </td>
              <td>{{ $diet->keterangan }}</td>
              
              <td>
                <center>
                <form method="POST" action="{{ route('MenuDiet.destroy', $diet->id) }}">

                  <a href="{{ route('MenuDiet.show', $diet->id)}}">
                    <i class="fas fa-book"></i>
                  </a>&nbsp; &nbsp;
                  <a href="{{ route('MenuDiet.edit', $diet->id)}}">
                   <i class="far fa-edit"></i>
                 </a>
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-link" onclick="return confirm('Yakin Mau Di Hapus?')">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </center>
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