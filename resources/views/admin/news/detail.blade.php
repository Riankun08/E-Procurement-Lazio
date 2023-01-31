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
                <h4 class="card-title">Detail data</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" placeholder="Judul" name="title" value="{{ isset($data) ? @$data->title : ''}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="theme">Tema</label>
                        <input type="text" name="theme" class="form-control" id="theme" placeholder="tema" value="{{ isset($data) ? @$data->theme : ''}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="image" class="file-upload-default" value="{{ isset($data) ? @$data->image : ''}}" readonly>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Gambar">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Deskripsi" readonly>{{ isset($data) ? @$data->description : ''}}</textarea>
                </div>
                </div>
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route($route.'index') }}" class="btn btn-light">Kembali</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('image-save/image-news/' . @$data->image) }}" alt="" class="img-fluid">
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