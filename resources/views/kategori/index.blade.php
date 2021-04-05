@extends('layout.index')
@section('content')
@php
$header = ['No', 'Kode','Kategori','Action'];
$ar_kategori = App\Kategori::All();
@endphp

<!-- <div class="col-lg-12">
  <div class="card mb-3">
    <div class="card-header">
      <center>
        <h1 class="m-0 font-weight-bold text-primary">Kategori Menu</h1>
      </center>
    </div>
    <div class="card-body">
      <center>
        <a href="{{ url('/kategori/create') }}" class="btn btn-warning btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
      </center><br/><br/>
      <div class="row">
        @foreach($ar_kategori as $kateg)
        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-3">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <form method="POST" action="{{ route('kategori.destroy', $kateg->id) }}">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $kateg->idjenis }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kateg->kategori }}</a></div>
                  </div>
                  <div class="col-auto">
                  <a href="{{ route('kategori.edit', $kateg->id)}}">
                    <i class="far fa-edit"></i>
                  </a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link" onclick="return confirm('Yakin Mau Di Hapus?')">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div> -->

<h2 class="m-0 font-weight-bold text-dark">Kategori Menu</h2>
<br/>
<div class="row">
  <div class="col-md-2">
    <a href="{{ url('/kategori/create') }}" class="btn btn-danger btn-block btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
  </div>
</div>
<br/>
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-striped">
            <thead class="bg-danger text-light">
                <tr>
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Edit</th> 
                    <th>Delete</th> 
                </tr>
            </thead>
            <tbody>
            @foreach ($ar_kategori as $row)
                <tr>
                    <td>{{ $row->idjenis }}</td>
                    <td>{{ $row->kategori }}</td>  
                    <td><a type="btn-sm" href="{{ route('kategori.edit', $row->id)}}" >
                      <i class="far fa-edit"></i>
                    </a></td>
                    <td>
                      <form method="POST" action="{{ route('kategori.destroy', $row->id) }}">
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
@endsection