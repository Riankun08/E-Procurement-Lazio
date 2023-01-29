@include('layouts.admin.head')
{{-- head --}}
<body>
  @include('sweetalert::alert')
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      
      @include('layouts.admin.navbar')

      @include('layouts.admin.side')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>


      @include('layouts.admin.footer')
    </div>
  </div>

  <!-- General JS Scripts -->

  @include('layouts.admin.script')
</body>
</html>
