<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
</head>
<body>
@include('sweetalert::alert')
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
            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Kontak</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Kirim Kesan dan pesan anda pada kami</h1>
      <form class="contact-form mt-5" action="{{ route('client.FeedContact') }}" method="POST">
        @csrf
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nama lengkap....">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="subject">Subjek</label>
            <input type="text" id="subject" name="subject" class="form-control" placeholder="Ketik subjek..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Pesan</label>
            <textarea id="message" class="form-control" name="message" rows="8" placeholder="Ketik pesan.."></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary wow zoomIn">Kirim Pesan</button>
      </form>
    </div>
  </div>

@include('layouts.client.footer')

@include('layouts.client.script')  
<script src="{{asset('template/one-health/assets/js/google-maps.js')}}"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
</body>
</html>