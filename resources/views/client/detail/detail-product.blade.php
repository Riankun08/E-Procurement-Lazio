<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('layouts.client.navbar')

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-6 text-center col-lg-6 py-3 wow zoomIn">
                <img src="{{ asset('image-save/image-product/' . @$data->image) }}" class="img-fluid" alt="image product">
            </div>
            <div class="col-md-6 col-lg-6 py-3 wow zoomIn">
                <h3 class="fw-bold">{{ @$data->name }}</h3>
                <h6>Harga : Rp. {{ number_format(@$data->price) }}</h6>
                <h6>Kategori : {{ @$data->category }}</h6>
                <h6>Bentuk : {{ @$data->form }}</h6>
                <h6>Jumlah : {{ @$data->quantity }}</h6>
                <br>
                <p class="text-sm">{{@$data->description}}</p>
                <form action="{{ route('client.store.order' , Crypt::encryptString(@$data->id)) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                            <label for="quantity" class="m-1">Jumlah Pembelian</label>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-totals">
                                <input type="button" value="-" id="minus-button" class="m-1" for="quantity">
                                <input type="number" id="quantity" name="quantity" class="form-control m-1" value="1" min="0" >
                                <input type="button" value="+" id="plus-button" class="m-1" for="quantity">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary m-3">Checkout</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  

@include('layouts.client.footer')

<script>
    let plus_btns = document.querySelectorAll('#plus-button');
    let minus_btns = document.querySelectorAll('#minus-button');
    let qty_inputs = document.querySelectorAll('#quantity');

    plus_btns.forEach(btn=>{
        btn.addEventListener('click', () => {
            btn.previousElementSibling.value++;
        })
        })
        minus_btns.forEach(btn=>{
        btn.addEventListener('click', () => {
                btn.nextElementSibling.value = (btn.nextElementSibling.value == 0) ? 0 : btn.nextElementSibling.value - 1;
            })
        })
</script>

@include('layouts.client.head')  
</body>
</html>