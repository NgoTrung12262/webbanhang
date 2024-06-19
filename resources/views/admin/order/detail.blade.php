@extends('admin.main')
@section('content')
    <div class="content-title">
        <p class="heading-text">Chi tiết đơn hàng</p>
    </div>
    <div class="content_order_detail">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($products as $item)
                @php
                    $price = $item['price_sale'] * $order_detail[$item['id']];
                    $total += $price;
                @endphp
                    <tr>
                        <td style="text-align: center;">{{ $item['id'] }}</td>
                        <td><img src="{{ asset($item['image']) }}" alt=""></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price_sale']) }}</td>
                        <td>{{ $order_detail[$item['id']] }}</td>
                        <td>{{ number_format($price) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td style="font-weight: 710;" colspan="5">Tổng tiền</td>
                    <td style="font-weight: 710;">{{ number_format($total) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
