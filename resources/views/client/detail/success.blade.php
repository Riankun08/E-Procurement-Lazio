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
</head>

<body>
    @include('sweetalert::alert')
    <div class="container margin-success-order-page">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="group-image-success text-center">
                        @if($order->payment == 'BCA')
                        <img class="img-fluid" id="image-success-bank" src="{{ asset('template/base-website/assets/image/image-success-bank.png') }}" alt="">
                        <div class="col-md-12 mb-3">
                            <h4>Order Anda berhasil kami proses</h4>
                            <p>Terimakasih {{ auth('customer')->user()->name }} telah melakukan Order <br> Metode Pembayaran <strong>bank Transfer BCA</strong> nomer rekening : <strong>2290528987</strong></p>
                        </div>
                        @elseif($order->payment == 'MANDIRI')
                        <img class="img-fluid" id="image-success-bank" src="{{ asset('template/base-website/assets/image/image-success-bank.png') }}" alt="">
                        <div class="col-md-12 mb-3">
                            <h4>Order Anda berhasil kami proses</h4>
                            <p>Terimakasih {{ auth('customer')->user()->name }} telah melakukan Order <br> Metode Pembayaran <strong>bank transfer Mandiri</strong> nomer rekening : <strong>2290528987</strong></p>
                        </div>
                        @else
                        <img class="img-fluid" id="image-success" src="{{ asset('template/base-website/assets/image/image-cod.png') }}" alt="">
                        <h4>Order Anda berhasil kami proses</h4>
                        <p>Terimakasih {{ auth('customer')->user()->name }} telah melakukan Order <br> Metode Pembayaran Cash On Delivery : <strong>Pembayaran di tempat</strong></p>
                        @endif
                        <div class="col-md-12 mb-3">
                            <a href="{{ route('client.landing.log') }}" class="btn btn-back-intro" style="color: #FFFFFF;font-weight: bold; line-height: 30px;">Oke</a>
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