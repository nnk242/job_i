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
                $('body').append($.parseHTML(error('File field is empty')));
                closeError();
                // alert('File field is empty');
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
        // console.log($('#form').serialize());
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
                        if (data.responseJSON.url) {
                            // $('#file-
                            var group_, name_, content_, title_;
                            $('#group-check').val() == 1 ? group_ = '' : group_ = 'required';
                            $('#name-check').val() == 1 ? name_ = '' : name_ = 'required';
                            $('#title-check').val() == 1 ? title_ = '' : title_ = 'required';
                            $('#content-check').val() == 1 ? content_ = '' : content_ = 'required';
                            $('#file-uploaded').append(item_pic(group_, name_, title_, content_, data.responseJSON.url));
                            if ($('#file-uploaded').find('li').length === 1) {
                                $('#file-uploaded').after('<div style="clear:left;" class="text-center mt-2 u-buttom-upload">' +
                                    '<button type="submit" class="btn btn-success">Submit</button></div>');
                            }

                            $('body').append($.parseHTML(successful(data.responseJSON.message)));
                            closeError();
                        } else {
                            $('body').append($.parseHTML(error(data.responseJSON.message)));
                            closeError();
                        }
                        break;
                    case 500: // Lỗi server
                        $('body').append($.parseHTML(error('Unknown error: ' + data.status)));
                        closeError();
                        // alert('Unknown error: ' + data.status);
                        break;
                    default : // Các lỗi còn lại: lỗi validate, lỗi Exception.
                        $('body').append($.parseHTML(error(data.responseJSON.message)));
                        closeError();
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
    if ($(this).find('option').length <= 1) {
        $('body').append(loding());
        $.ajax({
            url: 'loadingGroups',
            dataType: 'json',
            type: 'POST',
            success: function (response) {
                $('#loading').remove();
                current.append($.parseHTML("<option value='" + response[0]['id'] + "'>" + response[0]['name'] + "</option>")[0]);
            },
            error: function (x, e) {

            }

        });
    }
});

$(document).on("click", ".u-upload-a-file", function () {
    var current = this;
    var link = $(this).closest('.upload-a-file').find('.u-link').val();
    var name = $(this).closest('.upload-a-file').find('.u-name').val();
    var title = $(this).closest('.upload-a-file').find('.u-title').val();
    var content_ = $(this).closest('.upload-a-file').find('.u-content').val();
    var group = $(this).closest('.upload-a-file').find('.group').val();

    $(this).closest('.upload-a-file').find('.u-status').on('change', function () {
        this.value = this.checked ? 1 : 0;
    }).change();
    var status = $(this).closest('.upload-a-file').find('.u-status').val();

    var token = $('meta[name="csrf-token"]').attr('content');
    console.log(token, link, name, title, content_, group, status);
    $(this).append(loding());


    $.ajax({
        url: 'uploadAFile',
        dataType: 'json',
        data: {
            '_token': token,
            'url': link,
            'name': name,
            'group_id': group,
            'title': title,
            'content_': content_,
            'status': status
        },
        type: 'POST',
        success: function (response) {
            $('#loading').remove();
            switch (response.status) {
                case true:
                    $('body').append($.parseHTML(successful(response.message)));
                    closeError();
                    break;
                case false:
                    $('body').append($.parseHTML(error(response.message)));
                    closeError();
                    break;
                default:
                    $('body').append($.parseHTML(error(response.message)));
                    closeError();
                    break;
            }
            // current.append($.parseHTML("<option value='"+response[0]['id']+"'>"+response[0]['name']+"</option>")[0]);
        },
        error: function (x, e) {
            $('#loading').remove();
            $('body').append($.parseHTML(error('Remove element fail!')));
            closeError();
        }

    });
});

$(document).on('click', '.u-remove-a-file', function () {
    try {
        $(this).closest('.upload-a-file').remove();
        $('body').append($.parseHTML(successful('Remove element successful!')));
        closeError();
        if ($('#file-uploaded').find('li').length === 0) {
            $('.u-buttom-upload').remove();
        } else {
        }
    } catch (err) {
        $('body').append($.parseHTML(error('Remove element fail!')));
    }
});

$(document).on('click', '#group-check', function () {
    changeBox('#group-check');
    if ($('#group-check').val() == 1) {
        $('.u-group').each(function () {
            $(this).prop('required', false);
        });
        $('#group').prop('required', true);
    } else {
        $('.u-group').each(function () {
            $(this).prop('required', true);
        });
        $('#group').prop('required', false);
    }
});

$(document).on('click', '#name-check', function () {
    changeBox('#name-check');
    if ($('#name-check').val() == 1) {
        $('.u-name').each(function () {
            $(this).prop('required', false);
        });
        $('#p-name').prop('required', true);
    } else {
        $('.u-name').each(function () {
            $(this).prop('required', true);
        });
        $('#p-name').prop('required', false);
    }
});

$(document).on('click', '#title-check', function () {
    changeBox('#title-check');
    if ($('#title-check').val() == 1) {
        $('.u-title').each(function () {
            $(this).prop('required', false);
        });
        $('#p-title').prop('required', true);
    } else {
        $('.u-title').each(function () {
            $(this).prop('required', true);
        });
        $('#p-title').prop('required', false);
    }
});

$(document).on('click', '#content-check', function () {
    changeBox('#content-check');
    if ($('#content-check').val() == 1) {
        $('.u-content').each(function () {
            $(this).prop('required', false);
        });
        $('#p-content').prop('required', true);
    } else {
        $('.u-content').each(function () {
            $(this).prop('required', true);
        });
        $('#p-content').prop('required', false);
    }
});
$(document).on('click', '#status-check', function () {
    changeBox('#status-check');
});
$(document).on('click', '#p-status', function () {
    changeBox('#p-status');
});