 @extends('layout.index')
@section('content')

<div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Tambah Akun</h1>
                  </div>
                  
                  <form class="user" enctype="multipart/form-data" method="POST" action="{{route('account.store')}}">
                    @csrf
                    
                    <div class="form-group row">
                    <div class="form-group col-lg-6">
                      <input type="text" class="form-control " id="name" name="name" placeholder="Input Nama" value="">
                    </div>
                    <div class="form-group col-lg-6">
                      <input type="email" class="form-control " id="email" name="email" placeholder="Alamat Email" value="">
                    </div>
                  
                    </div>
                    <div class="form-group row">
                    <div class="form-group col-lg-6">
                      <input type="password" class="form-control " id="password" name="password" placeholder="Password" value="">
                    </div>
                    <div class="form-group col-lg-6">
                      <select name="role" class="form-control" id="exampleFormControlSelect1"  placeholder="Kategori">
                      <option value="">Pilih Role </option>
                      <option value="admin">Admin</option>
                      <option value="user">User</option>
                    </select> 
                    </div>
                  
                    </div>                  
                    </div>
                    <center>
                    <button type="submit" class="btn btn-info">Simpan</button>
                    </center>
                    
                  </form>
                  
            </div>
          
        </div>
</div>
@endsection