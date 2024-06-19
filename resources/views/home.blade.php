<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
</head>
<body>
    <!--------------- header-------------- -->
    <header id="header">
        @include('parts.header')
    </header>


    <!-- -----------------Slider-------------- -->
    <section class="slider">
        <div class="slider-items">
            <div class="slider-item">
                <img src="{{ asset('frontend/asset/image/slider1 (1).jpg') }}" alt="">
            </div>
            <div class="slider-item">
                
                <img src="{{ asset('frontend/asset/image/Slider 2.jpg') }}" alt="">
            </div>
            <div class="slider-item">
                
                <img src="{{ asset('frontend/asset/image/slider1 (2).jpg') }}" alt="">
            </div>
        </div>
        <div class="slider-arrow">
            <i class="ri-arrow-right-line"></i>
            <i class="ri-arrow-left-line"></i>
        </div>
    </section>


<!-- hotproducts -->
<section class="hot-products">
    <div class="container">
        <div class="row-grid">
            <p class="heading-text">Sản Phẩm Mới</p>
        </div>
        <div class="row-grid row-grid-hot-products">
            @foreach ($product as $product)
                <div class="hot-product-item">
                    <a href="/product/{{ $product -> id }}"><img src="{{ $product->image }}" alt=""></a>
                    <p><a href=" /product/{{ $product -> id }}">{{ $product->name }}</a></p>
                    <span>{{ $product->material }}</span>
                    <div class="hot-product-item-price">
                        <p>{{ $product->price }}<sup>đ</sup> <span>{{ $product->price_sale }} <sup>đ</sup></span>
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

    <!-- populer products -->
    @include('parts.populer_products', ['popularProducts' => $popularProducts])
    <!-- Footer -->
    @include('parts/footer')
    <script src="{{ asset('frontend/asset/js/scrip.js') }}"></script>
</body>
</html>