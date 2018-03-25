<div class="mb-2 mt-5">
    <div class="p-1">
        <p class="h4 ml-1 text-muted"><i class="fa fa-tags"></i> TAGS</p>
    </div>
    <h2 class="h5">
        @for($i = 0;$i<count($tags['name']); $i++)
            <a href="{{route('tag', ['id'=>$tags['name_seo'][$i]])}}" class="text-dark">
                <div class="float-left p-1 border-secondary border mr-1 ml-1 mt-1 mb-1 m-tag">
                    <i class="fa fa-hashtag text-warning"></i> {{$tags['name'][$i]}}
                </div>
            </a>
        @endfor
    </h2>
</div>