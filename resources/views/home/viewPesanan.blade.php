<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
      
    h1{
        font-family: Lora;
        color: #31511E;
    }
    .container-menu{
        display: flex;
        flex-wrap: wrap;
    }
    .menu-content p{
        font-family: Futura PT;
        color: #31511E;
        font-size: 18px;
    }
    .menu-content{
        margin-left: 25px;
        margin-top: 10px;
        display: flex;
        justify-content:center;
        gap: 10px;
    }
      
    .container-pil{
        display: flex;
        gap: 10px;
        margin: 10px;
        border: none;
        padding: 10px;
    }
      
    .menu-item1{
        height: 144px;
        width: 144px;
    }
      
    .menu-item1 img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
      
    .menu-item2{
        display: block;
        margin: 0;
    }
    .footer {
        position: fixed;
        right: 0;
        bottom: 0;
        width: 144px;
        height: 72px;
        background-color: #31511E;
        color: white;
        text-align: center;
        margin: 32px;
        align-items: center;
        border-radius:8px;
        padding: 6px
    }
    .footer p {
        color: white;
        text-align: center;
        }
    .form-pesan {
        display: block;
        width: 50%px;
        padding: 10px;
        margin:32px;
    }
    .form-pesan input, .form-pesan textarea {
        border-radius: 8px;
    }
    
    
      </style>
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
  </div>
  <!-- end hero area -->


    <div style="width: 100%; align-items:center;text-align:center;margin-top:12px;">
        <h1>Pesanan</h1>
    </div>
    <div class="container-menu" style="height: 400px">
        @foreach ($orders as $item)
            <div class="menu-content">
                <div class="container-menul" style="width:100%;padding:0px;">
                    <div class="container-pil">
                        <div class="menu-item1" style="width: 72px;">
                            <img src="{{ asset('products/'.$item->product->image) }}" alt=""
                                style="max-width: 144px; max-height:144px; margin-right:10px; min-width: 144px; object-fit:cover;">
                        </div>
                        <div class="menu-item2" style="margin-left: 72px;">
                            <h2>{{ $item->product->title }}</h2>
                            <div class="detail" style="max-height:98px;">
                                <p>
                                    {{ $item->product->category ?? 'Kategori tidak ditemukan' }}<br>
                                    Rp. {{ $item->product->price ?? 0 }}<br>
                                </p>

                                <div class="kuantitas">
                                    <p>{{$item->status}}</p>
                                </div>
                                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    
    </div>   
   {{-- footer --}}

    
</body>


</html>