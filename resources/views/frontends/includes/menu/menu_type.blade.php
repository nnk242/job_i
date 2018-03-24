<div class="mb-2">
    <div class="bg-light p-1">
        <p class="h4 ml-1 text-info"><i class="fa fa-sliders"></i> Thể loại</p>
    </div>
    @foreach($types as $type)
        <div class="ml-1 border-bottom border-secondary p-1">
            <a href="{{url('the-loai/' . $type->name_seo)}}" class="text-dark"><i class="fa fa-flag"></i> {{$type->name}}</a>
        </div>
    @endforeach
</div>