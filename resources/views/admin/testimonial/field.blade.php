<div class="col-sm-6">
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" required="">
        <div class="invalid-feedback">
             Nama !
        </div>
        </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
        <label for="">Pekerjaan</label>
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->division : ''}}" name="division" required="">
        <div class="invalid-feedback">
            Pekerjaan !
        </div>
        </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
        <label for="">Status</label>
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
    <div class="col-sm-6">
    <div class="form-group">
        <label for="">Pesan</label>
        <textarea type="text" class="form-control" name="message" required="">{{ isset($data) ? @$data->message : ''}}</textarea>
        <div class="invalid-feedback">
            Pesan !
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