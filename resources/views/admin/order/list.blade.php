@extends('admin.main')
@section('content')
    <div class="content-title">
        <p class="heading-text">Đơn hàng</p>
    </div>
    <div class="content_product_list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                    <th>Chi tiết</th>
                    <th>Ngày</th>
                    <th>Trạng thái</th>
                    <th>Tuỳ biến</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td style="text-align: center;">{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}, {{ $order->city }}</td>
                        <td>{{ $order->note }}</td>
                        <td><a class="class-update" href="/admin/order_detail/{{ $order->order_detail }}">Xem</a></td>
                        <td>{{ $order->created_at }}</td>
                        <td><a class="non-confirm-order" href="#">chưa xác
                                nhận</a></td>
                        <td>
                            <a class="class-delete" href="{{ route('delete.order', ['id' => $order->id]) }}">Xoá</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
