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
                <div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" readonly>
                            <div class="invalid-feedback">
                              Nama Pengguna !
                            </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" value="{{ isset($data) ? @$data->email : ''}}" name="email" readonly>
                            <div class="invalid-feedback">
                              Email Pengguna !
                            </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="">No. Telpon</label>
                            <input type="number" class="form-control" value="{{ isset($data) ? @$data->phone : ''}}" name="phone" readonly>
                            <div class="invalid-feedback">
                              No. Telpon Pengguna !
                            </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Role</label>
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
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Jenis Kelamin</label>
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
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Status</label>
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
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" value="{{ isset($data) ? @$data->image : ''}}" name="image" readonly>
                            <div class="invalid-feedback">
                            Gambar Pengguna !
                            </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" readonly>
                            <div class="invalid-feedback">
                                Password Pengguna !
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route($route.'index') }}" class="btn btn-light">Kembali</a>
                                </div>
                            </div>
                            </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
      <div class="card text-center">
        <div class="card-body">
          <img src="{{ asset('image-save/image-user/' . @$data->image) }}" class="img-fluid" alt="gambar pengguna">
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