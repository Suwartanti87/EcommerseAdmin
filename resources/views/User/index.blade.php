@extends('layout.index')
@section('content')
@php
$data = App\Akun::All();
$no = 1;
@endphp
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <center>
      <h1 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h1>
      </center>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <center>
          <a href="{{ url('/account/create') }}" class="btn btn-dark btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
        </center>
        <br/>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($data as $user)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $user->name}}</td>
              <td>{{ $user->email  }}</td>
              <td>{{ $user->password}}</td>
              <td>               
                <form method="POST" action="{{ route('account.destroy', $user->id) }}">

                  <a href="{{ route('account.edit', $user->id)}}">
                   <i class="fas fa-pencil-alt">Update</i>
                 </a>
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-link" onclick="return confirm('Yakin Mau Di Hapus?')">
                  <i class="fas fa-trash-alt">Delete</i>
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
</div>



@endsection