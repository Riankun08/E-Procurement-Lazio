<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
</head>
<body>
@include('sweetalert::alert')

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('layouts.client.navbar')

  <div class="page-section bg-light">
    <div class="container">
    <form action="{{ route('client.success.order' , Crypt::encryptString(@$order->id)) }}" method="POST">
        @csrf
            <div class="row justify-content-center">
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6 py-3 wow zoomIn">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Data anda</h4>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" required class="form-control" placeholder="Masukan nama" value="{{ @$order->user->name }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required class="form-control" placeholder="Masukan email" value="{{ @$order->user->email }}"> 
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">No. Telpon</label>
                                <input type="text" name="phone" id="phone" value="{{ @$order->user->phone }}" required placeholder="Masukan No. Telpon" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">Kota</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Masukan Kota" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="district">Kecamatan</label>
                                <input type="text" name="district" id="district"  class="form-control" placeholder="Masukan Kecamatan" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address">Alamat Detail</label>
                                <textarea type="text" name="address" id="address" required class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <h4>Metode Pembayaran</h4>
                            </div>
                            <div class="col-md-12">
                                <label for="payment">Metode</label>
                                <select name="payment" id="payment" class="form-control" required>
                                    <option selected>Pilih Metode Pembayaran</option>
                                    <option value="BCA">BCA Transfer</option>
                                    <option value="MANDIRI">Mandiri Transfer</option>
                                    <option value="BNI">BNI Transfer</option>
                                    <option value="COD">Cash On Delivery (COD)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 py-3 wow zoomIn">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h4>Produk yang di beli</h4>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset('image-save/image-product/' . @$order->product->image) }}" class="img-fluid" alt="image product">
                                            </div>
                                            <div class="col-md-8 p-3">
                                                <h3 class="fw-bold">{{ @$order->product->name }}</h3>
                                                <h6>Harga : Rp. {{ number_format(@$order->product->price) }} / 1 pcs</h6>
                                                <h6>Kategori : {{ @$order->product->category }}</h6>
                                                <h6>Bentuk : {{ @$order->product->form }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h4>Data order anda</h4>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <p class="text-sm">catatan : Total Harga ini sudah termasuk ongkir.</p>
                                        <div class="d-flex justify-content-between mb-3">
                                            <h6>Jumlah Pembelian</h6>
                                            <h6>: {{ number_format(@$order->quantity) }} pcs</h6>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <h6>Ongkir</h6>
                                            <h6>: Rp. {{ number_format(@$order->shipping) }}</h6>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <h6>Total Harga</h6>
                                            <h6>: Rp. {{ number_format(@$order->totalPrice + @$order->shipping) }}</h6>
                                        </div>
                                        <button type="submit" class="btn btn-app-primary">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
     <!-- .container -->
  </div> 
  <!-- .page-section -->

  

@include('layouts.client.footer')

@include('layouts.client.head')  
</body>
</html>