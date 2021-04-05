@extends('layout.index')
@section('content')

<h2 class="m-0 font-weight-bold text-dark">Menu</h2>
<br/>
<div class="row">
  <div class="col-md-2">
    <a href="{{ url('/menu/create') }}" class="btn btn-danger btn-block btn-sm"><i class="fas fa-plus"></i> &nbsp;Add</a>
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
            <a href="{{ route('menu.show', $row->id)}}"><i class="fas fa-book"></i></a>
          </td>
          <td>
            <a type="btn-sm" href="{{ route('menu.edit', $row->id)}}" ><i class="far fa-edit"></i></a>
          </td>
          <td>
            <form method="POST" action="{{ route('menu.destroy', $row->id) }}">
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
      <h3 class="m-0 font-weight-bold text-primary">Menu Makanan</h3>
    </center>
  </div>
  <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th width="10%">ID Menu / Kategori</th>
          <th>kode</th>
          <th>Menu</th>
          <th>foto</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       @foreach($data as $menu) 
       <tr>            
       <td>{{ $menu->idmenu }}</td> 
        <td>{{ $menu->kode }}</td>
        <td>{{ $menu->nama }}</td>
        <td width="15%">
          @if(!empty($menu->foto))
          <img src="{{asset('img/menu')}}/{{ $menu->foto}}" width="50%" />
          @else
          <img src="{{asset('img')}}/nopoto.png" width="10%">
        @endif</td>
        <td>
          <center>
           <form method="POST" action="{{ route('menu.destroy', $menu->id) }}">
             <a href="{{ route('menu.show', $menu->id)}}">
              <i class="fas fa-book"></i>
            </a>&nbsp; &nbsp;
            <a href="{{ route('menu.edit', $menu->id)}}">
             <i class="far fa-edit"></i></a> &nbsp;
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
</div> -->
@endsection