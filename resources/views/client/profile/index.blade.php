<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('layouts.client.navbar')

  <div class="page-banner overlay-dark bg-image" style="background-image: url('{{asset('template/one-health/assets/img/bg_image_1.jpg')}}');">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Profil {{auth('customer')->user()->name}}</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
        <div class="page-section">
            <div class="container">
            <h1 class="text-center wow fadeInUp">Data Profil Anda</h1>
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(auth('customer')->user()->image != NULL)
                    <img src="{{ asset('image-save/image-user/' . auth('customer')->user()->image  ) }}" class="image-width-profile" alt="Gambar Profil">
                    @else
                    <img src="{{ asset('image-save/famale-profile.svg')}}" alt="Gambar Profil" class="image-width-profile">
                    @endif
                </div>
            </div>

            <form class="contact-form mt-5" method="POST" action="{{ route('client.profile.update' , Crypt::encryptString(auth('customer')->user()->id)) }}">
                @csrf
                <div class="row mb-3">
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Nama anda..." value="{{ auth('customer')->user()->name }}" required>
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="phone">No. Telpon</label>
                    <input type="number" id="phone" class="form-control" name="phone" placeholder="No. Telpon" value="{{ auth('customer')->user()->phone }}" required>
                </div>
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email anda..." value="{{ auth('customer')->user()->email }}" required>
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="image">Gambar</label>
                    <input type="file" id="image" class="form-control" name="image" value="{{ auth('customer')->user()->image }}" required>
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" id="gender" required class="form-control">
                        <option selected>Pilih kelamin</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="address">Alamat</label>
                        <textarea id="address" class="form-control" rows="8" name="address">{{ auth('customer')->user()->address }}</textarea>
                </div>
                </div>
                <button type="submit" class="btn btn-primary wow zoomIn">Simpan</button>
            </form>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-block">
              <h3 class="sidebar-title">Cari Order</h3>
              <form action="#" class="search-form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                  <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                </div>
              </form>
            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Order Anda 
              </h3>
              <div class="blog-item">
                <a class="post-thumb" href="">
                  <img src="{{asset('template/one-health/assets/img/blog/blog_1.jpg')}}" alt="">
                </a>
                <div class="content">
                  <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h5>
                  <div class="meta">
                    <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                    <a href="#"><span class="mai-person"></span> Admin</a>
                    <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                  </div>
                </div>
              </div>
              <div class="blog-item">
                <a class="post-thumb" href="">
                  <img src="{{asset('template/one-health/assets/img/blog/blog_2.jpg')}}" alt="">
                </a>
                <div class="content">
                  <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h5>
                  <div class="meta">
                    <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                    <a href="#"><span class="mai-person"></span> Admin</a>
                    <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                  </div>
                </div>
              </div>
              <div class="blog-item">
                <a class="post-thumb" href="">
                  <img src="{{asset('template/one-health/assets/img/blog/blog_3.jpg')}}" alt="">
                </a>
                <div class="content">
                  <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h5>
                  <div class="meta">
                    <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                    <a href="#"><span class="mai-person"></span> Admin</a>
                    <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                  </div>
                </div>
              </div>
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

  @include('layouts.client.script')  
</body>
</html>