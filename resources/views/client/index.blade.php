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

  <div class="page-hero bg-image overlay-dark" style="background-image: url('{{asset('template/one-health/assets/img/bg_image_1.jpg')}}');">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make your life Easy</span>
        <h1 class="display-4">E-Procurement</h1>
        @if(@auth('customer')->user()->id == NULL)
        <a href="{{ route('client.products') }}" class="btn btn-primary">Cek Produk</a>
        @else
        <a href="{{ route('client.products.log') }}" class="btn btn-primary">Cek Produk</a>
        @endif
      </div>
    </div>
  </div>

  <div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Vendor Terbaru</h1>
      <div class="row mt-5">
        
        @foreach ($vendor as $item)
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <a href="blog-details.html" class="post-thumb">
                <img src="{{asset('image-save/image-vendor/' . @$item->user->image)}}" alt="">
              </a>
            </div>
            <div class="body">
              <h6><a href="blog-details.html">{{  @$item->name }}</a></h6>
              <p class="post-title" style="line-height: 25px"><a href="blog-details.html">{{  @$item->address }}</a></p>
              {{-- <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="{{asset('template/one-health/assets/img/logo-apotek-hdn-vol-1.png')}}" alt="">
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        @endforeach


        {{-- <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="{{ route('client.news') }}" class="btn btn-primary">Baca selengkapnya</a>
        </div> --}}

      </div>
    </div>
  </div> <!-- .page-section -->

@include('layouts.client.footer')

@include('layouts.client.script')  
</body>
</html>