<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
</head>
<body>
  @include('sweetalert::alert')
  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('layouts.client.navbar')

  <div class="page-banner overlay-dark bg-image" style="background-image: url('{{asset('template/one-health/assets/img/bg_image_1.jpg')}}');">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tentang</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Tentang Kami</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-secondary text-white">
              <span class="mai-chatbubbles-outline"></span>
            </div>
            <p><span>Chat</span> with a doctors</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-primary text-white">
              <span class="mai-shield-checkmark"></span>
            </div>
            <p><span>One</span>-Health Protection</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-accent text-white">
              <span class="mai-basket"></span>
            </div>
            <p><span>One</span>-Health Pharmacy</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">
          <h1 class="text-center mb-3">Selamat datang di Pusat Kesehatan HDN </h1>
          <div class="text-lg">
            <p>
              Apotek HDN merupakan sebuah aplikasi dan situs web asal Indonesia yang bergerak di bidang kesehatan ,perusahaan aplikasi ini didirikan pada tahun 2018 di Painan.
              beberapa investornya atara lain Blibli, Clermont, dan NSI Ventures. Apotek HDN mengumumkan kerjasama dengan Blibli pada bulan Mei 2020.
            </p>
            <p>
              Melalui kerja sama tersebut Blibli akan menghubungkan fitur Gomed di dalam aplikasi Gojek dengan aplikasi Apotek HDN. Sehingga pengguna blibli akan langsung diarahkan ke aplikasi Apotek HDN untuk pemesanan kebutuhan medis seperti obat atau vitamin.
              Selain itu, Apotek HDN juga menjalin kerjasama dengan beberapa perusahaan asuransi.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section banner-home bg-image" style="background-image: url('{{asset('template/one-health/assets/img/banner-pattern.svg')}}');">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="{{asset('template/one-health/assets/img/mobile_app.png')}}" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="{{asset('template/one-health/assets/img/google_play.svg')}}" alt=""></a>
          <a href="#" class="ml-2"><img src="{{asset('template/one-health/assets/img/app_store.svg')}}" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

@include('layouts.client.footer')

@include('layouts.client.script')  
</body>
</html>