<div class="col-md-6">
    <div class="form-group">
            <label for="">Nama</label>
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" required>
        <div class="invalid-feedback">
             Nama Pengguna !
        </div>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" value="{{ isset($data) ? @$data->email : ''}}" name="email" required>
        <div class="invalid-feedback">
             Email Pengguna !
        </div>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="">No. Telpon</label>
        <input type="number" class="form-control" value="{{ isset($data) ? @$data->phone : ''}}" name="phone" required>
        <div class="invalid-feedback">
             No. Telpon Pengguna !
        </div>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="">Role</label>
        <select name="role" required class="form-control">
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
        <select name="gender" required class="form-control">
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
        <select name="status" required class="form-control">
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
        <input type="file" class="form-control" value="{{ isset($data) ? @$data->image : ''}}" name="image" required>
        <div class="invalid-feedback">
            Gambar Pengguna !
        </div>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="">Password</label>
          <input type="password" class="form-control" name="password" required>
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
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </div>
        </div>