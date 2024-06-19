@extends('admin.main')
@section('content')
    <form action="/admin/product_add" enctype="multipart/form-data" method="post">
        @csrf
        <div class="content-title">
            <p class="heading-text">Sản Phẩm Mới</p>
        </div>
        @if (session('success'))
<script>
    // Hiển thị thông báo thành công bằng cửa sổ alert
    alert("{{ session('success') }}");
</script>
@endif
        <div class="row-grid">
            <div class="content-left">
                <div class="content-left-tow-input">
                    <input type="text" value="{{ old('name') }}" name="name" placeholder="Tên sản phẩm">
                    <input type="text" value="{{ old('material') }}" name="material" placeholder="Chất liệu">
                </div>
                <div class="content-left-tow-input">
                    <input type="text" value="{{ old('price') }}" name="price" placeholder="Giá bán">
                    <input type="text" value="{{ old('price_sale') }}" name="price_sale" placeholder="Giá giảm">
                </div>
                <textarea class="editor" name="description" placeholder="Đặc điểm nổi bật">{{ old('description') }}</textarea>
                <textarea class="editor1" name="content" placeholder="Mô tả sản phẩm">{{ old('content') }}</textarea>
                <button type="submit">Thêm sản phẩm</button>
            </div>

            <div class="content-right">
                <div class="content-right-img">
                    <label class="img-label" for="file1"><i class="ri-image-add-fill"></i> Ảnh đại diện</label>
                    <input id="file1" type="file">
                    <input type="hidden" id="input-file-img-hidden" name="image" >
                    <div id="input-file-img" class="show-img"></div>
                </div>
                <div class="content-right-imgs">
                    <label class="img-label" for="file2"><i class="ri-image-add-fill"></i> Ảnh sản phẩm</label>
                    <input id="file2" type="file" multiple>
                    <div id="input-file-imgs" class="show-imgs"></div>
                </div>
            </div>


        </div>
    </form>
@endsection

@section('footer')
    <script src="{{ asset('Backend/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('Backend/ckeditor5/script.js') }}"></script>
    <script src="{{ asset('Backend/asset/ajx_img.js') }}"></script>
@endsection
