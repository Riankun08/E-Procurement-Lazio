<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('layouts.client.navbar')

  <div class="page-section pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <nav aria-label="Breadcrumb">
            <ol class="breadcrumb bg-transparent py-0 mb-5">
              @if(auth('customer')->user()->id != NULL)
              <li class="breadcrumb-item"><a href="{{ route('client.landing.log') }}">Beranda</a></li>
              @else
              <li class="breadcrumb-item"><a href="{{ route('client.landing') }}">Beranda</a></li>
              @endif
              @if(auth('customer')->user()->id != NULL)
              <li class="breadcrumb-item"><a href="{{route('client.news.log')}}">Berita</a></li>
              @else
              <li class="breadcrumb-item"><a href="{{route('client.news')}}">Berita</a></li>
              @endif
              <li class="breadcrumb-item active" aria-current="page">{{ @$data->title }}</li>
            </ol>
          </nav>
        </div>
      </div> <!-- .row -->

      <div class="row">
        <div class="col-lg-8">
          <article class="blog-details">
            <div class="post-thumb">
              <img src="{{asset('image-save/image-news/' . @$data->image)}}" alt="">
            </div>
            <div class="post-meta">
              <div>
                <a href="#">{{@$data->theme}}</a>  
              </div>
              <span class="divider">|</span>
              <div class="post-date">
                <a href="#">{{ date('d-F-Y' , strtotime(@$data->datePost)) }}</a>
              </div>
              <span class="divider">|</span>
            </div>
            <h2 class="post-title h1">{{@$data->title}}</h2>
            <div class="post-content">
              <p>{{ @$data->description }}</p>
            </div>
          </article> <!-- .blog-details -->
        
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
              <h3 class="sidebar-title">Berita Lainya</h3>
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