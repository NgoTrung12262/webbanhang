<section class="hot-products">
    <div class="container">
        <div class="row-grid">
            <p class="heading-text">Sản Phẩm Phổ Biến</p>
        </div>
        <div class="row-grid row-grid-hot-products">
            @foreach ($popularProducts as $product)
                <div class="hot-product-item">
                    <a href="/product/{{ $product->id }}"><img src="{{ $product->image }}" alt="{{ $product->name }}"></a>
                    <p><a href="/product/{{ $product->id }}">{{ $product->name }}</a></p>
                    <span>{{ $product->material }}</span>
                    <div class="hot-product-item-price">
                        <p>{{ $product->price }}<sup>đ</sup> <span>{{ $product->price_sale }}<sup>đ</sup></span></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>