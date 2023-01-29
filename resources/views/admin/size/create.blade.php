@extends('layouts.admin.app')
@section('title' , $title)
@section('button-submit' , 'Buat')
@section('content')
<div class="section-header">
  <h1>Buat {{ @$title  }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">{{@$title}}</a></div>
    <div class="breadcrumb-item">Buat {{@$title }}</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4>Masukan data input dengan Benar</h4>
          </div>
        <div class="card-body">
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

@section('libraiesJS')
  <script>
    
  </script>
@endsection

@section('script')
    <script>
      
    </script>
@endsection