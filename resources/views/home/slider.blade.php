<section class="slider_section">
    <div class="slider_container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box"> 
                    <h1 style="font-size: 28px;">
                      Rasa Berbeda Tiap Hari, Semangat Membaca Tak Berhenti!
                    </h1>
                    <p align="justify">
                      Dengan makanan lezat dan bervariasi, kantin ini menjadi tempat yang sempurna untuk mengisi energi setelah asyik membaca atau belajar di perpustakaan
                    </p>
                  </div>
                </div>
                <div class="col-md-5 ">

                  @if($spesial)
                  <div class="img-box" style="display: block; position:relative;">
                    <p>Menu Spesial Hari Ini: {{$spesial->title}}</p>
                    <img style="width:400px;height:400px;object-fit:cover;position:relative;" src="products\{{$spesial->image}}" alt="Menu Habis" />
                    
                    <div style="padding: 10px">
                    <a href="{{ url('product_details', $spesial->id) }}" class="btn btn-success">Detail</a>
                    <a href="{{ url('add_cart',$spesial->id) }}" class="btn btn-success">+<i class="fa fa-shopping-bag" aria-hidden="true" style="color: antiquewhite"></i></a>
                    </div>

                  </div>
                  @else
                      <P>Menu Spesial Hari Ini</P>
                      <h1>Tidak ada produk spesial</h1>
                  @endif


                  {{-- <div class="img-box" style="display: block; position:relative;">
                    <p>Menu Spesial Hari Ini: {{$spesial->title}}</p>
                    <img style="width:400px;height:400px;object-fit:cover;position:relative;" src="products\{{$spesial->image}}" alt="Menu Habis" />
                    
                    <div style="padding: 10px">
                    <a href="{{ url('product_details', $spesial->id) }}" class="btn btn-success">Detail</a>
                    <a href="{{ url('add_cart',$spesial->id) }}" class="btn btn-success">+<i class="fa fa-shopping-bag" aria-hidden="true" style="color: antiquewhite"></i></a>
                    </div>

                  </div> --}}
                </div>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </section>