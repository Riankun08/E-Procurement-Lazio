@extends('layouts.admin.app')
@section('title' , $title)
@section('content')
<div class="section-header">
  <h1>Detail {{ @$title  }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">{{@$title}}</a></div>
    <div class="breadcrumb-item">Detail {{@$title }}</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4>Detao; data input</h4>
          </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="needs-validation" action="#" method="POST" novalidate="" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Warna</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ isset($data) ? @$data->colorName : ''}}" name="colorName" readonly>
                        <div class="invalid-feedback">
                             Warna !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleColorInput" class="col-sm-3 col-form-label">Kode Warna</label>
                        <div class="col-sm-9">
                            <input type="color" name="codeColor" class="form-control form-control-color" id="exampleColorInput" value="{{ isset($data) ? @$data->codeColor : ''}}" title="Choose your color" readonly>
                        </div>
                    </div>
                    <div class="card-footer justify-content-between d-flex">
                        <div>
                            <a href="{{ route($route.'index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
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