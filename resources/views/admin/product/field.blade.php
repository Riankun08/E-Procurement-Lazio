    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" required="">
        <div class="invalid-feedback">
             Nama Produk !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Harga</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" value="{{ isset($data) ? @$data->price : ''}}" name="price" required="">
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
        <input type="number" class="form-control" value="{{ isset($data) ? @$data->quantity : ''}}" name="quantity" required="">
        <div class="invalid-feedback">
             Jumlah Produk !
        </div>
        </div>
    </div>

    @yield('size-input')
    
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Gambar</label>
        <div class="col-sm-9">
        <input type="file" class="form-control" value="{{ isset($data) ? @$data->image : ''}}" name="image" required="">
        <div class="invalid-feedback">
             Gambar Produk !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Kategori</label>
    <div class="col-sm-9">
        <select name="categories" required="" class="form-control">
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
        <select name="status" required="" class="form-control">
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
        <textarea type="text" class="form-control" name="description" required="">{{ isset($data) ? @$data->description : ''}}</textarea>
        <div class="invalid-feedback">
            Deskripsi Produk !
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