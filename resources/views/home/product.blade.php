
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

h1{
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
.container-h1 h1{
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

.image{
    width: 256px;
    height: 144px;
}
.image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.scrolled{
    background-color: aliceblue;
}
.container-search{

    display: flex;
    padding: 20px;
    width: 100%;
}
.container-search form{
    display: flex;
    width: 100%;
}
.search-input{
    display: flex;
    width: 100%;
    height: 42px;
    margin-right: 8px;
}
.search-button{
    display: flex;
    width: 42px;
    height: 42px;
    margin-right: 8px;
    justify-content: center;
    align-items: center;
    border: 3px solid #31511E;
    border-radius: 4px;
    background: #FBFCFA;
    color: #31511E;
}
.search-button:hover{
    display: flex;
    width: 42px;
    height: 42px;
    margin-right: 8px;
    justify-content: center;
    align-items: center;
    border: 3px solid #31511E;
    border-radius: 4px;
    color: #FBFCFA;
    background: #31511E;
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
<section id="list-menu">
    <div class="container">
      <div class="heading_container heading_center">
        <h1>
          Daftar Menu
        </h1>
      </div>
      <div class="container-search" id="search">
        <form action="{{ url('/product_search_user') }}" method="GET">
            @csrf
            <input type="search" name="search" class="search-input" placeholder="Cari Menu...">
            <button class="search-button" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg></button>
        </form>
      </div>
      <div class="row">
          <div class="menu-content">
            @foreach ($product as $products)
          <div class="container-menul">
            <div class="container-pil">
              <div class="menu-item1">
                <img src="products\{{ $products->image }}" alt="">
              </div>
              <div class="menu-item2">
                <h2>{{ $products->title }}</h2>
                <div class="detail">
                  <p>{{ $products->category }}</p>
                  <p>Rp. {{ $products->price }}</p>
                </div>
                <div>
                  <a href="{{ url('product_details', $products->id) }}" class="btn btn-success">Detail</a>
                  <a href="{{ url('add_cart',$products->id) }}" class="btn btn-success">+<i class="fa fa-shopping-bag" aria-hidden="true" style="color: antiquewhite"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
  </section>