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
        <div class="col-lg-6">
        <div class="page-section">
            <div class="container">
            <h1 class="text-center wow fadeInUp">Data Profil Anda</h1>
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(auth('customer')->user()->image != NULL)
                    <img src="{{ asset('image-save/image-user/' . auth('customer')->user()->image  ) }}" class="image-width-profile" alt="Gambar Profil">
                    @elseif(auth('customer')->user()->gender == "Laki - Laki")
                    <img src="{{ asset('image-save/man-profile.svg')}}" alt="Gambar Profil" class="image-width-profile">
                    @elseif(auth('customer')->user()->gender == "Perempuan")
                    <img src="{{ asset('image-save/famale-profile.svg')}}" alt="Gambar Profil" class="image-width-profile">
                    @else
                    <img src="{{ asset('image-save/man-profile.svg')}}" alt="Gambar Profil" class="image-width-profile">
                    @endif
                </div>
            </div>

            <form class="contact-form mt-5" method="POST" action="{{ route('client.profile.update' , Crypt::encryptString(auth('customer')->user()->id)) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                <div class="col-md-6 py-2 wow fadeInLeft">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Nama anda..." value="{{ auth('customer')->user()->name }}" required>
                </div>
                <div class="col-md-6 py-2 wow fadeInRight">
                    <label for="phone">No. Telpon</label>
                    <input type="number" id="phone" class="form-control" name="phone" placeholder="No. Telpon" value="{{ auth('customer')->user()->phone }}" required>
                </div>
                <div class="col-md-6 py-2 wow fadeInLeft">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email anda..." value="{{ auth('customer')->user()->email }}" required>
                </div>
                <div class="col-md-6 py-2 wow fadeInRight">
                    <label for="image">Gambar</label>
                    <input type="file" id="image" class="form-control" name="image" value="{{ auth('customer')->user()->image }}" required>
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" id="gender" required class="form-control">
                        <option selected>Pilih kelamin</option>
                        <option value="Laki - Laki" {{ ( auth('customer')->user()->gender == "Laki - Laki") ? 'selected' : ''  }}>Laki - Laki</option>
                        <option value="Perempuan" {{ ( auth('customer')->user()->gender == "Perempuan") ? 'selected' : ''  }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-12 py-2 wow fadeInRight">
                  <label for="password">Password</label>
                  <input type="text" id="password" class="form-control" name="password" required placeholder="password">
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
        <div class="col-lg-6">
          <div class="sidebar">
            <div class="sidebar-block">
              <h3 class="sidebar-title">Cari Order</h3>
              <form action="#" class="search-form">
                <div class="form-group">
                  <input type="text" id="filter" class="form-control" placeholder="Ketik Sesuatu . . .">
                  <button type="button" class="btn"><span class="icon mai-search"></span></button>
                </div>
              </form>
            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Order Anda 
              </h3>
              @foreach ($orderUser as $order)
              <div class="blog-item" id="results">
                <div class="content">
                  <div>
                    <a class="post-thumb" href="">
                      <img src="{{asset('image-save/image-product/' . @$order->product->image)}}" alt="">
                    </a>
                  </div>
                  <div>
                    <h5 class="post-title" style="margin-bottom: 0px"><a href="#">{{ @$order->product->name }}</a></h5>
                    <h5 class="post-title" style="margin-bottom: 0px"><a href="#">
                      @if(@$order->status == "newOrder")
                      Order Baru
                      @elseif(@$order->status == "payOrder") 
                      Bayar Order
                      @elseif(@$order->status == "paidOrder") 
                      Order Terbayar
                      @elseif(@$order->status == "packingOrder") 
                      Order Di paking
                      @elseif(@$order->status == "deliveryOrder") 
                      Order sedang dikirim
                      @elseif(@$order->status == "successOrder") 
                      Order Sukses
                      @endif
                    </a></h5>
                    <div class="meta">
                      <a href="#"><span class="mai-card"></span> Rp. {{number_format(@$order->totalPrice + @$order->shipping)}}</a>
                      <a href="#"><span class="mai-chatbubbles"></span> {{ @$order->quantity }} pcs</a>
                    </div>
                  </div>
                  </div>
                <div>
                  <div class="d-flex">
                    @if(@$order->status == "newOrder")
                    @elseif(@$order->status == "payOrder") 
                    <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#paynow{{@$order->id}}">bayar</button>
                    @elseif(@$order->status == "paidOrder") 
                    @elseif(@$order->status == "packingOrder") 
                    @elseif(@$order->status == "deliveryOrder") 
                    @elseif(@$order->status == "successOrder") 
                    <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#commnet{{@$order->id}}">komentar</button>
                    @endif
                    <button type="button" class="btn btn-success m-1" data-toggle="modal" data-target="#struck{{@$order->id}}">Struk</button>
                  </div>
                  <div class="meta">
                  <a href="#">Ongkir : <span class="mai-card-outline"></span> Rp. {{ number_format(@$order->shipping) }}</a>
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

<!-- Modal -->
@foreach ($orderUser as $data)    
<form action="{{ route('client.profile.payment' , Crypt::encryptString(@$data->id)) }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="modal fade" id="paynow{{ @$data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal tagihan anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
          <div class="mb-3">
              <div class="group-detail-pay">
                  <div class="detail-name">
                      Produk
                  </div>
                  <div>
                      {{ @$data->product->name }}
                  </div>
              </div>
              <div class="group-detail-pay">
                  <div class="detail-name">
                      Pembayaran
                  </div>
                  <div>
                      {{ @$data->payment }} 
                      @if($data->payment == "COD")
                      @else
                      : 2290528987
                      @endif
                  </div>
              </div>
              <div class="group-detail-pay">
                  <div class="detail-name">
                      Jumlah
                  </div>
                  <div>
                      {{ @$data->quantity }} pcs
                  </div>
              </div>
              <div class="group-detail-pay">
                  <div class="detail-name">
                      Harga/1
                  </div>
                  <div>
                      Rp. {{ number_format(@$data->product->price) }}
                  </div>
                </div>
                <div class="group-detail-pay">
                  <div class="detail-name">
                    Harga Pembelian anda
                  </div>
                  <div>
                    Rp. {{ number_format(@$data->totalPrice) }}
                  </div>
                </div>
                <div class="group-detail-pay">
                  <div class="detail-name">
                      Ongkir
                  </div>
                  <div>
                      Rp. {{ number_format(@$data->shipping) }}
                  </div>
                </div>
                <div class="group-detail-pay">
                </div class="detail-name">
                    <div class="group-detail-pay">
                        <div>
                            Total Tagihan
                        </div>
                        <div>
                            Rp. {{ number_format(@$data->totalPrice + @$data->shipping) }}
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <h5>Lakukan Pembayaran</h5>
                    <p>silahkan lakukan Pembayaran sesuai dengan metode pembayaran anda dan barang akan segera di kirim, kirim bukti transfer pada form ini</p>
                    <input type="file" class="form-control" name="evidence" id="evidence">
                </div>
                </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-app-primary">Kirim</button>
            </div>
      </div>
  </div>
</div>
</div>
</form>
@endforeach

@foreach ($orderUser as $data)
<form action="{{ route('client.profile.comment' , Crypt::encryptString(@$data->id)) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="modal fade" id="commnet{{ @$data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Modal komentar</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="image">Gambar</label>
                        <input type="file"  class="form-control" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="message">Pesan</label>
                        <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
              <button type="submit" class="btn btn-app-primary">Kirim</button>
            </div>
        </div>
        </div>
      </div>
</form>
@endforeach

@foreach ($orderUser as $data)
@csrf
<div class="modal fade" id="struck{{ @$data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal struk anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
          <div class="group-detail-pay">
              <div class="detail-name">
                  Produk
              </div>
              <div>
                  {{ @$data->product->name }}
              </div>
          </div>
          <div class="group-detail-pay">
              <div class="detail-name">
                  Pembayaran
              </div>
              <div>
                  {{ @$data->payment }} 
                  @if($data->payment == "COD")
                  @else
                  : 2290528987
                  @endif
              </div>
          </div>
          <div class="group-detail-pay">
              <div class="detail-name">
                  Jumlah
              </div>
              <div>
                  {{ @$data->quantity }} pcs
              </div>
          </div>
          <div class="group-detail-pay">
              <div class="detail-name">
                  Harga/1
              </div>
              <div>
                  Rp. {{ number_format(@$data->product->price) }}
              </div>
            </div>
            <div class="group-detail-pay">
              <div class="detail-name">
                Harga Pembelian anda
              </div>
              <div>
                Rp. {{ number_format(@$data->totalPrice) }}
              </div>
            </div>
            <div class="group-detail-pay">
              <div class="detail-name">
                  Ongkir
              </div>
              <div>
                  Rp. {{ number_format(@$data->shipping) }}
              </div>
            </div>
            <div class="group-detail-pay">
            </div class="detail-name">
                <div class="group-detail-pay">
                    <div>
                        Total Tagihan
                    </div>
                    <div>
                        Rp. {{ number_format(@$data->totalPrice + @$data->shipping) }}
                    </div>
                </div>
            </div>
            </div>
  </div>
    </div>
</div>
@endforeach


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