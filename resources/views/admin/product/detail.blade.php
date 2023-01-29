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
    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4>Detao; data input</h4>
          </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form class="needs-validation" action="#" method="POST" novalidate="" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" readonly>
                        <div class="invalid-feedback">
                             Nama Produk !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                        <input type="integer" class="form-control" value="{{ isset($data) ? @$data->price : ''}}" name="price" readonly>
                        <div class="invalid-feedback">
                             Harga Produk !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Brand</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{ isset($data) ? @$data->brand : ''}}" name="brand" required="">
                      <div class="invalid-feedback">
                           Brand Produk !
                      </div>
                      </div>
                  </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah Stok</label>
                        <div class="col-sm-9">
                        <input type="integer" class="form-control" value="{{ isset($data) ? @$data->quantity : ''}}" name="quantity" readonly>
                        <div class="invalid-feedback">
                             Jumlah Produk !
                        </div>
                        </div>
                    </div>
                
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Opsi Ukuran</label>
                            <div class="col-md-9">
                                <div class="button-option d-flex justify-content-between">
                                    <div>
                                        <button type="button" id="remove" class="btn btn-danger">-</button>
                                    </div>
                                    <div>
                                        <button type="button" id="add" class="btn btn-success">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ukuran</label>
                            <div class="col-sm-9">
                                <div id="selectSize">
                                  @foreach (@$data->sizeProduct as $sizeProduct)
                                  <select name="sizeId[]" readonly class="mb-3 form-control">
                                    <option selected>Pilih ukuran</option>
                                    @foreach ($size as $sizes)
                                    <option value="{{ @$sizes->id }}"  {{ ($sizes->id == $sizeProduct->sizeId) ? 'selected' : '' }}>{{ @$sizes->size }} - {{ @$sizes->centimeter }} - {{ @$sizes->inch }}</option>
                                    @endforeach
                                  </select>
                                  @endforeach
                                </div>
                                <div class="invalid-feedback">
                                    Ukuran Produk !
                                </div>
                            </div>
                        </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                        <select name="categories" readonly class="form-control">
                            <option selected>Pilih kategori</option>
                            <option value="Laki - Laki" {{ @$data->categories == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="Perempuan" {{ @$data->categories == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            <option value="Anak" {{ @$data->categories == 'Anak' ? 'selected' : '' }}>Anak - Anak</option>
                            <option value="laki - laki dan perempuan" {{ @$data->categories == 'laki - laki dan perempuan' ? 'selected' : '' }}>laki - laki dan perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                             Kategori Produk !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                        <select name="status" readonly class="form-control">
                            <option selected>Pilih status</option>
                            <option value="hold" {{ @$data->status == 'hold' ? 'selected' : '' }}>Tahan</option>
                            <option value="publish" {{ @$data->status == 'publish' ? 'selected' : '' }}>Publikasi</option>
                        </select>
                        <div class="invalid-feedback">
                             Status Produk !
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="description" readonly>{{ isset($data) ? @$data->description : ''}}</textarea>
                        <div class="invalid-feedback">
                            Deskripsi Produk !
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
                <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4>Gambar Produk</h4>
                        <img src="{{ asset('image-save/image-product/' . @$data->image) }}" class="img-fluid" alt="gambar produk">
                      </div>
                    </div>
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
  $(document).ready(function () {
  var no = 2;
  $('#add').click(function (e) {
      e.preventDefault();
      var $this = $(this);
      no++
      $('#selectSize').append(
        `  <select name="sizeId[]" required="" class="mb-3 form-control">
                <option selected>Pilih ukuran</option>
                @foreach ($size as $sizes)
                <option value="{{ @$sizes->id }}" >{{ @$sizes->size }} - {{ @$sizes->centimeter }} - {{ @$sizes->inch }}</option>
                @endforeach
            </select>`
      )
  });
  $('#remove').on('click', function () {
      $("#selectSize").children().last().remove();
  });
});
</script>

<script>
  $(document).ready(function () {
  var no = 2;
  $('#addColor').click(function (e) {
      e.preventDefault();
      var $this = $(this);
      no++
      $('#selectColor').append(
        `<select name="colorId[]" class="mb-3 form-control" required="">
            <option selected>Pilih warna</option>
            @foreach ($color as $colors)
            <option value="{{ @$colors->id }}"  >{{ @$colors->colorName }} - {{ @$colors->codeColor }}</option>
            @endforeach
          </select>`
      )
  });
  $('#removeColor').on('click', function () {
      $("#selectColor").children().last().remove();
  });
});
</script>
@endsection

@section('script')
    <script>
      
    </script>
@endsection