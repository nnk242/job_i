@extends('layouts.frontend')
@section('title')Xem ảnh - {{$image->name}}@endsection
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('common/header.css')}}">@endsection
@section('contents')
    @include('frontends.includes.header')
    <div class="m-margin-top-110px">
        <div class="mb-5">
            <div class="container-fluid">
                <div>
                    <img src="{{in_array(substr($image->url, 0, 4), $first_url_image)?$image->url:asset($image->url)}}"
                         class="m-collection-w m-border-darius-5 m-border-img" id="m-img">
                </div>
            </div>
        </div>
    </div>
    @if (!in_array(substr($image->url, 0, 4), $first_url_image))
        <div class="m-tab m-opacity-7">
            <a href="#tab"><img class="m-img-w" src="{{asset("common/image/plus.png")}}"></a>
            <div class="m-tab-icon">
                <div class="m-tab-c">
                    <div>
                        <a download="{{$image->name}}.jpg"
                           href="{{in_array(substr($image->url, 0, 4), $first_url_image)?$image->url:asset($image->url)}}">
                            <img class="m-img-w" src="{{asset("common/image/download.png")}}">
                        </a>
                    </div>
                </div>
                <div class="m-bg"></div>
            </div>
        </div>
    @endif
    <div id="backgroup"></div>
@endsection
@section('js')
    <script>
        var bg = $("#m-img").attr("src");
        $('#backgroup').css({"background-image": 'url("' + bg + '")'});
    </script>
@endsection