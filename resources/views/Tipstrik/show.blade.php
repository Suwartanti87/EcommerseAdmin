@extends('layout.index')
@section('content')
  <div class="col-lg-12">
    <div align="left">
      <a href="/tips-and-trik" class="btn btn-info btn-md">Kembali</a>
    </div>
    <br/>
    <div class="row">
      @foreach($data as $diet)
      <div class="col-md-12 auto">
        <div class="col-lg-12">
          <div class="card mb-2">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <center>
                    @if(!empty($diet->foto))
                    <img src="{{asset('img/tips')}}/{{ $diet->foto}}" width="100%" />
                    @endif
                  </center>
                </div>
                <div class="col-md-6">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $diet->idmenu }}</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $diet->nama }}</a></div>
                  {{ $diet->kode }}
                  <br>
                  {{ $diet->keterangan }}
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
