    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" required="">
        <div class="invalid-feedback">
             Nama Pengguna !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
        <input type="email" class="form-control" value="{{ isset($data) ? @$data->email : ''}}" name="email" required="">
        <div class="invalid-feedback">
             Email Pengguna !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">No. Telpon</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" value="{{ isset($data) ? @$data->phone : ''}}" name="phone" required="">
        <div class="invalid-feedback">
             No. Telpon Pengguna !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
        <select name="role" required="" class="form-control">
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
        <select name="gender" required="" class="form-control">
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
        <select name="status" required="" class="form-control">
            <option selected>Pilih status</option>
            <option value="publish" {{ @$data->status == 'publish' ? 'selected' : '' }}>Publikasi</option>
            <option value="hold" {{ @$data->status == 'hold' ? 'selected' : '' }}>Tahan</option>
        </select>
        <div class="invalid-feedback">
             Status Pengguna !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Gambar</label>
        <div class="col-sm-9">
        <input type="file" class="form-control" value="{{ isset($data) ? @$data->image : ''}}" name="image" required="">
        <div class="invalid-feedback">
            Gambar Pengguna !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="password" required="">
            <div class="invalid-feedback">
                Password Pengguna !
            </div>
            </div>
        </div>
    <div class="card-footer justify-content-between d-flex">
        <div>
            <a href="{{ route($route.'index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div>
            <button class="btn btn-primary">@yield('button-submit')</button>
        </div>
    </div>