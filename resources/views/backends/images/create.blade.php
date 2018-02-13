@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div>
                    <input type="file" id="photo" accept="image/*"/>
                    <button id="upload">Upload</button>
                    <div id="process" style="display: none">Process...</div>
                    <ul id="file-uploaded"></ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Script upload-js photo -->
    <script src="{{asset('jquery/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('upload-js/upload-photo.js')}}" type="text/javascript"></script>
    <script>
        //Tạo một đối tượng uploadPhoto
        var UploadPhoto = new uploadPhoto('{!! route('view.image.store') !!}');
        //Thực hiện hàm init để cài đặt token cho ajax và bắt sự kiện upload-js
        UploadPhoto.init();
    </script>
@endsection
