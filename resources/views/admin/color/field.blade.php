    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Warna</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->colorName : ''}}" name="colorName" required="">
        <div class="invalid-feedback">
             Ukuran !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleColorInput" class="col-sm-3 col-form-label">Kode Warna</label>
        <div class="col-sm-9">
            <input type="color" name="codeColor" class="form-control form-control-color" id="exampleColorInput" value="{{ isset($data) ? @$data->codeColor : ''}}" title="Masukan kode warna anda">
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