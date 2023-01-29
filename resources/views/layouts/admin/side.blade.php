<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html"><img src="{{ asset('template/base-admin/dist/assets/img/logo-naira-object.png') }}" class="img-fluid" alt=""></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html"><img src="{{ asset('template/base-admin/dist/assets/img/logo-naira-object.png') }}" class="img-fluid" alt=""></a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown {{ request()->is('admin/dashboard') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link {{ request()->is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">General Dashboard</a></li>
          </ul>
        </li>
        <li class="menu-header">Master Konten</li>
        <li class="dropdown {{ request()->is('admin/users*' , 'admin/products*' , 'admin/testimonials*' , 'admin/orders*' , 'admin/sizes*' , 'admin/colors*') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Master</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }} beep beep-sidebar" href="{{ route('admin.users.index') }}">Pengguna</a></li>                
            <li><a class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }} beep beep-sidebar" href="{{ route('admin.products.index') }}">Produk</a></li>                
            <li><a class="nav-link {{ request()->is('admin/testimonials*') ? 'active' : '' }} beep beep-sidebar" href="{{ route('admin.testimonials.index') }}">Testimonial</a></li>                
            <li><a class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }} beep beep-sidebar" href="{{ route('admin.orders.index') }}">Order</a></li>                
            <li><a class="nav-link {{ request()->is('admin/sizes*') ? 'active' : '' }} beep beep-sidebar" href="{{ route('admin.sizes.index') }}">Ukuran</a></li>                
            <li><a class="nav-link {{ request()->is('admin/colors*') ? 'active' : '' }} beep beep-sidebar" href="{{ route('admin.colors.index') }}">Warna</a></li>                
          </ul>
        </li>
        <li class="menu-header">Master Kalkulasi</li>
        <li class="dropdown {{ request()->is('admin/hotSales*') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-info-circle"></i> <span>Weighted Product</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link {{ request()->is('admin/hotSales*') ? 'active' : '' }} beep beep-sidebar" href="{{ route('admin.hotSales.index') }}">Penjualan Terlaris</a></li>                
          </ul>
        </li>
      </ul>
    </aside>
  </div>
