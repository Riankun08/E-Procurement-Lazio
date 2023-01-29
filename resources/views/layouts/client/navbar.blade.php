<nav class="navbar navbar-expand-lg fixed-top bg-light" id="top-nav">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{asset('template/base-website/assets/image/logo-naira.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item" id="navitem">
                    <a class="nav-custom" href="#home">Home</a>
                </li>
                <li class="nav-item" id="navitem">
                    <a class="nav-custom" href="#our-menu">Produk</a>
                </li>
                <li class="nav-item" id="navitem">
                    <a class="nav-custom" href="#testimonial">Testimonial</a>
                </li>
            </ul>
            @if(@auth('customer')->user()->role == "customer") 
            <div class="dropdown">
                <button class="button-auth-nav"><i class="fas fa-user"></i> {{ auth('customer')->user()->name }}</button>
                <div class="dropdown-content">
                <a href="{{ route('client.profile' , Crypt::encryptString(auth('customer')->user()->id)) }}">Profile</a>
                <a href="{{ route('client.logout') }}">Keluar</a>
                </div>
              </div>
                @else
                <span class="navbar-text">
                <a href="{{ route('client.login') }}"><button class="btn-auth-cs" id="btn-sign">Login</button></a>
                </span>
                @endif
        </div>
    </div>
</nav>