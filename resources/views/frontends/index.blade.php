@extends('layouts.frontend')
@section('title')Trang chủ@endsection
@section('stylesheet')<link rel="stylesheet" href="{{asset('common/header.css')}}">@endsection
@section('contents')
    @include('frontends.includes.header')
    @include('frontends.includes.contents.content_index')
    @include('frontends.includes.footer')
@endsection