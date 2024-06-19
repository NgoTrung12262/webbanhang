@extends('main')
@section('content')
    <section class="product-detail cach-top">
        <form action="/cart" method="POST">
            <div class="container">
                <div class="row-flex row-grid-product-detail">
                    <p class="heading-text-product">Sản Phẩm Mới</p> <i class="ri-arrow-right-line"> </i>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="row-grid">
                    <div class="product-detail-left">
                        <img class="main-img" src="{{ asset($product->image) }}" alt="">
                        <div class="product-detail-items">
                            @php
                                $product_images = explode('~', $product->images);
                            @endphp

                            @foreach ($product_images as $product_image)
                                <img src="{{ asset($product_image) }}" alt="">
                            @endforeach

                        </div>
                    </div>
                    <div class="product-detail-right">
                        <div class="infor">
                            <h2>{{ $product->name }}</h2>
                            <h3>Còn hàng</h3>
                            <hr style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"><br>
                            <span>{{ $product->material }}</span>
                            <div class="hot-product-item-price">
                                <p> {{ number_format($product->price) }} <sup>đ</sup>
                                    <span>{{ number_format($product->price) }} <sup>đ</sup></span></p>
                            </div>
                        </div>
                        <div class="des">
                            <h2>Đặc điểm nổi bật</h2>
                            {!! $product->description !!}
                        </div>
                        <div class="quantity">
                            <h2>Số lượng</h2>
                            <span class="minus">-</span>
                            
                            <input type="number" class="count" value="1" name="quantity_number" >
                            <input type="hidden"  value="{{ $product->id }}" name="product_id" >
                            <span class="plus">+</span>
                        </div>
                        <div class="addcar">
                            <Button type="submit" class="main-btn">Thêm vào giỏ hàng</Button>
                        </div>
                    </div>
                </div>
                <div class="row-gird">
                    <p class="heading-text">Thông tin chi tiết</p>
                    <div class="product-detail-content">
                        {!! $product->content !!}
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </section>
    
@endsection
