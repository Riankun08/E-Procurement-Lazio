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
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">
              <h4>Detao; data input</h4>
          </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="needs-validation" action="#" method="POST" novalidate="" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" required="">
                        <div class="invalid-feedback">
                             Nama !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ isset($data) ? @$data->division : ''}}" name="division" required="">
                        <div class="invalid-feedback">
                            Pekerjaan !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                        <select name="status" required="" class="form-control">
                            <option selected>Pilih status</option>
                            <option value="hold" {{ @$data->status == 'hold' ? 'selected' : '' }}>Tahan</option>
                            <option value="publish" {{ @$data->status == 'publish' ? 'selected' : '' }}>Publikasi</option>
                        </select>
                        <div class="invalid-feedback">
                             Status Testimonial !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pesan</label>
                        <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="message" required="">{{ isset($data) ? @$data->message : ''}}</textarea>
                        <div class="invalid-feedback">
                            Pesan !
                        </div>
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
    <div class="col-md-4 ">
      <div class="card text-center">
        <div class="card-body">
          <h4>Gambar Testimonial</h4>
          <img src="{{asset('image-save/image-testimonial/' . @$data->image)}}" class="img-fluid" alt="">
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