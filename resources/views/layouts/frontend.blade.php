<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Animate styles -->
    <link href="{{ asset('animate/animate.css') }}" rel="stylesheet">
    <!-- Common styles -->
    <link href="{{ asset('common/style.css') }}" rel="stylesheet">
    <!-- Font awesome styles -->
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <!-- Header -->
    <header>
        <div class="border-bottom border-info">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top border-top border-light m-opacity-9">
                <a class="navbar-brand" href="#">
                    <img src="/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    Picture
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <div class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm...">
                        <button class="btn btn-outline-light my-2 my-sm-0 text-danger" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--end header-->
    <!-- Nav tabs -->
    <section>
        <nav class="m-margin-top-57px fixed-top bg-light">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active m-tab-i" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                   role="tab"
                   aria-controls="nav-home" aria-selected="true"><span class="fa fa-bell-o text-danger"></span>&nbsp;Ảnh
                    mới</a>
                <a class="nav-item nav-link m-tab-i" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                   role="tab"
                   aria-controls="nav-profile" aria-selected="false"><span class="fa fa-vcard-o text-danger"></span>&nbsp;Bộ
                    sưu tập</a>
                <a class="nav-item nav-link m-tab-i" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                   role="tab"
                   aria-controls="nav-contact" aria-selected="false"><span class="fa fa-ravelry text-danger"></span>&nbsp;BXH
                    tháng</a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active m-margin-top-120px" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container-fluid">
                    <div class="m-margin-top-bottom-30px">
                        <div class="grid">
                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test1.jpg">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k Lượt xem - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test2.jpg">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k View - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test3.jpg">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k View - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test4.jpg">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k View - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test5.png">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k View - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test6.jpg">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k View - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test7.jpg">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k View - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test9.jpg">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k View - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid-item wow zoomIn">
                                <div class="m-positon-p">
                                    <a href="#" class="m-a-p">
                                        <img src="test/test13.jpg">
                                        <div class="m-none">
                                            <div class="m-bg-img"></div>
                                            <div class="m-text m-s-t">
                                                <p class="h3 text-dark">Jun, 28</p>
                                                <p class="h4 text-light">Title</p>
                                                <p class="h5 text-danger">2,8k View - 1k tải xuống</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade m-margin-top-120px" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container-fluid">
                    <div class="m-margin-top-bottom-30px">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="position-relative w-100 float-left m-margin-bottom-15px wow pulse">
                                    <a href="#" class="m-a-p">
                                        <div class="border border-info float-left m-border-darius-5">
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test2.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                            </div>
                                        </div>
                                        <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="position-relative w-100 float-left m-margin-bottom-15px wow pulse">
                                    <a href="#" class="m-a-p">
                                        <div class="border border-info float-left m-border-darius-5">
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test10.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                            </div>
                                        </div>
                                        <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="position-relative w-100 float-left m-margin-bottom-15px wow pulse">
                                    <a href="#" class="m-a-p">
                                        <div class="border border-info float-left m-border-darius-5">
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test2.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                            </div>
                                        </div>
                                        <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="position-relative w-100 float-left m-margin-bottom-15px wow pulse">
                                    <a href="#" class="m-a-p">
                                        <div class="border border-info float-left m-border-darius-5">
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test2.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                            </div>
                                        </div>
                                        <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="position-relative w-100 float-left m-margin-bottom-15px wow pulse">
                                    <a href="#" class="m-a-p">
                                        <div class="border border-info float-left m-border-darius-5">
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test10.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                            </div>
                                            <div class="w-50 float-left">
                                                <img class="m-collection-w m-border-darius-5" src="test/test6.jpg">
                                            </div>
                                        </div>
                                        <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade m-margin-top-120px" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="container-fluid">
                    <div class="m-margin-top-bottom-30px">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <p class="h2 text-warning text-center"><span class="fa fa-"></span>&nbsp;LƯỢT TẢI</p>
                                <div class="m-margin-top-bottom-15px wow tada">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test4.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px  wow tada">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test4.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px  wow tada">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test4.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px  wow tada">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test4.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px  wow tada">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test14.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p class="h2 text-warning text-center"><span class="fa fa-"></span>&nbsp;LƯỢT XEM</p>
                                <div class="m-margin-top-bottom-15px  wow wobble">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test14.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px  wow wobble">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test14.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px  wow wobble">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test14.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px  wow wobble">
                                    <div class="m-img-w">
                                        <div class="m-positon-p">
                                            <a href="#" class="m-a-p">
                                                <img src="test/test14.jpg" class="m-border-darius-5 w-100">
                                                <div class="m-none">
                                                    <div class="m-bg-img"></div>
                                                    <div class="m-text m-s-t">
                                                        <p class="h2 text-dark">Jun, 28</p>
                                                        <p class="h3 text-light">Title</p>
                                                        <p class="h3 text-danger">2,8k View</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p class="h2 text-warning text-center"><span class="fa fa-"></span>&nbsp;BỘ SƯU TẬP</p>
                                <div class="m-margin-top-bottom-15px wow jello">
                                    <div class="position-relative w-100 float-left m-margin-bottom-15px">
                                        <a href="#" class="m-a-p">
                                            <div class="border border-info float-left m-border-darius-5">
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test2.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                                </div>
                                            </div>
                                            <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px wow jello">
                                    <div class="position-relative w-100 float-left m-margin-bottom-15px">
                                        <a href="#" class="m-a-p">
                                            <div class="border border-info float-left m-border-darius-5">
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test2.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                                </div>
                                            </div>
                                            <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px wow jello">
                                    <div class="position-relative w-100 float-left m-margin-bottom-15px">
                                        <a href="#" class="m-a-p">
                                            <div class="border border-info float-left m-border-darius-5">
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test2.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                                </div>
                                            </div>
                                            <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px wow jello">
                                    <div class="position-relative w-100 float-left m-margin-bottom-15px">
                                        <a href="#" class="m-a-p">
                                            <div class="border border-info float-left m-border-darius-5">
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test2.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                                </div>
                                            </div>
                                            <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="m-margin-top-bottom-15px wow jello">
                                    <div class="position-relative w-100 float-left m-margin-bottom-15px">
                                        <a href="#" class="m-a-p">
                                            <div class="border border-info float-left m-border-darius-5">
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test2.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test3.jpg">
                                                </div>
                                                <div class="w-50 float-left">
                                                    <img class="m-collection-w m-border-darius-5" src="test/test1.jpg">
                                                </div>
                                            </div>
                                            <div class="m-border-darius-5 m-top-right-bottom-left-0 position-absolute m-bg-b8cccc m-none m-opacity-7">
                                            <span class="position-absolute m-top-right-bottom-left-0 text-light m-font-size-3em text-center m-margin-top-15pt">
                                                5+<p class="h3">Xem thêm</p></span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="bg-success m-clear-left" role="contentinfo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="m-margin-top-bottom-30px">
                        <p class="h4 text-dark cursor-default"><span class="fa fa-search-plus text-white"></span>&nbsp;TOP
                            tìm
                            kiếm...</p>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card">
                        <a href="#" title="#1" class="m-f-t">
                            <div class="card-header text-center"><span
                                        class="fa fa fa-star text-warning"></span><span
                                        class="fa fa fa-star text-warning"></span><span
                                        class="h2 text-danger">1</span>
                            </div>
                            <div class="card-block">
                                <div class="card-title text-center m-f-p-t"><p class="h5 text-dark">Council</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--col-md-2-->
                <div class="col-md-2">
                    <div class="card">
                        <a href="#" title="#1" class="m-f-t">
                            <div class="card-header text-center"><span
                                        class="fa fa fa-star text-warning"></span><span
                                        class="fa fa fa-star-half-o text-warning"></span><span
                                        class="h2 text-danger">2</span>
                            </div>
                            <div class="card-block">
                                <div class="card-title text-center m-f-p-t"><p class="h5 text-dark">Council</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--col-md-2-->
                <div class="col-md-2">
                    <div class="card">
                        <a href="#" title="#1" class="m-f-t">
                            <div class="card-header text-center"><span
                                        class="fa fa fa-star text-warning"></span><span
                                        class="fa fa fa-star-o text-warning"></span><span
                                        class="h2 text-danger">3</span>
                            </div>
                            <div class="card-block">
                                <div class="card-title text-center m-f-p-t"><p class="h5 text-dark">Council</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--col-md-2-->
                <div class="col-md-2">
                    <div class="card">
                        <a href="#" title="#1" class="m-f-t">
                            <div class="card-header text-center"><span
                                        class="fa fa fa-star text-warning"></span><span
                                        class="h2 text-danger">4</span>
                            </div>
                            <div class="card-block">
                                <div class="card-title text-center m-f-p-t"><p class="h5 text-dark">Council</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--col-md-2-->
                <div class="col-md-2">
                    <div class="card">
                        <a href="#" title="#1" class="m-f-t">
                            <div class="card-header text-center"><span
                                        class="fa fa fa-star-half-o text-warning"></span><span
                                        class="h2 text-danger">5</span>
                            </div>
                            <div class="card-block">
                                <div class="card-title text-center m-f-p-t"><p class="h5 text-dark">Council</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--col-md-2-->
                <div class="col-md-2">
                    <div class="card">
                        <a href="#" title="#1" class="m-f-t">
                            <div class="card-header text-center"><span
                                        class="fa fa fa-star-o text-warning"></span><span
                                        class="h2 text-danger">6</span>
                            </div>
                            <div class="card-block">
                                <div class="card-title text-center m-f-p-t"><p class="h5 text-dark">Council</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--col-md-2-->
            </div>
            <hr>
        </div>

        <div class="container">
            <div class="row m-margin-top-bottom-30px">
                <div class="col-md-6 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <p class="h1 text-danger cursor-default"><span class="fa fa-hashtag"></span>&nbsp;HASH TAG</p>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-dark h5">Website Tutorial</a></li>
                            <li><a href="#" class="text-dark h5">Accessibility</a></li>
                            <li><a href="#" class="text-dark h5">Disclaimer</a></li>
                            <li><a href="#" class="text-dark h5">Privacy Policy</a></li>
                            <li><a href="#" class="text-dark h5">FAQs</a></li>
                            <li><a href="#" class="text-dark h5">Webmaster</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <p class="h1 text-danger cursor-default"><span class="fa fa-handshake-o"></span>&nbsp;SERVICE
                        </p>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-dark h5">Website Tutorial</a></li>
                            <li><a href="#" class="text-dark h5">Accessibility</a></li>
                            <li><a href="#" class="text-dark h5">Disclaimer</a></li>
                            <li><a href="#" class="text-dark h5">Privacy Policy</a></li>
                            <li><a href="#" class="text-dark h5">FAQs</a></li>
                            <li><a href="#" class="text-dark h5">Webmaster</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!--Footer Bottom-->
                        <p class="text-xs-center">&copy; Copyright 2017 - City of USA. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="{{ asset('js/app.js') }}"></script>
{{--masonry--}}
<script src="{{ asset('masonry/masonry.pkgd.min.js') }}"></script>
<script>
    $('.grid').masonry({
        // options...
        itemSelector: '.grid-item',
    });
</script>
<!-- animate js -->
<script src="{{ asset('animate/wow.js') }}"></script>
<script>
    new WOW().init();
</script>
</body>
</html>