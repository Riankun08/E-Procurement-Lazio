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
            <li class="breadcrumb-item active" aria-current="page">Berita</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Berita Kami</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">

            @foreach ($news as $item)
            <div class="col-sm-6 py-3">
              <div class="card-blog">
                <div class="header">
                  <div class="post-category">
                    <a href="#">{{@$item->theme}}</a>
                  </div>
                  <a href="{{ route('client.news.detail' , Crypt::encryptString(@$item->id)) }}" class="post-thumb">
                    <img src="{{asset('image-save/image-news/' . @$item->image)}}" alt="image news">
                  </a>
                </div>
                <div class="body">
                  <h5 class="post-title"><a href="{{route('client.news.detail' , Crypt::encryptString(@$item->id))}}">{{@$item->title}}</a></h5>
                  <div class="site-info">
                    <div class="avatar mr-2">
                      <div class="avatar-img">
                        <img src="{{asset('template/one-health/assets/img/logo-apotek-hdn.jpeg')}}" alt="">
                      </div>
                    </div>
                    <span class="mai-time"></span> {{ date('d-F-Y' , strtotime(@$item->datePost)) }}</div>
                </div>
              </div>
            </div>
            @endforeach

          </div> <!-- .row -->
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-block">
              <h3 class="sidebar-title">Cari Berita</h3>
              <form action="#" class="search-form">
                <div class="form-group">
                  <input type="text" class="form-control" id="filter" placeholder="Ketik Sesuatu.....">
                  <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                </div>
              </form>
            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Berita Terbaru 
              </h3>
              
            @foreach ($news as $item)
              <div class="blog-item" id="results">
                <a class="post-thumb" href="{{ route('client.news.detail' , Crypt::encryptString(@$item->id)) }}">
                  <img src="{{asset('image-save/image-news/' . @$item->image)}}" alt="image news">
                </a>
                <div class="content">
                  <h5 class="post-title"><a href="{{ route('client.news.detail' , Crypt::encryptString(@$item->id)) }}">{{@$item->title}}</a></h5>
                  <div class="meta">
                    <a href="#"><span class="mai-calendar"></span> {{ date('d-F-Y' , strtotime(@$item->datePost)) }}</a>
                  </div>
                </div>
              </div>
              @endforeach

            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Artikel</h3>
              <p>Rian E-Procurement merupakan sebuah aplikasi dan situs web asal Indonesia yang bergerak di bidang kesehatan ,perusahaan aplikasi ini didirikan pada tahun 2018 di Painan.
                beberapa investornya atara lain Blibli, Clermont, dan NSI Ventures. Rian E-Procurement mengumumkan kerjasama dengan Blibli pada bulan Mei 2020. Melalui kerja sama tersebut Blibli akan menghubungkan fitur Gomed di dalam aplikasi Gojek dengan aplikasi Rian E-Procurement.</p>
            </div>
          </div>
        </div> 
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .page-section -->

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
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .banner-home -->


  @include('layouts.client.footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
     $("#filter").keyup(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('#results').each(function() {

        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }
      });
    });
  </script>
  @include('layouts.client.script')  
</body>
</html>