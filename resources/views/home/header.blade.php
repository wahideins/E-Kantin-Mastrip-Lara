
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="{{url('/')}}">
        <h1>
          Kantin Mastrip
        </h1>
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/#list-menu')}}">
              Menu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/viewPesanan/{userId}')}}">
              Pesanan
            </a>
          </li>

        </ul>
        <div class="user_option">
          @if (Route::has('login'))
            @auth
            <a href="{{ url('mycart') }}" style="color: white">
              <i class="fa fa-shopping-bag" aria-hidden="true" style="color: antiquewhite"></i>
              {{ $count }}
            </a>
            <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true" style="color: antiquewhite"></i>
              </button>
            </form>
            <form style="padding: 10px;margin:10px;" method="POST" action="{{ route('logout') }}">
              @csrf
              <input class="btn btn-danger" type="submit" value="logout">
            </form>

            @else
          <a href="{{ url('/login') }}">
            <i class="fa fa-user" aria-hidden="true" style="color: antiquewhite"></i>
            <span style="color: antiquewhite">
              Login
            </span>
          </a>
          <a href="{{ url('/register') }}">
            <i class="fa fa-vcard" aria-hidden="true" style="color: antiquewhite"></i>
            <span style="color: antiquewhite">
              Register
            </span>
          </a>
          @endauth
        @endif


        </div>
      </div>
    </nav>
  </header>

