@extends('layouts.frontend')
@section('title')Trang chủ@endsection
@section('stylesheet')<link rel="stylesheet" href="{{asset('common/header.css')}}">@endsection
@section('content')
    @include('frontends.includes.header')
    @include('frontends.includes.content-index')
    @include('frontends.includes.footer')
@endsection