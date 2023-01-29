<!doctype html>
<html lang="en">

<head>
    @include('layouts.client.head')
    <title>Naira Sneakers</title>
</head>

<body>
  @include('sweetalert::alert')
  {{-- navbar --}}
  @include('layouts.client.navbar')
  {{-- close navbar --}}
    <div class="container">
        <div class="container">
            <div class="col-md-12">
                <div id="home" class="row">
                    <div class="col-md-6 margin-top-banner">
                        <h1 class="heading-h1-banner ">Jelajahi Dunia Kekinian Dengan Sepatu Kekinian</h1>
                        <p class="paraf-p-banner mb-5">Tempatnya beli sepatu kekinian original dan juga telah terpercaya oleh berbagai kalangan anak muda</p>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn-shop-now">Shop Now</button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <img src="{{asset('template/base-website/assets/image/img-rating.png')}}" alt="rate">
                               <p>Dipercaya Customer</p>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('template/base-website/assets/image/img-banner.png')}}" class="image-banner" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

   {{-- open about --}}
  @include('layouts.client.about')
   {{-- close about --}}

    <section id="our-menu" class="our-menu">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 ">
                    <div class="row text-center">
                        <div class="col-md-12 text-center margin-botom-cs-menu-our-menu">
                            <h1 class="heading-our-menu-h1-cs">Produk Spesial Kami</h1>
                        </div>
                        
                        @foreach ($product as $dataProduct)
                        @if(@$dataProduct->quantity != 0)
                        @if(@$dataProduct->status == "publish")
                        <div class="col-md-4 margin-b-width">
                            <div class="card card-our-menu">
                                <div class="group-rectangle-image">
                                    <img src="{{ asset('image-save/image-product/' . @$dataProduct->image) }}" style="width:100%;" class="img-card-out-menu" alt="">
                                </div>
                                <div class="card-body">
                                    <div class="col-12 d-flex"> 
                                        <h1 class="label-product d-flex ">{{ @$dataProduct->name }}</h1>
                                        <p class="label-brand">{{ @$dataProduct->brand }}</p>
                                    </div>
                                    @if(@auth('customer')->user()->role == "customer")
                                    <a class="hreff-card" href="{{ route('client.product.detail' , Crypt::encryptString(@$dataProduct->id)) }}">
                                    @else
                                    <a class="hreff-card" href="{{ route('client.login') }}">       
                                    @endif
                                        <h5 class="price-our-menu d-flex">Size : <span class="number-price">
                                            <p class="text-size">
                                                @foreach ($dataProduct->sizeProduct as $size)
                                                    {{ @$size->size->size }} /
                                                @endforeach
                                            </p>
                                            </span>
                                        </h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="price-our-menu d-flex">Rp <span class="number-price">
                                                <p class="text-price"> {{ number_format(@$dataProduct->price) }}</p>
                                                </span></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- open testimonial --}}
    @include('layouts.client.testimonial')
    {{-- close testimonial --}}
    <!-- Remove the container if you want to extend the Footer to full width. -->
    @include('layouts.client.footer')
    {{-- footer --}}
    <!-- End of .container -->
    @include('layouts.client.script')
</body>

</html>