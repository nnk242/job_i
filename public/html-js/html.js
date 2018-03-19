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

function item_pic($required_group, $required_name, $required_title, $required_content, $src_img, $src_input, $type) {
    if ($type == 1) {
        return '<li class="card mr-1 float-left mb-1 upload-a-file" style="width: 15rem;">\n' +
            '<div class="m-height-150px mt-2"><img class="card-img-top m-img-b" src="' + $src_img + '" alt="Card image cap"></div>\n' +
            '  <div class="card-block">\n' +
            '    <div class="form-group"><input type="text" class="form-control mt-2 u-link" placeholder="Link" name="u_link[]" readonly></div>\n' +
            '    <div class="form-group"><input type="text" class="form-control u-name" placeholder="Name" name="u_name[]" ' + $required_title + '></div>\n' +
            '    <div class="form-group"><input type="text" class="form-control u-title" placeholder="Title" name="u_title[]" ' + $required_title + '></div>\n' +
            '    <div class="form-group"><textarea class="form-control u-content" rows="3" name="u_content[]" placeholder="Content" ' + $required_content + '></textarea></div>\n' +
            '  </div>\n' +
            '<div class="form-group">' +
            '  <select class="form-control group u-group" name="u_group[]" ' + $required_group + '>\n' +
            '    <option value="">---None---</option>\n' +
            '  </select>' +
            '</div>' +
            '<div class="form-group text-center">' +
            '  <label class="switch" title="Show or hide">\n' +
            '    <input type="checkbox" class="form-check-input u-status" value="1" name="u_status[]" checked>\n' +
            '    <span class="slider round"></span>\n' +
            '  </label>' +
            '<hr>' +
            '</div>' +
            '<div class="card-block text-center mb-1">\n' +
            '    <div class="position-absolute m-remove-item"><a href="#" class="card-link text-danger u-remove-a-file"><span class="fa fa-remove"></span></a></div>\n' +
            '    <a class="card-link text-light u-upload-file-serve btn btn-warning"><span class="fa fa-upload"></span>Upload to serve</a>\n' +
            '</div>\n' +
            '</li>'
    } else
    return '<li class="card mr-1 float-left mb-1 upload-a-file" style="width: 15rem;">\n' +
        '<div class="m-height-150px mt-2"><img class="card-img-top m-img-b" src="' + $src_img + '" alt="Card image cap"></div>\n' +
        '  <div class="card-block">\n' +
        '    <div class="form-group"><input type="text" class="form-control mt-2 u-link" placeholder="Link" name="u_link[]" value="' + $src_input + '" required></div>\n' +
        '    <div class="form-group"><input type="text" class="form-control u-name" placeholder="Name" name="u_name[]" ' + $required_title + '></div>\n' +
        '    <div class="form-group"><input type="text" class="form-control u-title" placeholder="Title" name="u_title[]" ' + $required_title + '></div>\n' +
        '    <div class="form-group"><textarea class="form-control u-content" rows="3" name="u_content[]" placeholder="Content" ' + $required_content + '></textarea></div>\n' +
        '  </div>\n' +
        '<div class="form-group">' +
        '  <select class="form-control group u-group" name="u_group[]" ' + $required_group + '>\n' +
        '    <option value="">---None---</option>\n' +
        '  </select>' +
        '</div>' +
        '<div class="form-group text-center">' +
        '  <label class="switch" title="Show or hide">\n' +
        '    <input type="checkbox" class="form-check-input u-status" value="1" name="u_status[]" checked>\n' +
        '    <span class="slider round"></span>\n' +
        '  </label>' +
        '<hr>' +
        '</div>' +
        '<div class="card-block text-center mb-1">\n' +
        '    <div class="position-absolute m-remove-item"><a href="#" class="card-link text-danger u-remove-a-file"><span class="fa fa-remove"></span></a></div>\n' +
        '    <a class="card-link text-light u-upload-a-file btn btn-info"><span class="fa fa-upload"></span>Upload</a>\n' +
        '</div>\n' +
        '</li>'
}

function closeError() {
    var timeout = null;
    clearTimeout(timeout);
    timeout = setTimeout(function () {
        $('.m-error').remove();
    }, 5000);
}
function changeBox($ma) {
    $($ma).on('change', function () {
        this.value = this.checked ? 1 : 0;
    }).change();
}