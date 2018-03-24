@extends('layouts.frontend')
@section('title')Trang chủ@endsection
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('common/header.css')}}">@endsection
@section('content')
    @include('frontends.includes.header')
    @if (isset($post))
        @include('frontends.includes.content-album')
    @else
        @include('frontends.includes.notfounds.not-file');
    @endif
        @include('frontends.includes.footer')
@endsection