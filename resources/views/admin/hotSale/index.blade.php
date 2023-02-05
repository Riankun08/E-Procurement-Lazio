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
                <h4 class="card-title">Data {{ @$title }}</h4>
              </div>
            </div>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>jumlah Awal</th>
                    <th>jumlah Pembelian</th>
                    <th>jumlah sisa</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>
                <tbody>                     
                @php
                    $no = 1
                @endphp            
                @foreach ($datas as $data)
                <tr>
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>{{ @$data->product->name }}</td>
                  <td>{{ @$data->product->remainingQuantity }} pcs</td>
                  <td>{{ @$data->quantity }} pcs</td>
                  <td>{{ @$data->product->quantity }} pcs</td>
                  <td>Rp. {{ number_format(@$data->totalPrice + @$data->shipping) }}</td>
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