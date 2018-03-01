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

function error($mes) {
    return '<div class="m-error">' +
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
        '  <strong>Warning!</strong> ' + $mes +
        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
        '    <span aria-hidden="true">&times;</span>\n' +
        '  </button>\n' +
        '</div></div>';
}

function successful($mes) {
    return '<div class="m-error">' +
        '<div class="alert alert-success alert-dismissible fade show" role="alert">\n' +
        '  <strong>Successful!</strong> ' + $mes +
        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
        '    <span aria-hidden="true">&times;</span>\n' +
        '  </button>\n' +
        '</div></div>';
}
function item_pic($required_group, $required_name, $required_title, $required_content, $src_img) {
    return '<li class="card mr-1 float-left mb-1 upload-a-file" style="width: 15rem;">\n' +
        '<div class="m-height-150px mt-2"><img class="card-img-top m-img-b" src="' + $src_img + '" alt="Card image cap"></div>\n' +
        '  <div class="card-block">\n' +
        '    <div class="form-group"><input type="text" class="form-control mt-2 u-link" placeholder="Link" name="u_link[]" value="' + $src_img + '" required></div>\n' +
        '    <div class="form-group"><input type="text" class="form-control u-name" placeholder="Name" name="u_name[]" '+ $required_title +'></div>\n' +
        '    <div class="form-group"><input type="text" class="form-control u-title" placeholder="Title" name="u_title[]" '+ $required_title +'></div>\n' +
        '    <div class="form-group"><textarea class="form-control u-content" rows="3" name="u_content[]" placeholder="Content" '+ $required_content +'></textarea></div>\n' +
        '  </div>\n' +
        '<select class="form-control group u-group" name="u_group[]" '+ $required_group +'>\n' +
        '      <option value="">---None---</option>\n' +
        '</select>\n' +
        '<div class="form-check">\n' +
        '    <input type="checkbox" class="form-check-input u-status" value="1" name="u_status[]" checked>\n' +
        '    <label class="form-check-label">Hide/Show</label>\n' +
        '</div>' +
        '<div class="card-block">\n' +
        '    <a href="#" class="card-link text-danger u-remove-a-file"><span class="fa fa-remove"></span>Remove</a>\n' +
        '    <a href="#" class="card-link text-success u-upload-a-file"><span class="fa fa-upload"></span>Upload</a>\n' +
        '</div>\n' +
        '</li>'
}

function changeBox($ma) {
    $($ma).on('change', function () {
        this.value = this.checked ? 1 : 0;
    }).change();
}

function closeError() {
    setTimeout(function () {
        $('.m-error').remove();
    }, 5000);
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
                            var group_, name_, content_,title_;
                            $('#group-check').val() == 1 ? group_ = '' :group_ = 'required';
                            $('#name-check').val() == 1 ? name_ = '' :name_ = 'required';
                            $('#title-check').val() == 1 ? title_ = '' :title_ = 'required';
                            $('#content-check').val() == 1 ? content_ = '' :content_ = 'required';
                            $('#file-uploaded').append(item_pic(group_,name_, title_, content_, data.responseJSON.url));
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
            console.log(response);
        },
        error: function (x, e) {
            $('#loading').remove();
            console.log(x, e)
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

$(document).on('click','#group-check', function () {
    changeBox('#group-check');
    if($('#group-check').val() == 1) {
        $('.u-group').each(function(){
            $(this).prop('required',false);
        });
        $('#group').prop('required',true);
    } else {
        $('.u-group').each(function(){
            $(this).prop('required',true);
        });
        $('#group').prop('required',false);
    }
});

$(document).on('click','#name-check', function () {
    changeBox('#name-check');
    if($('#name-check').val() == 1) {
        $('.u-name').each(function(){
            $(this).prop('required',false);
        });
        $('#p-name').prop('required',true);
    } else {
        $('.u-name').each(function(){
            $(this).prop('required',true);
        });
        $('#p-name').prop('required',false);
    }
});

$(document).on('click','#title-check', function () {
    changeBox('#title-check');
    if($('#title-check').val() == 1) {
        $('.u-title').each(function(){
            $(this).prop('required',false);
        });
        $('#p-title').prop('required',true);
    } else {
        $('.u-title').each(function(){
            $(this).prop('required',true);
        });
        $('#p-title').prop('required',false);
    }
});

$(document).on('click','#content-check', function () {
    changeBox('#content-check');
    if($('#content-check').val() == 1) {
        $('.u-content').each(function(){
            $(this).prop('required',false);
        });
        $('#p-content').prop('required',true);
    } else {
        $('.u-content').each(function(){
            $(this).prop('required',true);
        });
        $('#p-content').prop('required',false);
    }
});