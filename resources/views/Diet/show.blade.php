@extends('layout.index')
@section('content')

<div class="col-lg-12">
<div align="left">
  <a href="/MenuDiet" class="btn btn-info btn-md">Kembali</a>
</div>
<br/>
    <div class="row">
      @foreach($data as $menu)
       <div class="col-md-12 auto">
        <div class="col-lg-12">
          <div class="card mb-2">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                <center>
                @if(!empty($menu->foto))
                <img src="{{asset('img/menu')}}/{{ $menu->foto}}" width="85%" />
                @endif
              </center>
              </div>
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $menu->idmenu }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $menu->nama }}</a></div>
                {{ $menu->kode }}
                <br>
                {{ $menu->keterangan }}
              </div>
              <div class="col-auto">
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
