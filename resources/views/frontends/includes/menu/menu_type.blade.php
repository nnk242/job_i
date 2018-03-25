<div class="mb-2">
    <div class="p-1">
        <p class="h4 ml-1 text-muted"><i class="fa fa-sliders"></i> Danh mục</p>
    </div>
    @foreach($types as $type)
        <h2 class="h5">
            <a href="{{route('group', ['id'=>$type->name_seo])}}" class="text-dark">
                <div class="ml-1 border-bottom border-secondary p-1 m-menu-type">
                    <div class="m-type-a">
                        <i class="fa fa-file-photo-o text-info"></i> {{$type->name}}
                    </div>

                </div>
            </a>
        </h2>
    @endforeach
</div>