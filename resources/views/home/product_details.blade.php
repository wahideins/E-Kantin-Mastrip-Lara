<!DOCTYPE html>
<html>
  <style>
    ::-webkit-scrollbar{
      display: none;
      background-color: #FBFCFA;
  }
  ::-webkit-scrollbar-thumb{
      background-color: #31511E;
  }
  
  html{
      scroll-behavior: smooth;
      overflow-x: hidden;
  }
  a{
      text-decoration: none;
  }
  body{
      margin: 0;
  }
  
  
  .navcontainer{
      /* margin: 10px; */
      padding: 36px;
      width: 100%;
      height: 30px;
      display: flex;
      justify-content: space-around;
      position: fixed;
      top: 0;
      align-items: center;
      transition: background-color 0.7s ease;
  }
  
  .dummy{
      padding: 36px;
      width: 100%;
      height: 30px;
      display: flex;
      justify-content: space-around;
      top: 0;
      align-items: center;
      transition: background-color 0.7s ease;
  }
  
  .dummy button{
      border: none;
      background-color: #31511E;
      font-family: Lora;
      color: #FBFCFA;
      font-size: 32px;
      padding: 10px;
  }
  .dummy button:hover{
      border: none;
      background-color: #FBFCFA;
      font-family: Lora;
      color:  #31511E;
      font-size: 32px;
      padding: 10px;
  }
  
  .navhead-container{
      color: #31511E;
      width: 100px;
      max-height: 100px;
      display: flex;
      align-items: center;
      justify-content: flex-start;
  }
  .navhead-container a{
      color: #31511E;
      font-size: 175%;
  }
  .navbody-container ul, .navfoot-container ul {
      font-family: Futura PT;
      max-height: 100px;
      display: flex;
      flex-direction: row;
      justify-content: center;
      margin: 10px 50px;
      gap: 25px;
      list-style-type: none;
      align-items: center;
  }
  .navbody-container ul{
      font-family: Futura PT;
      max-height: 100px;
      display: flex;
      flex-direction: row;
      justify-content: center;
      margin: 10px 50px;
      gap: 75px;
      list-style-type: none;
  }
  
  .navbody-container a, .navfoot-container a{
      color: #31511E;
      text-decoration: none;
      font-size: 150%;
  }
  .navbody-container a:hover, .navfoot-container a:hover{
      color: #101110;
  }
  
  .navfoot-container{
      justify-content: flex-end;
      max-width: 100%;
  }
  /* END NAVBAR */
  
  h1,h2{
      font-family: Lora;
      color: #31511E;
  }
  p{
      font-family: Futura PT;
      color: #31511E;
      font-size: 24px;
  }
  .main-content{
      background-color: #FBFCFA;
      height: 100%;
      /* background-color: #a5a8a4; */
      padding-left: 10%;
      padding-top: 3%;
  }
  .h1{
      font-family: Lora;
      color: #31511E;
      margin: 0;
  }
  .container-h1 p{
      max-width: 75%;
      font-family: Futura PT;
      color: #31511E;
      font-size: 24px;
      margin: 0;
  }
  .container-button{
      width: 400px;
  }
  .container-button button {
      /* background-color: #101110; */
      border: none;
      display: flex;
      justify-content: center;
      margin-top: 5px;
  }
  
  .container-button button:hover{
      background-color: #31511E;
      color: #FBFCFA;
  }
  
  .container-image{
      max-width: 100%;
      max-height: 250px;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
  }
  
  img{
      width: 256px;
      height: 144px;
      object-fit: cover;
  }
  .image img{
      width: 100%;
      height: 100%;
      object-fit: cover;
  }
  .scrolled{
      background-color: aliceblue;
  }
  .search button{
      width: 25px;
  }
  
  .menu-content{
      margin-left: 25px;
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
  }
  
  .container-pil{
      display: flex;
      gap: 10px;
      margin: 10px;
      border: none;
      padding: 10px;
  }
  .menu-item1{
      margin: 0;
  }
  .menu-item1{
      height: 144px;
      width: 144px;
  }
  
  .menu-item1 img{
      min-width: 144px;
      min-height: 144px;
      max-width: 144px;
      max-height: 144px;
      object-fit: cover;
  }
  
  .menu-item2{
      display: block;
      margin: 0;
      padding: 0;
  }
  .menu-item2 p, .menu-item2 h2{
      margin: 0;
      padding: 0;
  }
  
  
  </style>
<head>
    @include('home.css')
    <style>
        .div_center{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }
        .detail-box{
            padding: 15px;
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


  
  <!-- start product area -->
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          {{$data->title}}
        </h2>
      </div>
      <div class="row">
        <div class="col-md-10">
          <div class="box">
              <div class="div_center">
                <img src="/products/{{ $data->image }}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{ $data->title }}</h6>
                <h6>Harga
                  <span>Rp. {{ $data->price }}</span>
                </h6>
              </div>
              <div class="detail-box">
                <h6>{{ $data->category }}</h6>
                <h6>Ketersediaan barang:
                  <span>{{ $data->quantity }}</span>
                </h6>
              </div>
              <div class="detail-box">
                  <p align="justify">{{ Str::limit($data->description, 1000) }}</p>
              </div>

          </div>
        </div>

    </div>
  </section>
  
  <!-- end product area -->

</body>

</html>