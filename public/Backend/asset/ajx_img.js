$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#file1').on('change', () => {
    var formData = new FormData();
    var file = $('#file1')[0].files[0]; // Đúng ID
    formData.append('file', file);
    $.ajax({
        url: '/upload',
        processData: false,
        dataType: 'json',
        data: formData,
        method: 'POST',
        contentType: false,
        success: function (result) {
            if (result.success == true) {
                var html = '';
                html += '<img src="' + result.path + '" alt="">';
                $('#input-file-img').html(html);
                $('#input-file-img-hidden').val(result.path); // Đúng ID
            }
        }
    });
});

$('#file2').on('change', () => {
    var formData = new FormData();
    var files = $('#file2')[0].files;
    for (let index = 0; index < files.length; index++) {
        formData.append('files[]', files[index]);
    }
    $.ajax({
        url: '/uploads',
        method: 'POST',
        dataType: 'JSON',
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success == true) { // Sử dụng == để so sánh
                var html = '';
                for (let index = 0; index < result.paths.length; index++) {
                    html += '<img src="' + result.paths[index] + '" alt=""><input type="hidden" value="' + result.paths[index] + '" class="product-images" name="images[]">';
                }
                $('#input-file-imgs').html(html);
            }
        }
    });
});

// =---------delete
function removeRow(product_id, url) {
    if(confirm('Are You Sure')){
        $.ajax({
        url: url,
        data: {product_id},
        method: 'GET',
        dataType:'JSON',
        success: function (res){
          if(res.success = true){
            location.reload();
          }

            },
        });
    }
}

