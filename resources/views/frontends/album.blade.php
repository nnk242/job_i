@extends('layouts.frontend')
@section('title')Trang chủ@endsection
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('common/header.css')}}">@endsection
@section('contents')
    @include('frontends.includes.header')
    @if (isset($post))
        @include('frontends.contents.content_album')
    @else
        @include('frontends.includes.notfounds.not_file');
    @endif
        @include('frontends.includes.footer')
@endsection