    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Ukuran</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" value="{{ isset($data) ? @$data->size : ''}}" name="size" required="">
        <div class="invalid-feedback">
             Ukuran !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Sentimeter</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->centimeter : ''}}" name="centimeter">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Inci</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->inch : ''}}" name="inch">
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