
<div class="mb-3">
    <h4 class="mb-3">Data Order</h4>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama Kastemer</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" required="">
            <div class="invalid-feedback">
                Nama Kastemer !
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
        <input type="email" class="form-control" value="{{ isset($data) ? @$data->email : ''}}" name="email" required="">
            <div class="invalid-feedback">
                Email Kastemer !
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">No. Telpon</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" value="{{ isset($data) ? @$data->phone : ''}}" name="phone" required="">
            <div class="invalid-feedback">
                No. Telpon Kastemer !
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Kota</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->city : ''}}" name="city" required="">
            <div class="invalid-feedback">
                Kota Kastemer !
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Kecamatan</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ isset($data) ? @$data->district : ''}}" name="district" required="">
            <div class="invalid-feedback">
                Kecamatan Kastemer !
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Alamat Detail</label>
        <div class="col-sm-9">
        <textarea type="text" class="form-control" name="address" required="">{{ isset($data) ? @$data->address : ''}}</textarea>
        <div class="invalid-feedback">
            Alamat Detail Kastemer !
        </div>
        </div>
    </div>
</div>
<div class="mb-3">
    <h4 class="mb-3">Data Produk</h4>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Produk</label>
        <div class="col-sm-9">
        <select name="productId" required="" class="form-control">
            <option selected>Pilih produk</option> 
            @foreach ($product as $prdct)
            <option value="{{ @$prdct->id }}" {{ @$data->productId == @$prdct->id ? 'selected' : '' }}>{{ @$prdct->name }} - Rp. {{ number_format(@$prdct->price) }} - Jumlah {{ @$prdct->quantity }} PCS </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Produk !
        </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Ukuran</label>
        <div class="col-sm-9">
            <div id="selectSize">
                <select name="sizeId" class="mb-3 form-control" required="">
                  <option selected>Pilih ukuran</option>
                  @foreach ($size as $sizes)
                  <option value="{{ @$sizes->id }}"  {{ (@$sizes->id == @$data->sizeId) ? 'selected' : '' }}>{{ @$sizes->size }}</option>
                  @endforeach
                </select>
            </div>
            <div class="invalid-feedback">
                Ukuran Produk !
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Warna</label>
        <div class="col-sm-9">
            <div id="selectColor">
                <select name="colorId" class="mb-3 form-control" required="">
                  <option selected>Pilih warna</option>
                  @foreach ($color as $colors)
                  <option value="{{ @$colors->id }}"  {{ (@$colors->id == @$data->colorId) ? 'selected' : '' }}>{{ @$colors->colorName }} - {{ @$colors->codeColor }}</option>
                  @endforeach
                </select>
            </div>
            <div class="invalid-feedback">
                Warna Produk !
            </div>
        </div>
      </div>
</div>
<div class="mb-3">
    <h4 class="mb-3">Data Order</h4>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Jumlah Pembelian</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" value="{{ isset($data) ? @$data->quantity : ''}}" name="quantity" required="">
            <div class="invalid-feedback">
                Jumalah Pembelian !
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
        <select name="status" required="" class="form-control">
            <option selected>Pilih status</option>
            <option value="newOrder" {{ @$data->status == 'newOrder' ? 'selected' : '' }}>Order Baru</option>
            <option value="payOrder" {{ @$data->status == 'payOrder' ? 'selected' : '' }}>Pembayaran</option>
            <option value="paidOrder" {{ @$data->status == 'paidOrder' ? 'selected' : '' }}>Terbayar</option>
            <option value="packingOrder" {{ @$data->status == 'packingOrder' ? 'selected' : '' }}>dikemas</option>
            <option value="deliveryOrder" {{ @$data->status == 'deliveryOrder' ? 'selected' : '' }}>Pengiriman</option>
            <option value="successOrder" {{ @$data->status == 'successOrder' ? 'selected' : '' }}>Order sukses</option>
            <option value="failedOrder" {{ @$data->status == 'failedOrder' ? 'selected' : '' }}>Order Gagal</option>
        </select>
        <div class="invalid-feedback">
                Status Order !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tipe</label>
        <div class="col-sm-9">
        <select name="type" required="" class="form-control">
            <option selected>Pilih tipe</option>
            <option value="offline" {{ @$data->type == 'offline' ? 'selected' : '' }}>Offline</option>
            <option value="online" {{ @$data->type == 'online' ? 'selected' : '' }}>Online</option>
        </select>
        <div class="invalid-feedback">
                Tipe Order !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Metode Pembayaran</label>
        <div class="col-sm-9">
        <select name="payment" required="" class="form-control">
            <option selected>Pilih Metode Pembayaran</option>
            <option value="MANDIRI" {{ @$data->payment == 'MANDIRI' ? 'selected' : '' }}>Bank Mandiri</option>
            <option value="BCA" {{ @$data->payment == 'BCA' ? 'selected' : '' }}>Bank Bca</option>
            <option value="COD" {{ @$data->payment == 'COD' ? 'selected' : '' }}>COD</option>
        </select>
        <div class="invalid-feedback">
                Tipe Order !
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Bukti Transfer</label>
        <div class="col-sm-9">
        <input type="file" class="form-control mb-3" value="{{ isset($data) ? @$data->evidence : ''}}" name="evidence">
        <div>
              boleh di isi atau tidak tergantung pergunaan !
        </div>
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