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
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" readonly>
                        <div class="invalid-feedback">
                             Nama !
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <input type="text" class="form-control" value="{{ isset($data) ? @$data->division : ''}}" name="division" readonly>
                        <div class="invalid-feedback">
                            Pekerjaan !
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" readonly class="form-control">
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
                        <textarea type="text" class="form-control" name="message" readonly>{{ isset($data) ? @$data->message : ''}}</textarea>
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
                        </div>
                    </div>
                </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
      <div class="card text-center">
        <div class="card-body">
          <h4>Gambar Testimonial</h4>
          <img src="{{asset('image-save/image-testimonial/' . @$data->image)}}" class="img-fluid" alt="">
        </div>
      </div>
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