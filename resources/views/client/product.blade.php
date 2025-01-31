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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produk</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Produk Kami</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="row">

            @foreach ($product as $item)
            <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
              <div class="card-doctor">
                <div class="header">
                  <img src="{{asset('image-save/image-product/' .  @$item->image)}}" alt="image product">
                  <div class="meta text-center">
                    {{-- @if(@auth('customer')->user()->id != NULL) --}}
                      <a href="{{ route('client.product.detail' , Crypt::encryptString(@$item->id)) }}"><span class="mai-eye"></span></a>
                    {{-- @else
                      <a href="{{ route('client.login') }}"><span class="mai-eye"></span></a>
                    @endif --}}
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">{{ @$item->name }}</p>
                  <p class="text-sm mb-0">{{ @$item->category }}</p>
                  <p class="text-sm mb-0">{{ @$item->form }}</p>
                  <span class="text-sm text-grey">Rp. {{ number_format(@$item->price) }}</span>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

@include('layouts.client.footer')

@include('layouts.client.head')  
</body>
</html>