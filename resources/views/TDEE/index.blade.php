@extends('layout.index')
@section('content')
<h2 class="m-0 font-weight-bold text-dark">Menghitung TDEE dan BMR</h2>
<br/>
<div class="card shadow mb-4">
  <div class="card-body">
<div class="card-body py-3">
	Note :<br/>
	<table class="table">
		<thead class="bg-danger text-light">
			<tr class="warning">
				<th>Aktifitas</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Sangat Ringan</td>
				<td>Hanya aktivitas biasa tanpa ada olahraga </td>
			</tr>
			<tr>
				<td>Ringan</td>
				<td>Olahraga Ringan 1-3x dalam 1 minggu </td>
			</tr>
			<tr>
				<td>Sedang</td>
				<td>Olahraga Sedang 3-5x 1 minggu </td>
			</tr>
			<tr>
				<td>Berat</td>
				<td>Olahraga Berat seperti gym 2x sehari, kerja fisik</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<form class="user" action="/new/tdee" method="POST">
		@csrf
		<div class="row">
			<div class="col-md-6">
				<label>Jenis Kelamin</label>
				<select class="form-control" name="gender">
					<option value="">Gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</div>
			<div class="col-md-6">
				<label>Aktifitas</label>&nbsp;&nbsp;
				<select class="form-control" name="aktifitas">
					<option value="">Aktifitas</option>
					<option value="1.2">Sangat Ringan</option>
					<option value="1.375">Ringan</option>
					<option value="1.725">Sedang</option>
					<option value="1.9">Berat</option>
				</select>

			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-4">
				<label>Berat Badan (kg)</label>&nbsp;&nbsp;
				<input class="form-control" type="text" name="BB">
			</div>
			<div class="col-md-4">
				<label>Tinggi Badan (cm)</label>&nbsp;&nbsp;
				<input class="form-control" type="textArea" name="TB">
			</div>
			<div class="col-md-4">
				<label>Usia (Tahun)</label>&nbsp;&nbsp;
				<input class="form-control" type="textArea" name="U">
			</div>
		</div>
		<br/>
		<center>
			<button class="btn btn-danger" type="submit" name="kirim">Hitung</button>
		</center>
	</form>
	<br/>
	<div class="card mb-4 py-3 border-bottom-danger">
		<div class="card-body">
			<center>
				Jadi Kalori dalam Tubuh Anda adalah : <br/> 
				@if (session()->has('kb'))
				{{ session()->get('kb') }}
				@endif
			</center>
		</div>
	</div>
</div>
</div>
</div>
@endsection