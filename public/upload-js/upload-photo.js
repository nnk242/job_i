function loding() {
    return '<div id="loading" class="loading"><div class="loading-child"><svg width="60px"  height="60px"' +
        'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"' +
        'class="lds-dual-ring" style="background: none;"><circle cx="50" cy="50" ng-attr-r="{{config.radius}}"' +
        'ng-attr-stroke-width="{{config.width}}" ng-attr-stroke="{{config.stroke}}"' +
        'ng-attr-stroke-dasharray="{{config.dasharray}}"fill="none" stroke-linecap="round" r="40" stroke-width="4"' +
        'stroke="#b84a21" stroke-dasharray="62.83185307179586 62.83185307179586" transform="rotate(208.302 50 50)">' +
        '<animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50"' +
        'keyTimes="0;1" dur="5.3s" begin="0s" repeatCount="indefinite"></animateTransform></circle></svg>' +
        '<p>Loading...</p></div></div>';
}
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
        $('body').append(loding());
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
                $('#loading').remove();
                switch (data.status) {
                    case 200: // Nếu upload thành công
                        $('#file-uploaded').append('<li class="card mr-1 float-left mb-1 upload-a-file" style="width: 15rem;">\n' +
                            '  <div class="m-height-150px"><img class="card-img-top m-max-width-100pt" src="' + data.responseJSON.url + '" alt="Card image cap"></div>\n' +
                            '  <div class="card-block">\n' +
                            '    <div class="form-group"><input type="text" class="form-control mt-2" placeholder="Link" name="u-link"></div>\n' +
                            '    <div class="form-group"><input type="text" class="form-control" placeholder="Title" name="u-title"></div>\n' +
                            '    <div class="form-group"><textarea class="form-control" rows="3" name="u-content" placeholder="Content"></textarea></div>\n' +
                            '  </div>\n' +
                            '<select class="form-control group" name="group">\n' +
                            '      <option>---None---</option>\n' +
                            '</select>\n' +
                            '  <div class="card-block">\n' +
                            '    <a href="#" class="card-link text-danger"><span class="fa fa-remove"></span>Remove</a>\n' +
                            '    <a href="#" class="card-link text-success u-upload-a-file"><span class="fa fa-upload"></span>Upload</a>\n' +
                            '  </div>\n' +
                            '</li>'
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

$(document).on("click", ".group", function () {
    var current = this;
    if($(this).find('option').length<=1) {
        $('body').append(loding());
        $.ajax({
            url: 'loadingGroups',
            dataType: 'json',
            type: 'POST',
            success: function(response) {
                $('#loading').remove();
                current.append($.parseHTML("<option value='"+response[0]['id']+"'>"+response[0]['name']+"</option>")[0]);
            },
            error: function(x, e) {

            }

        });
    }
});

$(document).on("click", ".u-upload-a-file", function () {
    var current = this;
    $(this).closest('.upload-a-file').append(loding());
});

// function uploadtodb() {
//     var current = this;
//     $(this).closest('.upload-a-file').append(loding());
//     console.log('123');
// }