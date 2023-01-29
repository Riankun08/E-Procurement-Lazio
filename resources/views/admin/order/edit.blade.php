@extends('layouts.admin.app')
@section('title' , $title)
@section('button-submit' , 'Edit')
@section('content')
<div class="section-header">
  <h1>Edit {{ @$title  }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">{{@$title}}</a></div>
    <div class="breadcrumb-item">Edit {{@$title }}</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">
              <h4>Masukan data input dengan Benar</h4>
          </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="needs-validation" action="{{ route($route.'update' , Crypt::encryptString($data->id)) }}" method="POST" novalidate="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include($view.'field')
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center">
        <div class="card-body">
          @if(@$data->payment == 'COD')
          <h4>Cash On Delivery</h4>
          <img src="{{ asset('template/base-website/assets/image/image-cod.png') }}" class="img-fluid" alt="gambar COD">
          @else
          <h4>Gambar Bukti Transfer</h4>
          <img src="{{ asset('image-save/image-order/' . @$data->evidence) }}" class="img-fluid" alt="Bukti Transfer Belum ada">
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('libraiesJS')
<script>

</script>
@endsection

@section('script')
    <script>
      
    </script>
@endsection