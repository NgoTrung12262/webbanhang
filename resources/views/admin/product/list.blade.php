@extends('admin.main')
@section('content')
    <div class="content-title">
        <p class="heading-text">Danh sách sản phẩm</p>
    </div>
    <div class="content_product_list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Giá giảm</th>
                    <th>Ngày đăng</th>
                    <th>Tuỳ chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $products)
                    <tr>
                        <td style="text-align: center;">{{ $products -> id }}</td>
                        <td><img src="{{ asset($products-> image) }}" alt=""></td>
                        <td>{{ $products -> name }}</td>
                        <td>{{ number_format ($products -> price )}}</td>
                        <td>{{ number_format ($products -> price_sale )}}</td>
                        <td>{{ $products-> updated_at }}</td>
                        <td>
                            <a  class="class-update" href="/admin/product_edit/{{ $products -> id }}">Sửa</a>
                            <a onclick="removeRow(product_id=<?php echo $products->id; ?>,  url= '/admin/product_delete')" class="class-delete" href="#">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <script src="{{ asset('Backend/asset/ajx_img.js') }}"></script>
@endsection

