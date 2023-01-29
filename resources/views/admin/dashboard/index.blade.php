@extends('layouts.admin.app')
@section('title' , $title)
@section('content')
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-comments"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Komentar</h4>
            </div>
            <div class="card-body">
              {{ @$testimonial }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-th-large"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Produk</h4>
            </div>
            <div class="card-body">
              {{ @$product }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-chalkboard-teacher"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Order</h4>
            </div>
            <div class="card-body">
              {{ @$order }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pengguna</h4>
            </div>
            <div class="card-body">
              {{ @$user }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header text-center">
            <h3>Selmat Datang Admin {{ auth()->user()->name }} !</h3>
          </div>
          <div class="card-body">
          </div>
        </div>
      </div>
    </div>
@endsection

@section('libraiesJS')
<!-- JS Libraies -->
<script src="{{ asset('template/base-admin/dist/assets/modules/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/chart.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('template/base-admin/dist/assets/js/page/index.js')}}"></script>
@endsection

@section('script')
    <script>
      
    </script>
@endsection