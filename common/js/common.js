$(function(){
    //not found image
    var notFoundImage = window.location.origin + "/uploads/default/default.jpg";
    var realImageSrc = $(".safelyLoadImage").data("imgsrc");
    $(".safelyLoadImage").attr("onerror", "this.onerror=null; this.src='" + notFoundImage + "';");
    $(".safelyLoadImage").attr("src", realImageSrc);
    $(".safelyLoadImage").removeClass("safelyLoadImage");
    //
    //title image
    $('[data-toggle="tooltip"]').tooltip();
    //
});

window.onload = function () {
    $('#loading').fadeOut();
}

var $grid_ = $('.grid').masonry({
    // options...
    itemSelector: '.grid-item'
});

$grid_.imagesLoaded().progress( function() {
    $grid_.masonry('layout');
});

var $grid = $('.grid_c').imagesLoaded( function() {
    // init Masonry after all images have loaded
    $grid.masonry({
        // options...
        itemSelector: '.grid-item-c',
    });
});

new WOW().init();
$('#select-repo').selectize({
    valueField: 'name',
    labelField: 'name',
    searchField: ['name'],
    create: true,
    maxItems: 1,
    maxOptions: 10,
    render: {
        option: function (item, escape) {
            return '<div>' +
                '<span class="title">' +
                '<span class="name"><a href="11232">' + escape(item.name) + '</a></span>' +
                '<span style="float: right;" class="name">' + escape(item.view) + '</span>' +
                '</span>' +
                '</div>';
        }
    },
    load: function (query, callback) {
        if (!query.length) return callback();
        $.ajax({
            url: '/tim-kiem/' + encodeURIComponent(query),
            type: 'GET',
            error: function () {
                callback();
            },
            success: function (res) {
                callback(res);
            }
        });
    },
});