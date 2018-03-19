@extends('layouts.frontend')
@section('title')Xem ảnh - @endsection
@section('stylesheet')<link rel="stylesheet" href="{{asset('common/header.css')}}">@endsection
@section('content')
    @include('frontends.includes.header')
    <div class="m-margin-top-110px">
        <div class="mb-5">
            <div class="container-fluid">
                <div>
                    <img src="{{asset('test/test2.jpg')}}" class="m-collection-w m-border-darius-5 m-border-img" id="m-img">
                </div>
            </div>
        </div>
    </div>
    <div class="m-tab m-opacity-7">
        <a href="#tab"><img class="m-img-w" src="{{asset("common/image/plus.png")}}"></a>
        <div class="m-tab-icon">
            <div class="m-tab-c">
                <div>
                    <a download="test2.jpg" href="{{asset('test/test2.jpg')}}">
                        <img class="m-img-w" src="{{asset("common/image/download.png")}}">
                    </a>
                </div>
            </div>
            <div class="m-bg"></div>
        </div>
    </div>
    <div id="backgroup"></div>
@endsection
@section('js')
    <script>
        var bg = $("#m-img").attr("src");
        $('#backgroup').css({"background-image": 'url("' + bg + '")'});
    </script>
@endsection