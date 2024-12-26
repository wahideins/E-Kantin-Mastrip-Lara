<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar" style="display: flex; justify-content:center; align-items:center; align-content:center;"><img width="200px" height="200px" src="{{ asset('images/haneul-kiss-of-life.gif') }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5"></h1>
          <p>Owner Kantin Mastrip</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
      <ul class="list-unstyled">
              <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
              <li><a href="{{ url('view_category') }}"> <i class="icon-grid"></i>Kategori </a></li>

              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Menu </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{ url('add_product') }}">Tambah Menu</a></li>
                  <li><a href="{{ url('view_product') }}">Lihat Menu</a></li>
                </ul>
              </li>

              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Pesanan </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{ url('verif_orders') }}"> <i class="icon-grid"></i>Dalam Proses</a></li>
                  <li><a href="{{ url('view_orders') }}"> <i class="icon-grid"></i>Selesai</a></li>
                </ul>
              </li>


             
      </ul>
    </nav>