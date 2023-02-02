@extends('layouts.admin.app')
@section('title' , $title)
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4 class="card-title">{{ @$title }}</h4>
                <p class="card-description">Menampilkan Data berita dapat di lakukan buat, edit dan hapus data sebagai berikut</p>
              </div>
              <div class="">
                <a href="{{ route($route.'create') }}" class="btn btn-primary">+ {{ $title }}</a>
              </div>
            </div>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Tema</th>
                    <th>Tanggal Posting</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($datas as $data)
                  <tr>
                    <td>{{ @$data->title }}</td>
                    <td>{{ @$data->theme }}</td>
                    <td><label class="badge badge-success">{{ @$data->datePost }}</label></td>
                    <td>
                      <div class="d-flex justify-content-center">
                        <div class="m-1">
                          <a href="{{ route($route.'show' , Crypt::encryptString(@$data->id)) }}">Detail</a>
                        </div>
                        <div class="m-1">
                          <a href="{{ route($route.'edit' , Crypt::encryptString(@$data->id)) }}">Edit</a>
                        </div>
                        <div class="m-1">
                          <form action="{{ route($route.'destroy', Crypt::encryptString(@$data->id)) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a type="submit">Hapus</a>
                          </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection