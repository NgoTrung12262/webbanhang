@extends('admin.main')
@section('content')
    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <div class="content-title">
            <p class="heading-text">Chỉnh sửa sản phẩm</p>
        </div>
        <div class="row-grid">
            <div class="content-left">
                <div class="content-left-tow-input">
                    <input type="text" value="{{ $product-> name }}" name="name" placeholder="Tên sản phẩm">
                    <input type="text" value="{{ $product-> material }}" name="material" placeholder="Chất liệu">
                </div>
                <div class="content-left-tow-input">
                    <input type="text" value="{{ $product-> price }}" name="price" placeholder="Giá bán">
                    <input type="text" value="{{ $product-> price_sale }}" name="price_sale" placeholder="Giá giảm">
                </div>
                <textarea class="editor" name="description" placeholder="Đặc điểm nổi bật">{{ $product-> description }}</textarea>
                <textarea class="editor1" name="content" placeholder="Mô tả sản phẩm">{{ $product-> content }}</textarea>
                <button type="submit">Cập nhật sản phẩm</button>
            </div>

            <div class="content-right">
                <div class="content-right-img">
                    <label class="img-label" for="file1"><i class="ri-image-add-fill"></i> Ảnh đại diện</label>
                    <input id="file1" type="file">
                    <input type="hidden" value="{{ $product -> image }}" id="input-file-img-hidden" name="image" >
                    <div id="input-file-img" class="show-img">
                        <img src="{{ asset($product -> image) }}" alt="">
                    </div>
                </div>
                <div class="content-right-imgs">
                    <label class="img-label" for="file2"><i class="ri-image-add-fill"></i> Ảnh sản phẩm</label>
                    <input id="file2" type="file" multiple>
                    <div id="input-file-imgs" class="show-imgs">
                        @php
                            $product_images = explode ("~" , $product -> images)
                        @endphp
                        @foreach ($product_images as  $product_image)
                        <img src=" {{ asset($product_image) }} " alt="">
                        <input type="hidden" value="{{ $product_image }}" id="input-file-img-hidden" name="images[]" >
                        @endforeach
                    </div>
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
