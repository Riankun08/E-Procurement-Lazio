<div class="col-md-6">
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" id="name" placeholder="name" name="name"
            value="{{ isset($data) ? @$data->name : ''}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="vendor_id">Vendor</label>
        <select name="vendor_id" id="vendor_id" class="form-control" style="color: black; !important" required>
            <option selected>Pilih vendor</option>
            @foreach ($vendor as $item)
                <option value="{{ $item->id }}" {{ ( @$data->vendor_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="price">Harga</label>
        <input type="number" name="price" class="form-control" id="price" placeholder="tema"
            value="{{ isset($data) ? @$data->price : ''}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="quantity">Jumlah</label>
        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Jumlah"
            value="{{ isset($data) ? @$data->quantity : ''}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" style="color: black; !important" required>
            <option selected>Pilih status</option>
            <option value="publish" {{ ( @$data->status == "publish") ? 'selected' : '' }}>Publish</option>
            <option value="pending" {{ ( @$data->status == "pending") ? 'selected' : '' }}>Pending</option>
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="category">Kategori</label>
        <select name="category" class="form-control" required style="color: black; !important" id="category">
            <option selected>Pilih Kategori</option>
            @foreach ($category as $item)
                <option value="{{ $item }}" {{ ( @$data->category == $item) ? 'selected' : '' }}>{{ $item }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="image" class="file-upload-default" value="{{ isset($data) ? @$data->image : ''}}">
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
        <textarea type="text" class="form-control" id="description" name="description"
            placeholder="Deskripsi">{{ isset($data) ? @$data->description : ''}}</textarea>
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
