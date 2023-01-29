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
                        <a class="nav-custom" href="#home"><img src="./assets/image/logo-naira.png" alt=""></a>
                    </li>
                </ul>
                @if(@auth('customer')->user()->role == "customer") 
                <div class="dropdown">
                    <button class="button-auth-nav"><i class="fas fa-user"></i> {{ auth('customer')->user()->name }}</button>
                    <div class="dropdown-content">
                    <a href="#">Profile</a>
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

    <form action="{{ route('client.success.order' , Crypt::encryptString($order->id)) }}" method="post">
    @csrf
    <div class="container">
        <div class="row margin-top-banner margin-bottom-banner">
            <div class="col-md-12 mb-4">
                <span class="breakpoint-cs"><a href="#">Home</a> / Product / <span class="litle-breakpoint-cs fw-bold">Checkout</span></span>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-3">
                                <h2 class="fw-bold ">Detail Pengiriman</h2>
                            </div>
                            <div class="form-floating col-md-6">
                                <div class="mb-3">
                                <input type="text" class="form-control p-3" placeholder="Nama Lengkap" name="name" value="{{ auth('customer')->user()->name }}" required>
                              </div>
                              <div class="">
                                <input type="text" class="form-control p-3" placeholder="Kota" name="city" required>
                              </div>
                            </div>

                            <div class=" form-floating col-md-6 mb-3">
                                <div class="mb-3">
                                    <input type="number" class="form-control p-3" placeholder="No HP" name="phone" value="{{ auth('customer')->user()->phone }}" required>
                                </div>
                                <div class="">
                                    <input type="text" class="form-control p-3" placeholder="Kacamatan" name="district" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-floating">
                                    <textarea type="textarea" name="address" class="form-control" placeholder="Nama Lengkap" required id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Alamat Lengkap</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                    <h3 class="fw-bold ">Detail Pembayaran</h3>
                                        <!-- <label for="validationDefault04" class="form-label">State</label> -->
                                        <select class="form-select p-3" id="validationDefault04" name="payment" required>
                                          <option selected disabled>Metode Pembayaran</option>
                                          <option value="BCA">BCA - 2290528987</option>
                                          <option value="MANDIRI">MANDIRI - 2290528987</option>
                                          <option value="COD">Cash on Delivery - Bayar di tempat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div style="margin-left: 20px;">
                            <div class="mb-4">
                                <h2 class="fw-bold ">Produk Kamu</h2>
                        </div>
                        <div>
                            <div class="card-cs mb-4" style="background: #FBFBFB;
                            border-radius: 7px; width: 505px; height: 380px;">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset('image-save/image-product/' . $order->product->image) }}" alt="" style="width: 150px;
                                                height: 150px; margin-top: 25px; margin-left: 25px; border: 3px solid #EDEDED; border-radius: 6px;">
                                            </div>
                                            <div class="col-md-8 mb-4">
                                                <div class="" style="margin-top: 50px; margin-left: 20px;">
                                                    <h6 class="fw-bold mb-2">{{$order->product->brand }}</h6>
                                                    <h4 class="fw-bold mb-3">{{ $order->product->name }}</h4>
                                                    <h3 class="fw-normal" style="color: #019267;">Rp. <samp class="fw-bold" style="color: #019267;">{{ number_format($order->product->price) }},-</samp></h3>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-4">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <hr class="" style="width: 460px; height: 0px;">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="fw-semibold mb-2">Jumlah Pesanan :</p>
                                                        <p class="fw-semibold mb-2">Ukuran :</p>
                                                        <p class="fw-semibold mb-2">Warna :</p>
                                                        <p class="fw-semibold mb-2">Total :</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="fw-bold mb-3">{{ $order->quantity }} Produk</h6>
                                                        <h6 class="fw-bold mb-3">{{ $order->size->size }}</h6>
                                                        <h6 class="fw-bold mb-3">{{ $order->color->colorName }}</h6>
                                                        <h6 class="mb-3">Rp. <span class="fw-bold">{{ number_format($order->totalPrice) }},-</span></h6>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button class="btn btn-primary-cs" type="submit" style="width: 505px; height: 55px; color: white; background: linear-gradient(90deg, #096DE7 0%, #434FD7 52.07%, #6D3ACB 99.99%), linear-gradient(136.68deg, #0C82E9 0%, #0BDFF7 103.11%); box-shadow: 4px 4px 30px rgba(0, 0, 0, 0.15); border-radius: 6px;">
                            Buy Now
                        </button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer class="footer-detail">
        <span>Copyright 2023 | Naira - HD</span>
    </footer>



    <!-- Remove the container if you want to extend the Footer to full width. -->
    <!-- End of .container -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('template/base-website/assets/js/scroll.js')}}" type="text/javascript"></script>
    <script src="{{ asset('template/base-website/assets/js/action-navbar.js')}}" type="text/javascript"></script>
    <script src="{{ asset('template/base-website/assets/js/navbar.js')}}" type="text/javascript"></script>
    <script src="{{ asset('template/base-website/assets/js/plus-min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('template/base-website/assets/js/action-button.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>