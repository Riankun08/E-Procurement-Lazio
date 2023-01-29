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
                        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" readonly>
                        <div class="invalid-feedback">
                             Nama Pengguna !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                        <input type="email" class="form-control" value="{{ isset($data) ? @$data->email : ''}}" name="email" readonly>
                        <div class="invalid-feedback">
                             Email Pengguna !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No. Telpon</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" value="{{ isset($data) ? @$data->phone : ''}}" name="phone" readonly>
                        <div class="invalid-feedback">
                             No. Telpon Pengguna !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                        <select name="role" readonly class="form-control">
                            <option selected>Pilih role</option>
                            <option value="admin" {{ @$data->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="customer" {{ @$data->role == 'customer' ? 'selected' : '' }}>Customer</option>
                            <option value="worker" {{ @$data->role == 'worker' ? 'selected' : '' }}>Worker</option>
                        </select>
                        <div class="invalid-feedback">
                             Role Pengguna !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                      <select name="gender" readonly class="form-control">
                          <option selected>Pilih gender</option>
                          <option value="Laki - Laki" {{ @$data->gender == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                          <option value="Perempuan" {{ @$data->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                      </select>
                      <div class="invalid-feedback">
                           Jenis Kelamin Pengguna !
                      </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                        <select name="status" readonly class="form-control">
                            <option selected>Pilih status</option>
                            <option value="publish" {{ @$data->status == 'publish' ? 'selected' : '' }}>Publikasi</option>
                            <option value="hold" {{ @$data->status == 'hold' ? 'selected' : '' }}>Tahan</option>
                        </select>
                        <div class="invalid-feedback">
                            Status Pengguna !
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
    <div class="col-md-4">
      <div class="card text-center">
        <div class="card-body">
          <h4>Gambar Pengguna</h4>
          <img src="{{ asset('image-save/image-user/' . @$data->image) }}" class="img-fluid" alt="gambar pengguna">
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