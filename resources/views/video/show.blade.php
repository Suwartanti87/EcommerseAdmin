@extends('layout.index')
@section('content')
@php
@endphp
<div class="container-fluid">
	<div align="left">
		<a href="/vid" class="btn btn-info btn-md">Kembali</a>
	</div>
	<br/>
	<div class="row">
		@foreach ($data as $video)
		<div class="col-md-12 auto">
			<div class="col-lg-12">            
				<div class="card mb-2">     
					<div class="card-body">
						@if (! empty($video->nama))
						<div class="row">
							<div class="col-md-6">
								<center>
									<video width="320" height="240"  controls>
										<source src="{{ asset('video/'.$video->nama) }}" type="video/mp4" width="auto">
										</video>
									</center>
								</div>
								<div class="col-sm-6"><br/><br/>Nama File :&nbsp;
									{{ $video->nama }}
									<a href="{{ $video->link }}" target="blank">klik disini</a>
									<br/>Link : &nbsp;
									{{ $video->link }}<br/>
									Judul : &nbsp;
									{{ $video->judul }}
									<br/><p>Keterangan : &nbsp;
										{{ $video->deskripsi }}
									</p>		
								</div>
							</div>
							@else
							<video src="{{asset('video')}}/nopoto.png" width="10%"></video>
							@endif
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endsection