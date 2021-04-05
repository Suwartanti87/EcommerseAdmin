@extends('layout.index')
@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <table class="table table-striped">
      <thead class="bg-danger text-light">
        <tr>
          <th>Pic</th>
          <th>Menu</th>
          <th>Harga</th>
          <th>Quantity</th>
          <th>How</th>
          <th>Add to Cart</th> 
          <th>Delete</th>
          <th>Update</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($product as $row)
        <tr>  
         <form action="{{url('/transaksi/addproduct/{id}', $row->id)}}" method="POST" >
          @csrf       
          <td width="15%">
          
              @if(!empty($row->foto))
                <img src="{{asset('img/menucake')}}/{{ $row->foto}}" width="35%" />
                @else
                <img src="{{asset('img')}}/nopoto.png" width="10%">
              @endif     
          </td>
          <td>{{ $row->nama }}</td>
          <td>RP. {{ number_format($row->harga) }}</td> 
          <td>{{ $row->qty }}</td>
          <td><!-- {{ $row->deskripsi }} --> <a href="{{ route('product.show', $row->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-book" ></i></a> 
          </td>
          <td>
            @if($row->qty == 0) 
            <button class="btn btn-primary btn-sm cart-btn disabled"><i class="fas fa-cart-plus"></i></button>
             @else
            <button type="submit" class="btn btn-primary btn-sm cart-btn"><i class="fas fa-cart-plus"></i></button>
            @endif
          </td>
          </form>
          <td>
            <form method="POST" action="{{ route('product.destroy', $row->id) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus?')">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
          <td>
            <button class="btn btn-success btn-sm"><i class="far fa-edit"></i></button>
            
            <!-- <a href="{{ route('menu.show', $row->id)}}"><i class="fas fa-book"></i></a>
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
            </form> -->
          </td> 

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<br>
<div class="card shadow mb-4">
  <div class="card-body">
            <div class="card" style="min-height:85vh">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4 class="font-weight-bold">Cart</h4>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div style="overflow-y:auto;min-height:53vh;max-height:53vh" class="mb-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th width="30%">Nama Product</th>
                                    <th width="30%">Qty</th>
                                    <th width="30%" class="text-right">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th width="60%">Sub Total</th>
                            <th width="40%" class="text-right">Rp.
                                <!--  --></th>
                        </tr>
                        
                        <tr>
                            <th>Total</th>
                            <th class="text-right font-weight-bold">Rp.
                                <!--  --></th>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-sm-4">
                            <form action="{{ url('/transaksi/clear') }}" method="POST">
                                @csrf
                                <button class="btn btn-info btn-lg btn-block" style="padding:1rem!important"
                                    onclick="return confirm('Apakah anda yakin ingin meng-clear cart ?');"
                                    type="submit">Clear</button>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary btn-lg btn-block"
                                style="padding:1rem!important" href="{{url('/transaksi/history')}}" target="_blank">History</a>
                            <!-- Kembangkan sendiri ya bagian ini, logikanya kita simpan cartnya sementara dalam databse ntar kalau butuh keluarin lagi-->
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-success btn-lg btn-block" style="padding:1rem!important"
                                data-toggle="modal" data-target="#fullHeightModalRight">Bayar</button>
                        </div>
                        
                    </div>
                    
                    
                </div>
            </div>
  </div>
</div>
@endsection