<div class="mb-2">
    <div class="p-1">
        <p class="h4 ml-1 text-muted"><i class="fa fa-sliders"></i> Danh mục</p>
    </div>
    @foreach($types as $type)
        <h2 class="h5">
            @if(!isset($type_id))
                <a href="{{route('type', ['id'=>$type->name_seo])}}" class="text-dark" data-toggle="tooltip"
                   title="{{$type->name}}">
                    <div class="ml-1 border-bottom border-secondary p-1 m-menu-type">
                        <div class="m-type-a">
                            <i class="fa fa-file-photo-o text-info"></i> {{$type->name}}
                        </div>

                    </div>
                </a>
            @else
                @if($type->id == $type_id->id)
                    <span class="text-warning" data-toggle="tooltip" title="{{$type->name}}">
                        <div class="ml-1 border-bottom border-secondary p-1 m-menu-type">
                            <div class="m-type-a">
                                <i class="fa fa-file-photo-o text-info"></i> {{$type->name}}
                            </div>
                        </div>
                    </span>
                @else
                    <a href="{{route('type', ['id'=>$type->name_seo])}}" class="text-dark" data-toggle="tooltip"
                       title="{{$type->name}}">
                        <div class="ml-1 border-bottom border-secondary p-1 m-menu-type">
                            <div class="m-type-a">
                                <i class="fa fa-file-photo-o text-info"></i> {{$type->name}}
                            </div>

                        </div>
                    </a>
                @endif
            @endif
        </h2>
    @endforeach
</div>