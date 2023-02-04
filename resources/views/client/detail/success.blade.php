<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('layouts.client.navbar')

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 text-center">
            <h1 class="text-center mb-3">Order Sukses</h1>
            <p class="text-center mb-3">Order paket anda akan segera di kirim jika status sudah Delivery di konfirmasi Oleh Admin, dan anda telah menyelesaikan pembayaran jika memilih Bank Transfer</p>
            <img src="{{ asset('template/one-health/assets/img/order/success-payment-cod.png') }}" class="img-fluid mb-3" alt="image success pay">
            <a class="btn btn-primary" href="{{ route('client.landing.log') }}">Oke</a>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  

@include('layouts.client.footer')

@include('layouts.client.head')  
</body>
</html>