<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client.head')
</head>
<body>
@include('sweetalert::alert')
@include('sweetalert::alert')

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('layouts.client.navbar')

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-6 text-center col-lg-6 py-3 wow zoomIn">
                <img src="{{ asset('image-save/image-product/' . @$data->image) }}" class="img-fluid" alt="image product">
            </div>
            <div class="col-md-6 col-lg-6 py-3 wow zoomIn">
                <h3 class="fw-bold">{{ @$data->name }}</h3>
                <br>
                <h6>Vendor : {{ @$data->vendor->name }}</h6>
                <br>
                <h6>Harga : Rp. {{ number_format(@$data->price) }}</h6>
                <br>
                <h6>Kategori : {{ @$data->category }}</h6>
                <br>
                <h6>Jumlah : {{ @$data->quantity }}</h6>
                <br>
                <p class="text-sm">{{@$data->description}}</p>
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