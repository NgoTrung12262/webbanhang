@extends('main')
@section('content')
    <section class="cart cach-top">
       
        <form action="/cart/send" method="post">
        
        <div class="container">
            <div class="row-flex row-grid-cart">
                <p class="heading-text-product heading-text">Giỏ hàng</p>
            </div>
            <div class="row-grid">
                <div class="cart-product-left">
                    <h2>Chi tiết đơn hàng</h2>
                    <div class="table-cart">
                        <table border="1px">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Thành tiền</th>
                                    <th>Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartDetails as $item)
                                <tr>
                                    <td><img style="width: 90px; height: 120px;" src="{{ $item['image'] }}" alt=""></td>
                                    <td>
                                        <div class="infor">
                                            <h2>{{ $item['name'] }}</h2>
                                            <div class="hot-product-item-price">
                                                <p>{{ number_format($item['price']) }} <sup>đ</sup> <span>{{ number_format($item['price_sale']) }} <sup>đ</sup></span></p>
                                            </div>
                                        </div>
                                        <div class="quantity quantity-cart">
                                            <h2>Số lượng</h2>
                                            <span class="minus" data-id="{{ $item['id'] }}">-</span>
                                            <input type="number" class="count" value="{{ $item['quantity'] }}" name="product_id[{{ $item['id'] }}]">
                                            {{--  <input type="hidden" value="{{ $item['cart'] }}" name="cart">  --}}
                                            <span class="plus" data-id="{{ $item['id'] }}">+</span>
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{ number_format($item['total']) }} <sup>đ</sup></p>
                                    </td>
                                    <td>
                                        <p><a href="{{ route('remove_cart', $item['id']) }}">Xóa</a></p>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td style="font-weight: 600" colspan="2">Tổng tiền</td>
                                    <td id="total_all" style="font-weight: 600; text-align: center" colspan="2">{{ number_format($totalAll) }} <sup>đ</sup></td>
                                </tr>
                            </tbody>
                        </table>
                        <h2>Tổng: {{ number_format($totalAll) }} <sup>đ</sup></h2>
                        <div class="cart-product-left-updatecart">
                            <button formaction="/cart/update">Cập nhật giỏ hàng </button><a href="/home"> >>> Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
                <div class="cart-product-right">
                    <h2>Thông tin gian hàng</h2>
                    <div class="cart-product-right-name-phone">
                        <input type="text" placeholder="Tên"  name="name">
                        <input type="tel" placeholder="Số điện thoại" name="phone">
                    </div>
                    <div class="cart-product-right-email">
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <div class="cart-product-right-select">
                        <select name="city" id="city">
                            <option value="">Tỉnh/Tp</option>
                        </select>
                        <select name="district" id="district">
                            <option value="">Quận/huyện</option>
                        </select>
                        <select name="wart" id="ward">
                            <option value="">Phường/xã</option>
                        </select>
                    </div>
                    <div class="cart-product-right-email">
                        <input type="text" placeholder="Địa chỉ" name="address">
                    </div>
                    <div class="cart-product-right-email">
                        <input type="text" placeholder="Ghi chú" name="note">
                    </div>
                    <div class="cart-product-right-submit">
                        <button type="submit"> Gửi đơn đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>
    </section>
@endsection
