<div class="mb-2 mt-5">
    <div class="p-1">
        <p class="h4 ml-1 text-muted"><i class="fa fa-flag-o"></i> Ảnh theo quốc gia</p>
    </div>
    @foreach($regions as $region)
        <h2 class="h5">
            <a href="{{route('region', ['id'=>$region->name_seo])}}" class="text-dark">
                <div class="ml-1 border-bottom border-secondary p-1 m-menu-type">
                    <div class="m-type-a">
                        <div style="width: 30px" class="float-left">
                            <img class="m-img-w" src="{{in_array(substr($region->image, 0, 4), $first_url_image)?$region->image:asset($region->image)}}">
                        </div>
                        {{$region->name}}
                    </div>
                </div>
            </a>
        </h2>
    @endforeach
</div>