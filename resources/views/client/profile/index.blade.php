<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Naira Sneakers</title>
    <link rel="shortcut icon" href="{{asset('template/base-website/assets/image/logo-naira-object.png')}}">
    
    <link rel="stylesheet" href="{{asset('template/base-website/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/base-website/assets/css/detail.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            .margin-top-banner {
                margin-top: 150px;
            }
            .margin-bottom-0 {
                margin-bottom: 0px;
            }
        </style>
</head>

<body>
  @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg fixed-top bg-light" id="top-nav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item" id="navitem">
                        <a class="nav-custom" href="#home"><img src="{{asset('template/base-website/assets/image/logo-naira.png')}}" alt=""></a>
                    </li>
                </ul>
                @if(@auth('customer')->user()->role == "customer") 
                <div class="dropdown">
                    <button class="button-auth-nav"><i class="fas fa-user"></i> {{ auth('customer')->user()->name }}</button>
                    <div class="dropdown-content">
                    <a href="{{ route('client.profile' , Crypt::encryptString(auth('customer')->user()->id)) }}">Profile</a>
                    <a href="{{ route('client.logout') }}">Keluar</a>
                    </div>
                  </div>
                    @else
                    <span class="navbar-text">
                    <a href="{{ route('client.login') }}"><button class="btn-auth-cs" id="btn-sign">Login</button></a>
                    </span>
                    @endif
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row margin-top-banner margin-bottom-banner">
            <div class="col-md-12 mb-4">
                <span class="breakpoint-cs"><a href="{{ route('client.landing.log') }}">Home</a> / <span class="litle-breakpoint-cs fw-bold">Profil</span></span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card-cs-profil">
                                <img src="{{asset('image-save/image-user/' . auth('customer')->user()->image)}}" class="img-profil mb-5" alt="">
                                <form action="{{ route('client.profile.update' , Crypt::encryptString(auth('customer')->user()->id)) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="grop-form">
                                            <div class="mb-4 text-profil">
                                                <input type="text" class="form-control p-3" name="name" placeholder="Nama Lengkap" value="{{ auth('customer')->user()->name }}" required>
                                        </div>
                                        <div class="mb-4 text-profil">
                                            <input type="email" class="form-control p-3" name="email" placeholder="Email" value="{{ auth('customer')->user()->email }}" required>
                                          </div>
                                          <div class="mb-4 text-profil">
                                            <input type="number" class="form-control p-3" name="phone" placeholder="No HP" value="{{ auth('customer')->user()->phone }}" required>
                                          </div>
                                          <div class="text-profil mb-4">
                                              <select class="form-control p-3" name="gender" required>
                                                  <option value="Laki - Laki" {{ @$data->gender == 'Laki - Laki' ? 'selected' : '' }}>Laki - laki</option>
                                                  <option value="Perempuan" {{ @$data->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-4 text-profil">
                                              <input type="file" class="form-control p-3" name="image" required value="{{ auth('customer')->user()->image }}">
                                            </div>
                                            <div class="mb-4 text-profil">
                                            <input type="password" name="password" class="form-control p-3" required placeholder="Password">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-cs-profil" style="color: #fff;" >Edit</button>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div>
                                    <p class="paragraf-font-3 f-700 app-black">Histori Pembelian</p>
                                </div>
                                @foreach ($orderUser as $data)                                    
                                <div class="card-cs-histori mb-3">
                                    <img src="{{ asset('image-save/image-product/' . @$data->product->image) }}" class="img-histori mx-3 my-3" alt="">
                                    <div class="card-body">
                                        <div class="grop-text">
                                            <div class="text-sukses">
                                                <div>
                                                    <p class="paragraf-font-6 f-600 app-dark-1 mb-1">{{ @$data->product->brand }}</p>
                                                </div>
                                                <div class="text-cs">
                                                    @if(@$data->status == "newOrder")
                                                    <label class="label-new">
                                                        Menunggu
                                                    </label>
                                                    @elseif(@$data->status == "payOrder")
                                                    <label class="label-pay">
                                                        Bayar
                                                    </label>
                                                    @elseif(@$data->status == "paidOrder")
                                                    <label class="label-paid">
                                                        Terbayar
                                                    </label>
                                                    @elseif(@$data->status == "packingOrder")
                                                    <label class="label-delivery">
                                                        Dikemas
                                                    </label>
                                                    @elseif(@$data->status == "deliveryOrder")
                                                    <label class="label-delivery">
                                                        Diantar
                                                    </label>
                                                    @elseif(@$data->status == "successOrder")
                                                    <label class="label-success">
                                                        Suksess
                                                    </label>
                                                    @elseif(@$data->status == "failedOrder")
                                                    <label class="label-failed">
                                                        Gagal
                                                    </label>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="paragraf-font-3 f-700 app-black margin-bottom-0">{{ @$data->product->name }}</p>
                                            <p class="paragraf-font-6 f-500 app-dark-2 margin-bottom-0">Jumlah pesanan : <span class="paragraf-font-6 app-black f-700">{{ @$data->quantity }} Produk</span>
                                                 Ukuran : <span class="paragraf-font-6 f-700 app-dark-1">{{ @$data->size->size }}</span> Warna : <span class="paragraf-font-6 f-700 app-dark-1">{{ @$data->color->colorName }}</span></p>
                                            <p class="paragraf-font-4 app-gray margin-bottom-0">Rp <span class="paragraf-font-1 app-gray f-700">{{ number_format(@$data->totalPrice) }},-</span> 
                                            @if(@$data->status == "payOrder") 
                                                <button class="transfer-bank" title="klik dan lakukan pembayaran" type="button" data-bs-toggle="modal" data-bs-target="#paynow{{ @$data->id }}">Bayar</button>
                                            @endif
                                            @if(@$data->status == "deliveryOrder") 
                                                <button class="transfer-bank" title="klik jika pesanan sudah sampai" type="button" data-bs-toggle="modal" data-bs-target="#confirm{{ @$data->id }}">konfirmasi</button>
                                            @endif
                                            @if(@$data->status == "successOrder") 
                                                <button class="transfer-bank" title="klik untuk komentar" type="button" data-bs-toggle="modal" data-bs-target="#comment{{ @$data->id }}">komentar</button>
                                            @endif
                                            <button class="transfer-bank" title="klik untuk Cek Struk" type="button" data-bs-toggle="modal" data-bs-target="#struck{{ @$data->id }}">Cek Struk</button>
                                            <span class="text-payment">{{ @$data->payment }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer-detail">
        <span>Copyright 2023 | Naira - HD</span>
    </footer>

    <!-- Modal -->
    @foreach ($orderUser as $data)
    <form action="{{ route('client.profile.payment' , Crypt::encryptString(@$data->id)) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="paynow{{ @$data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Struk Tagihan Anda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        {{ @$data->quantity }}
                    </div>
                </div>
                <div class="group-detail-pay">
                    <div class="detail-name">
                        Harga/1
                    </div>
                    <div>
                        Rp. {{ number_format(@$data->product->price) }}
                    </div>
                </div class="detail-name">
                     <div class="group-detail-pay">
                        <div>
                            Total Tagihan
                        </div>
                        <div>
                            Rp. {{ number_format(@$data->totalPrice) }}cre
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
                    <button type="submit" class="transfer-bank">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    @endforeach

    @foreach ($orderUser as $data)
    <form action="{{ route('client.profile.confirm' , Crypt::encryptString(@$data->id)) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="confirm{{ @$data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Struk Tagihan Anda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <p>Tekan Tombol Konfimasi untuk mengkonfirmasi pesanan anda sudah sampai pada tujuan yang di tentukan Terimakasih {{ auth('customer')->user()->name }}</p>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="transfer-bank">konfirmasi</button>
                </div>
            </div>
            </div>
        </div>
    </form>
    @endforeach

    @foreach ($orderUser as $data)
    <form action="{{ route('client.profile.comment' , Crypt::encryptString(@$data->id)) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="comment{{ @$data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">konfirmasi Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <button type="submit" class="transfer-bank">Kirim</button>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Struk Order Anda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        {{ @$data->quantity }} produk
                    </div>
                </div>
                <div class="group-detail-pay">
                    <div class="detail-name">
                        Harga/1
                    </div>
                    <div>
                        Rp. {{ number_format(@$data->product->price) }}
                    </div>
                </div class="detail-name">
                     <div class="group-detail-pay">
                        <div>
                            Total Tagihan
                        </div>
                        <div>
                            Rp. {{ number_format(@$data->totalPrice) }}
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Remove the container if you want to extend the Footer to full width. -->
    <!-- End of .container -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/js/scroll.js" type="text/javascript"></script>
    <script src="./assets/js/action-navbar.js" type="text/javascript"></script>
    <script src="./assets/js/navbar.js" type="text/javascript"></script>
    <script src="./assets/js/plus-min.js" type="text/javascript"></script>
    <script src="./assets/js/action-button.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>