<!-- content  data-toggle="tab" -->

<section>
    <nav class="m-margin-top-57px fixed-top bg-light" id="m-nav-tab">
        <nav class="breadcrumb">
            <div class="container">
                <a class="breadcrumb-item" href="{{url('/')}}"><i class="fa fa-home"></i>Trang chủ</a>
                <a class="breadcrumb-item" href="#">{{$post->region->name}}</a>
                <a class="breadcrumb-item" href="#">{{$post->name}}</a>
                <span class="breadcrumb-item active">{{$post->name}}</span>
            </div>
        </nav>
    </nav>
    <main>
        <div class="tab-content mt-5" id="nav-tabContent">
            <div class="tab-pane fade m-margin-top-150px show active" id="nav-profile" role="tabpanel"
                 aria-labelledby="nav-profile-tab">
                <div class="container-fluid">
                    <div class="m-margin-top-bottom-30px">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div>
                                            <p class="text-secondary small"><i class="fa fa-calendar"></i> Ngày
                                                đăng: {{dayofweed(date_format($post->created_at, "w"))}},
                                                {{date_format($post->created_at, "d/m/Y | ")}} <i class="fa fa-clock-o"></i>
                                                {{date_format($post->created_at, 'H:i')}}
                                            </p>
                                        </div>
                                        <div>
                                            <h1>{{$post->name}}</h1>
                                            <p class="-bold"><i class="fa fa-eye"></i> 500 lượt xem</p>
                                        </div>
                                        <div>
                                            <h4>{{$post->description}}</h4>
                                            @foreach($images as $image)
                                                <p class="">{{$image->content}}</p>
                                                <a href="{{url('hinh-anh/' . $image->image_s)}}"><img
                                                            class="m-img-w m-border-darius-5"
                                                            src="{{in_array(substr($image->url, 0, 4), $first_url_image)?$image->url:asset($image->url)}}">
                                                    <p class="text-info text-center">{{$image->title . date_format($post->created_at, " - d/m/Y")}}</p>
                                                </a>
                                            @endforeach
                                            {{Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4")}}
                                            {{ $images->links() }}
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <div class="bg-light p-1">
                                                <p class="h4 ml-1 text-info"><i class="fa fa-sliders"></i> Phân loại</p>
                                            </div>
                                            <div class="ml-1 border-bottom border-secondary p-1">
                                                <a href="#"><i class="fa fa-flag"></i> test</a>
                                            </div>
                                            <div class="ml-1 border-bottom border-secondary p-1">
                                                <a href="#"><i class="fa fa-flag"></i> test</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade m-margin-top-120px" id="nav-contact" role="tabpanel"
                 aria-labelledby="nav-contact-tab">
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
    </main>

</section>
<!--end content-->