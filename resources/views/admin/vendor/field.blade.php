<div class="col-md-6">
    <div class="form-group">
        <label for="code">Code</label>
        <input type="text" class="form-control" id="code" placeholder="code" name="code"
            value="{{ isset($data) ? @$data->code : ''}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="name" name="name"
            value="{{ isset($data) ? @$data->name : ''}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="email"
            value="{{ isset($data) ? @$data->user->email : ''}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="password"
            value="{{ isset($data) ? @$data->password : ''}}">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="phone"
            value="{{ isset($data) ? @$data->phone : ''}}" required>
    </div>
</div>
<div class="col-md-6">
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
        <label for="address">Address</label>
        <textarea type="text" class="form-control" id="address" name="address"
            placeholder="Address">{{ isset($data) ? @$data->address : ''}}</textarea>
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
