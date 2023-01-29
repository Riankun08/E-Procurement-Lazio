@include('admin.auth.layouts.head')
<!-- General JS Link -->
<body>
@include('sweetalert::alert')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{asset('template/base-admin/dist/assets/img/logo-naira.png')}}" alt="logo" width="100" class="shadow-light">
            </div>
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                {{-- <form method="POST" action="" class="needs-validation" novalidate=""> --}}
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" id="email" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" id="password" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; <a href="https://natajayaelektro.com/index.html#">Naira of Sneakers</a> 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  @include('admin.auth.layouts.script')
</body>
</html>
