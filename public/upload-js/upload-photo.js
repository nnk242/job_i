function uploadPhoto(url) {
    var current = this;
    this.url = url;
    this.init = function () {
        // Cài đặt token cho ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //Bắt sự kiện bấm vào nút upload photo
        $('#upload').on('click', function () {
            // Nếu có file trong thẻ ipput thì thực hiện upload,
            // ngược lại thì hiện thông báo
            if (typeof $('#photo')[0].files[0] !== 'undefined') {
                current.uploadFile($('#photo')[0].files[0]);
            } else {
                alert('File field is empty');
            }
        });
    };
    this.uploadFile = function (file) {
        // Tạo một FormData chứa dữ liệu để gửi ajax
        var formData = new FormData();
        // Disable nút bấm trong quá trình upload
        $('#upload').prop('disabled', true);
        // Hiện thông báo đang trong quá trình upload
        $('#process').show();
        // Thêm trường upload có giá trị là file đang được chọn trong thẻ input
        // Giống như trong formData có thẻ <ipput type="file" name="upload"/>
        // và thẻ này đã được chọn file.
        // Bạn có thể append luôn thẻ <input type="file"> trong file blade cũng được
        formData.append('upload', file);
        console.log($('#form').serialize());
        // Tiến hành gửi dữ liệu bằng ajax
        current.currentUpload = $.ajax({
            // url đích, đã được truyền vào từ file PHP
            //  trong khi khởi tạo đối tượng
            url: current.url,
            type: 'post', // kiểu dữ liệu gửi đi là POST
            dataType: 'json', // Kiểu dữ liệu trả về Json
            complete: function (data) {
                // Quá trình gửi request hoàn thành
                // Enable nút upload
                // Ẩn thông báo process
                $('#upload').prop('disabled', false);
                $('#process').hide();
                switch (data.status) {
                    case 200: // Nếu upload thành công
                        $('#file-uploaded').append('<li class="w-25 float-left"><div class="card" style="width: 20rem;">\n' +
                            '  <img class="card-img-top" src="' + data.responseJSON.url + '" alt="Card image cap">\n' +
                            '  <div class="card-block">\n' +
                            '    <h4 class="card-title">Card title</h4>\n' +
                            '    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>\n' +
                            '  </div>\n' +
                            '  <ul class="list-group list-group-flush">\n' +
                            '    <li class="list-group-item">Cras justo odio</li>\n' +
                            '    <li class="list-group-item">Dapibus ac facilisis in</li>\n' +
                            '    <li class="list-group-item">Vestibulum at eros</li>\n' +
                            '  </ul>\n' +
                            '  <div class="card-block">\n' +
                            '    <a href="#" class="card-link text-danger"><span class="fa fa-remove"></span>Remove</a>\n' +
                            '    <a href="#" class="card-link text-success"><span class="fa fa-upload"></span>Upload</a>\n' +
                            '  </div>\n' +
                            '</div>'
                            // '<img class="m-b-img" src="' + data.responseJSON.url + '"/></li>'
                        );
                        alert(data.responseJSON.message);
                        break;
                    case 500: // Lỗi server
                        alert('Unknown error: ' + data.status);
                        break;
                    default : // Các lỗi còn lại: lỗi validate, lỗi Exception.
                        alert(data.responseJSON.message);
                }
            },
            data: formData, // Dữ liệu gửi đi
            cache: false,
            contentType: false,
            processData: false
        });
    };
}