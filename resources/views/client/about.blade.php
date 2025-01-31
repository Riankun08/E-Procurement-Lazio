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

  <div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">
          <a class="navbar-brand" href="#" style="width: 100%;text-align: center;">
            <img src="{{asset('template/one-health/assets/img/logo-apotek-hdn-vol-1.png')}}" class="logo-navbar" alt="">
          </a>
          <br>
          <br>
          {{-- <h1 class="text-center mb-3">Selamat datang di E - Procurement </h1> --}}
          <div class="text-lg">
            <p>
              Selamat datang di platform e-Procurement kami, solusi digital yang mempermudah proses pengadaan barang dan jasa secara transparan, efisien, dan akuntabel. Kami hadir untuk membantu organisasi, instansi pemerintah, serta perusahaan dalam menjalankan proses pengadaan dengan cara yang lebih modern dan terintegrasi.
              <br><br>
              Kami mengutamakan transparansi dan keamanan dalam setiap transaksi, memastikan bahwa setiap langkah pengadaan berlangsung dengan adil dan sesuai regulasi yang berlaku. Dengan menggunakan teknologi terbaru, platform kami memungkinkan pengguna untuk melakukan proses tender, seleksi, dan pemilihan vendor dengan cepat dan mudah.
              <br><br>
              Misi kami adalah untuk memberikan pengalaman pengadaan yang lebih baik dengan memberikan solusi yang mudah digunakan, mengurangi birokrasi, dan meningkatkan efisiensi operasional. Kami berkomitmen untuk mendukung pertumbuhan ekonomi yang lebih inklusif dengan membuka peluang bagi penyedia barang dan jasa dari berbagai sektor.
              <br><br>
              Bergabunglah dengan kami dalam menciptakan ekosistem pengadaan yang lebih terbuka, terpercaya, dan berkelanjutan!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('layouts.client.footer')

@include('layouts.client.script')  
</body>
</html>