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
    @if(count($groups) > 0)
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
        </div>
        <div class="text-center mb-3">
            <a href="#">
                <button class="btn btn-secondary"><span class="fa fa-plus"></span> Xem thêm</button>
            </a>
        </div>
    @else

    @endif
</section>
<!--end content-->