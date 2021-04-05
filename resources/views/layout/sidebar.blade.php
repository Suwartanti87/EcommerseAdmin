 @php
 $ar_kategori = App\Kategori::All();
 $ar_kategori1 = App\DietKategori::All();
 $ar_kategori2 = App\TiptrikKategori::All();
 @endphp
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="{{asset('img/logusty.png')}}" width="70%">
    </div>
    <div class="sidebar-brand-text mx-3"><img src="{{asset('img/ubsy.png')}}" width="90%"></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{url('/')}}">
      <i class="fas fa-igloo"></i>
      <span>Home</span></a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="/account">
        <i class="fas fa-glasses"></i>
        <span>Akun User</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!--<div class="sidebar-heading">
        Interface
      </div>-->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="/kategori">
          <i class="fas fa-bars"></i>
          <span>Kategori Menu</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/KategorimenuDiet">
            <i class="fas fa-bars"></i>
            <span>Kategori Menu Diet</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/KategoriTipsTrik">
              <i class="fas fa-bars"></i>
              <span>Kategori Tips & Trik</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-bars"></i>
                <span>Menu</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="/menu">Semua Menu Makanan</a>
                  <!--<h6 class="collapse-header">Custom Components:</h6>-->
                  @foreach($ar_kategori as $kateg)
                  <a class="collapse-item" href="{{ route('kategori.show', $kateg->idjenis)}}" class="nav-link">{{ $kateg->kategori }}</a>      
                  @endforeach
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTri" aria-expanded="true" aria-controls="collapsetri">
                <i class="fas fa-bars"></i>
                <span>Menu Diet</span>
              </a>
              <div id="collapseTri" class="collapse" aria-labelledby="headingTri" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="/MenuDiet">Semua Menu Diet</a>
                 @foreach($ar_kategori1 as $kateg)
                 <a class="collapse-item" href="{{ route('KategorimenuDiet.show', $kateg->idkategori)}}" class="nav-link">{{ $kateg->kategori }}</a>      
                 @endforeach
               </div>
             </div>
           </li>
           <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
              <i class="fas fa-bars"></i>
              <span>Tips & Trik</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/tips-and-trik">Semua Tips & Trik </a>
                @foreach($ar_kategori2 as $kateg)
                <a class="collapse-item" href="{{ route('KategoriTipsTrik.show', $kateg->idkategori)}}" class="nav-link">{{ $kateg->kategori }}</a>
                @endforeach
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/vid">
              <i class="fas fa-bars"></i>
              <span>Video</span></a>
            </li>          
            <li class="nav-item">
              <a class="nav-link" href="/tdee">
                <i class="fas fa-glasses"></i>
                <span>Hitung kebutuhan kalori</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/product">
                <i class="fas fa-bars"></i>
                <span>Product</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fas fa-bars"></i>
                <span>Transaksi Product</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fas fa-bars"></i>
                <span>History Product</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fas fa-bars"></i>
                <span>Transaksi</span></a>
              </li>

              <hr class="sidebar-divider d-none d-md-block">
              <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>
            </ul>