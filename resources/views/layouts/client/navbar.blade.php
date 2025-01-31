<header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="{{asset('template/one-health/assets/img/logo-apotek-hdn-vol-1.png')}}" class="logo-navbar" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
              @if(@auth('customer')->user()->id != NULL)
                <li class="nav-item {{ (request()->is('open-shop')) ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('client.landing.log') }}">Beranda</a>
                </li>
              @else
              <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('client.landing') }}">Beranda</a>
              </li>
              @endif
              @if(@auth('customer')->user()->id != NULL)
              <li class="nav-item {{ (request()->is('abouts/open-shop')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('client.abouts.log') }}">Tentang</a>
              </li>
              @else
              <li class="nav-item {{ (request()->is('abouts')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('client.abouts') }}">Tentang</a>
              </li>
              @endif
              @if(@auth('customer')->user()->id != NULL)
              <li class="nav-item {{ (request()->is('products/open-shop')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('client.products.log') }}">Produk</a>
              </li>
              @else
              <li class="nav-item {{ (request()->is('products')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('client.products') }}">Produk</a>
              </li>
              @endif
              @if(@auth('customer')->user()->id != NULL)
              <li class="nav-item {{ (request()->is('contacts/open-shop')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('client.contacts.log') }}">Kontak</a>
              </li>
              @else
              <li class="nav-item {{ (request()->is('contacts')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('client.contacts') }}">Kontak</a>
              </li>
              @endif
            <li class="nav-item">
              @if(@auth('customer')->user()->id != NULL)
              {{-- <a class="btn btn-primary ml-lg-3" href="{{ route('client.profile' , Crypt::encryptString(auth('customer')->user()->id)) }}"><span class="icon mai-person"></span> {{ auth('customer')->user()->name }}</a> --}}
              @else
              <a class="btn btn-primary ml-lg-3" href="{{ route('client.register') }}">Register Vendor</a>
              @endif
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>