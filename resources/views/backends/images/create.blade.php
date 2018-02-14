@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-4">
                    <a title="Back to image" class="h2" href="{{route('view.image')}}"><span class="fa fa-arrow-left text-warning"></span></a>
            </div>
            <div class="col-md-8">
                <div>
                    <div class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="addgroup" class="col-form-label">Add group</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" id="addgroup" class="form-control" placeholder="Add group">
                        </div>
                        <button id="add-group" class="btn btn-info mx-sm-3 mb-2">Add group</button>
                    </div>
                    <hr>
                    <form id="form">
                        <div class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="group" class="col-form-label">Choose only group</label>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <select class="form-control" id="group" name="group">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="file" id="photo" class="form-control-file" accept="image/*"/>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input position-static" type="radio" name="blankRadio" id="blankRadio" value="1">
                            </div>
                            <button type="button" id="upload" class="btn btn-info mx-sm-3 mb-2">Upload</button>
                        </div>
                    </form>
                    <div id="process" style="display: none; margin: 10px 0"><div class="alert alert-danger text-center">Process...</div></div>
                    <ul id="file-uploaded" class="m-list-style-type-none"></ul>
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
