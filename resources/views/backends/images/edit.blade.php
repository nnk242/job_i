@extends('layouts.app')
@section('stylesheet')
    <!-- Toggle Switch -->
    <link href="{{ asset('common/toggle_switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-3">
                <a title="Back to image" class="h2" href="{{url('admin/image')}}"><span
                            class="fa fa-arrow-left text-warning"></span></a>
                <hr>

                <div class="form-group">
                    <label for="addgroup" class="col-form-label">Add group:</label>
                    <input type="text" id="addgroup" class="form-control" placeholder="Add group">
                </div>
                <div class="form-group">
                    <button class="btn btn-info" id="add-group"><span class="fa fa-plus"></span>&nbsp;Add group</button>
                </div>
                <hr>
            </div>
            <div class="col-md-9">
                @if($image)
                    <form id="{{$image->id}}" method="post" action="{{route('view.image.update')}}">
                        {{csrf_field()}}
                        <div class="m-height-250px mt-2"><img id="image" class="card-img-top m-img-b" src="{{$image->url}}"
                                                              alt="Card image cap"></div>
                        <div class="form-group">
                            <label for="url">url</label>
                            <input type="url" class="form-control" id="url" value="{{$image->url}}"
                                   placeholder="Enter url" name="url" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" value="{{$image->name}}"
                                   placeholder="Enter name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" value="{{$image->image_s}}"
                                   placeholder="Enter link" name="link" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" value="{{$image->title}}"
                                   placeholder="Enter title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" placeholder="Enter content"
                                      name="content_" required>{{$image->content}}</textarea>
                        </div>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="group" required>
                            <option selected>Choose...</option>
                            @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group text-center">
                            <label class="switch">
                                <input type="checkbox" {{$image->status == 1?'checked':''}}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                @else
                    <h3>Item not found....</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Script jquery -->
    <script src="{{asset('jquery/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('html-js/html.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var timeout = null;
//name
            $('#name').on('keyup', function () {
                var current = $(this);
                clearTimeout(timeout);
                timeout = setTimeout(function () {
                    $('body').append(loding());
                    current.attr('disabled', true);
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var name = current.val();
                    var id = current.closest('form').attr('id');
                    console.log(id);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('view.image.getUrl') }}',
                        data: {
                            "_token": token,
                            'name': name,
                            'id': id
                        },
                        dataType: 'JSON',
                        timeout: 1000,
                        success: function (response) {
                            $('#loading').remove();
                            current.attr('disabled', false);
                            switch (response.status) {
                                case true:
                                    $('body').append($.parseHTML(successful(response.message)));
                                    $('#link').val(response.value_seo);
                                    break;
                                case false:
                                    $('body').append($.parseHTML(error(response.message)));
                                    break;
                                default:
                                    $('body').append($.parseHTML(error(response.message)));
                                    break;
                            }
                            closeError();
                        },
                        error: function () {
                            $('#loading').remove();
                            current.attr('disabled', false);
                            $('body').append($.parseHTML(error("Error!!!")));
                        }
                    })
                }, 800);
                closeError();
                current.attr('disabled', false);
            });
        });
    </script>
@endsection