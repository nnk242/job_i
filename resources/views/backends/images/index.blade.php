@extends('layouts.app')
@section('stylesheet')
    <!-- Toggle Switch -->
    <link href="{{ asset('common/toggle_switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-sm-2">
                <a href="{{route('view.image.create')}}">
                    <button class="btn btn-info text-light"><span class="fa fa-plus"></span> Add Image</button>
                </a>

            </div>
            <div class="col-sm-10">
                <h2>Basic Table</h2>
                <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#N</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Url f</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>###</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $key=>$image)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$image->name}}</td>
                            <td>{{$image->title}}</td>
                            <td>{{str_limit($image->content,$limit=100,$end='...')}}</td>
                            <td>{{$image->url}}</td>
                            <td><img style="height: 65px" src="{{$image->url}}"></td>
                            <td><label class="switch">
                                    <input type="checkbox" {{$image->status == 1?'checked':''}}>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>{{$image->created_at->todateString()}}</td>
                            <td><a href="" style="margin-right: 6px" title="edit"><span class="fa fa-pencil"></span></a><a class="m-remove" href="{{url('admin/image/delete/'.$image->id)}}" title="remove" data-toggle="modal" data-target=".remove"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4")}}
                {{ $images->links() }}
            <!-- Remove -->
                <div class="modal fade remove">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Delete image</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Do you want delete
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <form method="POST" action="#" id="remove-item">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success"><span class="fa fa-check"></span>  OK</button>
                                </form>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Script jquery -->
    <script src="{{asset('jquery/jquery.js')}}" type="text/javascript"></script>
<script>
    $(document).on('click', '.m-remove', function () {
        var url = $(this).attr('href');
        $('#remove-item').attr('action', url);
    });
</script>
@endsection
