@extends('layouts.admin.app')
@section('title' , $title)
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tambah {{@$title}}</h4>
                <p class="card-description">
                  isi data dengan benar untuk tambah data
                </p>
            <form class="needs-validation" action="{{ route($route.'store') }}" method="POST" novalidate="" enctype="multipart/form-data">
                @csrf
                @include($view.'field')
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script src="{{asset('template/base-admin-new/js/file-upload.js')}}"></script>
@endsection