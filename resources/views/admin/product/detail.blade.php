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
                          <label for="name">Nama</label>
                          <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ isset($data) ? @$data->name : ''}}" readonly>
                      </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="tema" value="{{ isset($data) ? @$data->price : ''}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Jumlah" value="{{ isset($data) ? @$data->quantity : ''}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" name="merk" class="form-control" id="merk" placeholder="Merk" value="{{ isset($data) ? @$data->merk : ''}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" readonly>
                            <option selected>Pilih status</option>
                            <option value="publish" {{ ( @$data->status == "publish") ? 'selected' : '' }}>Publish</option>
                            <option value="hold" {{ ( @$data->status == "hold") ? 'selected' : '' }}>Tahan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select name="category" class="form-control" readonly id="category">
                            <option selected>Pilih Kategori</option>
                            <option value="Obat Bebas Terbatas" {{ ( @$data->category == "Obat Bebas Terbatas") ? 'selected' : '' }}>Obat Bebas Terbatas</option>
                            <option value="Obat Bebas" {{ ( @$data->category == "Obat Bebas") ? 'selected' : '' }}>Obat Bebas</option>
                            <option value="Obat Keras" {{ ( @$data->category == "Obat Keras") ? 'selected' : '' }}>Obat Keras</option>
                            <option value="Obat Wajib Apotek" {{ ( @$data->category == "Obat Wajib Apotek") ? 'selected' : '' }}>Obat Wajib Apotek</option>
                            <option value="Obat Herbal" {{ ( @$data->category == "Obat Herbal") ? 'selected' : '' }}>Obat Herbal</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form">Bentuk</label>
                        <select name="form" id="form" class="form-control" readonly>
                            <option selected>Pilih Bentuk</option>
                            <option value="Pulvis" {{ ( @$data->form == "Pulvis") ? 'selected' : '' }}>Pulvis</option>
                            <option value="Tablet" {{ ( @$data->form == "Tablet") ? 'selected' : '' }}>Tablet</option>
                            <option value="Pil" {{ ( @$data->form == "pil") ? 'selected' : '' }}>Pil</option>
                            <option value="kapsul" {{ ( @$data->form == "Kapsul") ? 'selected' : '' }}>kapsul</option>
                            <option value="kaplet" {{ ( @$data->form == "Kaplet") ? 'selected' : '' }}>kaplet</option>
                            <option value="Larutan" {{ ( @$data->form == "Larutan") ? 'selected' : '' }}>Larutan</option>
                            <option value="Salep" {{ ( @$data->form == "Salep") ? 'selected' : '' }}>Salep</option>
                            <option value="Obat Tetes" {{ ( @$data->form == "Obat Tetes") ? 'selected' : '' }}>Obat Tetes</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="image" readonly class="file-upload-default" value="{{ isset($data) ? @$data->image : ''}}">
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
                    <textarea type="text" class="form-control" id="description" readonly name="description" placeholder="Deskripsi">{{ isset($data) ? @$data->description : ''}}</textarea>
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
              <img src="{{ asset('image-save/image-product/' . @$data->image) }}" alt="" class="img-fluid">
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