@extends('layout.index')
@section('content')
<div class="col-lg-12">
  <div align="left">
    <a href="/product" class="btn btn-info btn-md">Kembali</a>
  </div>
  <br/>
  <div class="row">
    @foreach($data as $product)
    <div class="col-md-12 auto">
      <div class="col-lg-12">
        <div class="card mb-2">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <center>
                  @if(!empty($product->foto))
                  <img src="{{asset('img/menucake')}}/{{ $product->foto}}" width="80%" />
                  @endif
                </center>
              </div>
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $product->qty }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $product->nama }}</a></div>
                {{ $product->harga }}
                <br>
                {{ $product->deskripsi }}
                <br>
                <a href="#" style="display: inline-block;"><i class="fas fa-cart-plus"></i></a>
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
