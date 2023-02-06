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
                    <th>No</th>
                    <th>Nama Kastemer</th>
                    <th>Produk</th>
                    <th>Status</th>
                    <th>Jumlah Pembelian</th>
                    <th>Pembayaran</th>
                    <th>Harga Total</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>                    
                @php
                    $no = 1;
                @endphp            
                @foreach ($datas as $data)
                <tr>
                  <td class="text-center">
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ @$data->name }}
                  </td>
                  <td>{{ Str::limit(@$data->product->name , 5) }}</td>
                  <td>
                    @if(@$data->status == "newOrder")
                    Order Baru
                    @elseif(@$data->status == "payOrder")
                    Pembayaran
                    @elseif(@$data->status == "paidOrder")
                    Terbayar
                    @elseif(@$data->status == "paidOrder")
                    Pembayaran
                    @elseif(@$data->status == "successOrder")
                    Order sukses
                    @elseif(@$data->status == "failedOrder")
                    Order Gagal
                    @endif
                  </td>
                  <td>{{ @$data->quantity }}</td>
                  <td>{{ @$data->payment }}</td>
                  <td>Rp. {{ number_format(@$data->totalPrice + @$data->shipping) }}</td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center">
                      <div class="m-1">
                        <a href="{{ route($route.'show' , Crypt::encryptString($data->id)) }}" class="btn btn-info"><span class="ti-eye"></span></a>
                      </div>
                      <div class="m-1">
                      <a href="{{ route($route.'edit' , Crypt::encryptString($data->id)) }}" class="btn btn-success"><span class="ti-pencil-alt"></i></a>
                      </div>
                      <div class="m-1">
                      <form action="{{ route($route.'destroy' , Crypt::encryptString($data->id)) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <butotn type="submit" class="btn btn-danger btn-delete"><span class="ti-trash"></span></butotn>
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