@include('admin.auth.layouts.head')
<!-- General JS Link -->
<body>
@include('sweetalert::alert')
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo" style="text-align: center">
              <img src="{{asset('template/base-admin-new/images/logo-apotek-hdn-vol-1.png')}}" alt="logo">
            </div>
            <h4>Hello! Admin E-Procurement</h4>
            <h6 class="font-weight-light">Masukan Akun anda untuk melakukan log in</h6>
              <div class="form-group">
                <input type="email" class="form-control form-control-lg"  id="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
              </div>
              <div class="mt-3">
                <button type="submit" id="submit"  name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
  <!-- General JS Scripts -->
  @include('admin.auth.layouts.script')
</body>
</html>
