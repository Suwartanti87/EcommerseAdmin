
@extends('layout.index')
@section('content')

<h2 class="m-0 font-weight-bold text-dark">Product</h2>
<br/>
<div class="row">
  <div class="col-md-2">
    
  </div>
</div>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
    <table class="table table-striped">
      <thead class="bg-danger text-light">
        <tr>
          <th>Product ID</th>
          <th>QTY </th>
          <th>QTY CHANGE</th>
          <th>Tipe</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($ar_menu as $row)
        <tr>
          <td>{{ $row->product_id }}</td>
          <td>{{ $row->qty }}</td>
          <td>{{ $row->qtyChange }}</td> 
          <td>{{ $row->tipe }}</td>      

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection