<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/one-health/auth/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('template/one-health/auth/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template/one-health/auth/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('template/one-health/auth/css/style.css')}}">

    <link rel="shortcut icon" href="{{asset('template/one-health/assets/img/logo-apotek-hdn.jpeg')}}" type="image/x-icon">

    <title>Register Apotek HDN</title>
</head>
<body>
<!-- Sweetalert -->
<!-- @include('sweetalert::alert') -->
<!-- End Sweetalert -->
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{asset('template/one-health/auth/images/bg-auth.png')}}');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Register to <strong>Apotek HDN</strong></h3>
            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
            <form action="{{ route('client.register.submit') }}" method="post">
                @csrf
              <div class="form-group first">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" placeholder="Nama anda" id="name">
              </div>
              <div class="form-group last mb-3">
                <label for="phone">No. Telpon</label>
                <input type="number" class="form-control" name="phone" placeholder="No. Telpon" id="phone">
              </div>
              <div class="form-group last mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email anda" id="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" id="password">
              </div>
            <input type="submit" value="Daftar" class="btn btn-block btn-app-primary">
            <a href="{{route('client.login')}}" class="btn btn-block btn-secondary text-white">Masuk ?</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('template/one-health/auth/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('template/one-health/auth/js/popper.min.js')}}"></script>
<script src="{{asset('template/one-health/auth/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/one-health/auth/js/main.js')}}"></script>
</body>
</html>