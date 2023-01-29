@extends('layouts.admin.app')
@section('title' , $title)
@section('button-submit' , 'Buat')
@section('content')
@section('size-input')
<div class="form-group row">
  <label class="col-sm-3 col-form-label">Opsi Ukuran</label>
  <div class="col-md-9">
      <div class="button-option d-flex justify-content-between">
          <div>
              <button type="button" id="remove" class="btn btn-danger">-</button>
          </div>
          <div>
              <button type="button" id="add" class="btn btn-success">+</button>
          </div>
      </div>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 col-form-label">Ukuran</label>
  <div class="col-sm-9">
      <div id="selectSize">
          <select name="sizeId[]" class="mb-3 form-control" required="">
            <option selected>Pilih ukuran</option>
            @foreach ($size as $sizes)
            <option value="{{ @$sizes->id }}"  >{{ @$sizes->size }} - {{ @$sizes->centimeter }} - {{ @$sizes->inch }}</option>
            @endforeach
          </select>
  </div>
      <div class="invalid-feedback">
          Ukuran Produk !
      </div>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 col-form-label">Opsi Warna</label>
  <div class="col-md-9">
      <div class="button-option d-flex justify-content-between">
          <div>
              <button type="button" id="removeColor" class="btn btn-danger">-</button>
          </div>
          <div>
              <button type="button" id="addColor" class="btn btn-success">+</button>
          </div>
      </div>
  </div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label">Warna</label>
  <div class="col-sm-9">
      <div id="selectColor">
          <select name="colorId[]" class="mb-3 form-control" required="">
            <option selected>Pilih warna</option>
            @foreach ($color as $colors)
            <option value="{{ @$colors->id }}"  >{{ @$colors->colorName }} - {{ @$colors->codeColor }}</option>
            @endforeach
          </select>
        </div>
      <div class="invalid-feedback">
          Warna Produk !
      </div>
  </div>
</div>
@endsection
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
  $(document).ready(function () {
  var no = 2;
  $('#add').click(function (e) {
      e.preventDefault();
      var $this = $(this);
      no++
      $('#selectSize').append(
        `  <select name="sizeId[]" required="" class="mb-3 form-control">
                <option selected>Pilih ukuran</option>
                @foreach ($size as $sizes)
                <option value="{{ @$sizes->id }}" >{{ @$sizes->size }} - {{ @$sizes->centimeter }} - {{ @$sizes->inch }}</option>
                @endforeach
            </select>`
      )
  });
  $('#remove').on('click', function () {
      $("#selectSize").children().last().remove();
  });
});
</script>

<script>
  $(document).ready(function () {
  var no = 2;
  $('#addColor').click(function (e) {
      e.preventDefault();
      var $this = $(this);
      no++
      $('#selectColor').append(
        `<select name="colorId[]" class="mb-3 form-control" required="">
            <option selected>Pilih warna</option>
            @foreach ($color as $colors)
            <option value="{{ @$colors->id }}"  >{{ @$colors->colorName }} - {{ @$colors->codeColor }}</option>
            @endforeach
          </select>`
      )
  });
  $('#removeColor').on('click', function () {
      $("#selectColor").children().last().remove();
  });
});
</script>
@endsection

@section('script')
    <script>
      
    </script>
@endsection