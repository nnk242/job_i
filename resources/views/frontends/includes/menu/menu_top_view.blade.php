<div class="mb-2 mt-5">
    <div class="p-1">
        <p class="h4 ml-1 text-muted"><i class="fa fa-hand-spock-o"></i> Top ảnh xem</p>
    </div>
    <div class="grid_c">
        @foreach($top_image as $key=>$val)
            <div class="grid-item-c">
                <div class="m-positon-p">
                    <a href="{{ route('image', ['id'=>$val->image_s])}}" class="m-a-p">
                        <img src="{{ in_array(substr($val->url, 0, 4), $first_url_image)?$val->url:asset($val->url) }}">
                        <div class="m-none">
                            <div class="m-bg-img"></div>
                            <div class="m-text m-s-t">
                                <p class="text-danger"><i
                                            class="fa fa-eye"></i> {{post_views($val->view)}}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>