




    <div class="col-md-12">
        <h4 class="mb-3">Data Order</h4>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="name">Nama Kastemer</label>
        <input type="text" id="name" class="form-control" value="{{ isset($data) ? @$data->name : ''}}" name="name" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" value="{{ isset($data) ? @$data->email : ''}}" name="email" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">No. Telpon</label>
        <input type="number" id="" id="phone" class="form-control" value="{{ isset($data) ? @$data->phone : ''}}" name="phone" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Kota</label>
        <input type="text" id="" class="form-control" value="{{ isset($data) ? @$data->city : ''}}" name="city" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Kecamatan</label>
        <input type="text" id="" class="form-control" value="{{ isset($data) ? @$data->district : ''}}" name="district" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Alamat Detail</label>
        <textarea type="text" id="" class="form-control" name="address" required="">{{ isset($data) ? @$data->address : ''}}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <h4 class="mb-3">Data Produk</h4>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Produk</label>
        <select name="productId" required="" id="" class="form-control">
            <option selected>Pilih produk</option> 
            @foreach ($product as $prdct)
            <option value="{{ @$prdct->id }}" {{ @$data->productId == @$prdct->id ? 'selected' : '' }}>{{ @$prdct->name }} - Rp. {{ number_format(@$prdct->price) }} - Jumlah {{ @$prdct->quantity }} PCS </option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="col-md-12">
        <h4 class="mb-3">Data Order</h4>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Jumlah Pembelian</label>
        <input type="number" id="" class="form-control" value="{{ isset($data) ? @$data->quantity : ''}}" name="quantity" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Status</label>
        <select name="status" required="" id="" class="form-control">
            <option selected>Pilih status</option>
            <option value="newOrder" {{ @$data->status == 'newOrder' ? 'selected' : '' }}>Order Baru</option>
            <option value="payOrder" {{ @$data->status == 'payOrder' ? 'selected' : '' }}>Pembayaran</option>
            <option value="paidOrder" {{ @$data->status == 'paidOrder' ? 'selected' : '' }}>Terbayar</option>
            <option value="packingOrder" {{ @$data->status == 'packingOrder' ? 'selected' : '' }}>dikemas</option>
            <option value="deliveryOrder" {{ @$data->status == 'deliveryOrder' ? 'selected' : '' }}>Pengiriman</option>
            <option value="successOrder" {{ @$data->status == 'successOrder' ? 'selected' : '' }}>Order sukses</option>
            <option value="failedOrder" {{ @$data->status == 'failedOrder' ? 'selected' : '' }}>Order Gagal</option>
        </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Tipe</label>
        <select name="type" required="" id="" class="form-control">
            <option selected>Pilih tipe</option>
            <option value="offline" {{ @$data->type == 'offline' ? 'selected' : '' }}>Offline</option>
            <option value="online" {{ @$data->type == 'online' ? 'selected' : '' }}>Online</option>
        </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Metode Pembayaran</label>
        <select name="payment" required="" id="" class="form-control">
            <option selected>Pilih Metode Pembayaran</option>
            <option value="MANDIRI" {{ @$data->payment == 'MANDIRI' ? 'selected' : '' }}>Bank Mandiri</option>
            <option value="BCA" {{ @$data->payment == 'BCA' ? 'selected' : '' }}>Bank Bca</option>
            <option value="COD" {{ @$data->payment == 'COD' ? 'selected' : '' }}>COD</option>
        </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="shipping">Ongkir</label>
        <input type="number" class="form-control mb-3" value="{{ isset($data) ? @$data->shipping : ''}}" name="shipping">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Bukti Transfer</label>
        <input type="file" class="form-control mb-3" value="{{ isset($data) ? @$data->evidence : ''}}" name="evidence">
        <div>
              boleh di isi atau tidak tergantung pergunaan !
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