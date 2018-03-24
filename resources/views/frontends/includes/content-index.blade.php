<!-- content  data-toggle="tab" -->
<section>
    <nav class="m-margin-top-57px fixed-top bg-light" id="m-nav-tab">
        <div>abc</div>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active m-tab-i" id="nav-home-tab" href="{{url('/')}}"
               role="tab"
               aria-controls="nav-home" aria-selected="true"><span class="fa fa-bell-o text-danger"></span>&nbsp;Ảnh
                mới</a>
            <a class="nav-item nav-link m-tab-i" id="nav-profile-tab" href=""
               role="tab"
               aria-controls="nav-profile" aria-selected="false"><span class="fa fa-vcard-o text-danger"></span>&nbsp;Bộ
                sưu tập</a>
            <a class="nav-item nav-link m-tab-i" id="nav-contact-tab" href="#nav-contact"
               role="tab"
               aria-controls="nav-contact" aria-selected="false"><span class="fa fa-ravelry text-danger"></span>&nbsp;BXH
                tháng</a>
        </div>
    </nav>

    <div class="tab-content mt-5" id="nav-tabContent">
        <div class="tab-pane fade show active m-margin-top-150px" id="nav-home" role="tabpanel"
             aria-labelledby="nav-home-tab">
            <div class="container-fluid">
                <div class="m-margin-top-bottom-30px">
                    <div class="grid">
                        @foreach($groups as $group)
                            @foreach($group->image as $image)
                                <div class="grid-item wow zoomIn">
                                    <div class="m-positon-p">
                                        <a href="{{url($group->name_seo)}}" class="m-a-p">
                                            <img src="{{in_array(substr($image->url, 0, 4), $first_url_image)?$image->url:asset($image->url)}}">
                                            <div class="m-none">
                                                <div class="m-bg-img"></div>
                                                <div class="m-text m-s-t">
                                                    <h5 class="text-dark -bold">{{date_format($image->created_at, "d") . ' Th' . date_format($image->created_at, "m," ). date_format($image->created_at, "Y" )}}</h5>
                                                    <h2 class="text-light">{{$group->name}}</h2>
                                                    <p class="text-danger">2,8k Lượt xem</p>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade m-margin-top-120px" id="nav-profile" role="tabpanel"
             aria-labelledby="nav-profile-tab">
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
    <div class="text-center mb-3">
        <a href="#">
            <button class="btn btn-secondary"><span class="fa fa-plus"></span> Xem thêm</button>
        </a>
    </div>
</section>
<!--end content-->