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
        <div>
            <button class="btn btn-primary">@yield('button-submit')</button>
        </div>
    </div>