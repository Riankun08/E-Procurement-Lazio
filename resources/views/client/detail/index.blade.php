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
                        <a class="nav-custom" href="#home"><img src="{{ asset('template/base-website/assets/image/logo-naira.png')}}" alt=""></a>
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

    <div class="container">
        <div class="row margin-top-banner margin-bottom-banner">
            <div class="col-md-12 mb-3">
                <span class="breakpoint-cs"><a href="{{ route('client.landing.log') }}">Home</a> / <span class="litle-breakpoint-cs">Product</span></span>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('image-save/image-product/' . @$data->image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6">
                        <span class="fw-bold">{{ @$data->brand }}</span>
                        <h3 class="fw-bold">{{@$data->name}}</h3>
                        <h1 class="text-price-detail"><span class="litle-span">Rp</span> {{ number_format(@$data->price) }},-</h1>
                        <span class="fw-bold">Detail : </span>
                        <p class="detail-cs-text">{{ @$data->description }}.</p>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <span class="detail-cs-text">Jumlah Stock : <span class="fw-bold">{{ @$data->quantity }} pcs</span></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <span class="detail-cs-text">Ukuran : 
                                    <span class="fw-bold">
                                        @foreach ($data->sizeProduct as $item)
                                            {{@$item->size->size}} / 
                                        @endforeach
                                    </span>
                                </span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <span class="detail-cs-text">Warna : 
                                    <span class="fw-bold">
                                        @foreach ($data->colorProduct as $item)
                                            {{ @$item->color->colorName }} /
                                        @endforeach
                                    </span>
                                </span>
                        </div>
                        </div>
                        <div class="row">
                            <form action="{{ route('client.store.order' , Crypt::encryptString(@$data->id)) }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="button" value="-" class="button-minus" data-field="quantity">
                                                <input type="number" step="1" max="" required name="quantity" class="quantity-field">
                                                <input type="button" value="+" class="button-plus" data-field="quantity">
                                            </div>                                          
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <select name="sizeId" class="form-control" id="sizeId" required>
                                                <option selected value="">Pilih ukuran</option>
                                                @foreach ($data->sizeProduct as $item)
                                                    <option value="{{ @$item->size->id }}">{{ @$item->size->size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3"> 
                                            <select name="colorId" class="form-control" id="colorId" required>
                                                <option selected value="">Pilih warna</option>
                                                @foreach ($data->colorProduct as $item)
                                                <option value="{{ @$item->color->id }}">{{ @$item->color->colorName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-buy-order" style="color: white; font-weight: bold;">Checkout</button>
                                </div>
                            </form>
                        </div>
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