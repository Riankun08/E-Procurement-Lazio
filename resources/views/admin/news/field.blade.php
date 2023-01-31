
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" id="title" placeholder="Judul" name="title" value="{{ isset($data) ? @$data->title : ''}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="theme">Tema</label>
                    <input type="text" name="theme" class="form-control" id="theme" placeholder="tema" value="{{ isset($data) ? @$data->theme : ''}}" required>
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
                <label for="description">Deskripsi</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Deskripsi">{{ isset($data) ? @$data->description : ''}}</textarea>
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