<h2 class="h5 no-margin-bottom">Dashboard</h2>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div>
                      <a href="#">Pelanggan</a>

                    </div>
                    <div class="number dashtext-1">{{ $user }}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon icon-list"></i></div>
                      <a href="{{ url('view_product') }}">
                        Menu
                      </a>
                    </div>
                    <div class="number dashtext-2">{{ $product }}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon icon-pie-chart-1"></i></div>
                      <a href="{{ url('view_orders') }}">
                        Pesanan Selesai
                      </a>
                    </div>
                    <div class="number dashtext-3">{{ $orderComplete }}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon icon-info"></i></div>
                      <a href="{{url('verif_orders')}}">
                        Pesanan
                      </a>
                    </div>
                    <div class="number dashtext-4">{{ $orderInProggress }}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <!-- Admin Content -->
                    <div class="col-lg-12">
                        <div class="block">
                            <h3 class="text-center mb-4">Selamat Datang di Panel Admin Kantin</h3>
        
                            <p class="lead text-center">
                                Halaman ini merupakan panel admin untuk mengelola produk dan memantau penjualan di kantin. Admin memiliki akses untuk melihat daftar produk yang tersedia di kantin, memperbarui informasi produk, serta memantau laporan penjualan harian.
                            </p>
        
                            <h4 class="mt-5">Mengelola Produk</h4>
                            <p>
                                Di bagian ini, admin dapat melihat daftar produk yang dijual di kantin, seperti Mie Goreng, Ayam Goreng, dan Nasi Komplit. Setiap produk mencakup informasi harga, stok, dan jumlah produk yang telah terjual. Admin dapat melakukan pembaruan harga, menambah atau mengurangi stok sesuai dengan kebutuhan, serta memantau ketersediaan produk yang ada.
                            </p>
        
                            <h4 class="mt-5">Laporan Penjualan</h4>
                            <p>
                                Pada bagian laporan penjualan, admin dapat memantau total pendapatan yang telah dihasilkan dari penjualan produk di kantin. Informasi ini sangat berguna untuk mengetahui performa penjualan dan membantu perencanaan keuangan kantin.
                            </p>
        
                            <h4 class="mt-5">Menambah Produk Baru</h4>
                            <p>
                                Admin juga dapat menambah produk baru ke dalam daftar kantin dengan mengisi nama produk, harga, dan stok awal. Produk baru ini akan segera muncul di halaman depan untuk memudahkan pelanggan dalam memilih produk yang mereka inginkan.
                            </p>
        
                            <p class="text-center mt-5">
                                "mari kita lakukan yang terbaik hari ini, karena setiap usaha yang kita lakukan adalah bentuk ibadah"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
      </section>
      
        @include('admin.footer')