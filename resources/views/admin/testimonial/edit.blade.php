@extends('layouts.admin.app')
@section('title' , $title)
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit data</h4>
                <p class="card-description">
                  isi data dengan benar untuk edit data
                </p>
                    <form class="needs-validation" action="{{ route($route.'update' , Crypt::encryptString($data->id)) }}" method="POST" novalidate="" enctype="multipart/form-data">
                      <div class="row">
                        @csrf
                        @method('PUT')
                        @include($view.'field')
                      </div>
                      </form>
                </div>
            </div>
          </div>
      <div class="col-lg-4 grid-margin stretch-card">
        <div class="card text-center">
          <div class="card-body">
            <h4>Gambar Testimonial</h4>
            <img src="{{asset('image-save/image-testimonial/' . @$data->image)}}" class="img-fluid" alt="">
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script src="{{asset('template/base-admin-new/js/file-upload.js')}}"></script>
@endsection