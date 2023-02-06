<footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Perusahaan</h5>
          <ul class="footer-menu">
            @if(@auth('customer')->user()->id != NULL)
            <li><a href="{{ route('client.abouts.log') }}">Tentang</a></li>
            @else
            <li><a href="{{ route('client.abouts') }}">Tentang</a></li>
            @endif
            @if(@auth('customer')->user()->id != NULL)
            <li><a href="{{ route('client.news.log') }}">Berita</a></li>
            @else
            <li><a href="{{ route('client.news') }}">Berita</a></li>
            @endif
            @if(@auth('customer')->user()->id != NULL)
            <li><a href="{{ route('client.contacts.log') }}">kontak</a></li>
            @else
            <li><a href="{{ route('client.contacts') }}">kontak</a></li>
            @endif
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Menu</h5>
          <ul class="footer-menu">
            @if(@auth('customer')->user()->id != NULL)
            <li><a href="{{ route('client.landing.log') }}">Beranda</a></li>
            @else
            <li><a href="{{ route('client.landing') }}">Beranda</a></li>
            @endif
            @if(@auth('customer')->user()->id != NULL)
            <li><a href="{{ route('client.abouts.log') }}">Tentang</a></li>
            @else
            <li><a href="{{ route('client.abouts') }}">Tentang</a></li>
            @endif
            @if(@auth('customer')->user()->id != NULL)
            <li><a href="{{ route('client.products.log') }}">Produk</a></li>
            @else
            <li><a href="{{ route('client.products') }}">Produk</a></li>
            @endif
            @if(@auth('customer')->user()->id != NULL)
            <li><a href="{{ route('client.news.log') }}">Berita</a></li>
            @else
            <li><a href="{{ route('client.news') }}">Berita</a></li>
            @endif
            @if(@auth('customer')->user()->id != NULL)
            <li><a href="{{ route('client.contacts.log') }}">kontak</a></li>
            @else
            <li><a href="{{ route('client.contacts') }}">kontak</a></li>
            @endif
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Produk</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Kontak</h5>
          <p class="footer-link mt-2">jln sutan sahir No.24, Painan, kec. IV Jurai Kab. Pesisir Selatan</p>
          <a href="#" class="footer-link">0895-1611-6280</a>
          <a href="#" class="footer-link">apotekHDN@gmail.com</a>

          <h5 class="mt-3">Media Sosial</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2023 <a href="https://macodeid.com/" target="_blank">HDN Apotek </a>. All right reserved</p>
    </div>
  </footer>