@extends('layouts.app')
@section('stylesheet')
    <!-- Toggle Switch -->
    <link href="{{ asset('common/toggle_switch.css') }}" rel="stylesheet">
    <style>
        #search {
            background-image: url({{asset('/common/image/searchicon.png')}});
            background-position: 10px 12px;
            background-repeat: no-repeat;
            width: 100%;
            padding-left: 35px;
        }
    </style>
@endsection
@section('content')
    @include('message.message')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-sm-4" style="overflow-y: scroll; height: 800px">
                <form method="POST" action="{{route('view.group.createRegion')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="image">Link image:</label>
                        <input type="text" class="form-control" id="image" placeholder="Enter image" name="image"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="name_region">Name:</label>
                        <input type="text" class="form-control" id="name_region" placeholder="Enter name" name="name"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="description_region">Description:</label>
                        <textarea type="text" class="form-control" id="description_region"
                                  placeholder="Enter description" name="description"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <label class="switch">
                            <input type="checkbox" name="status" value="1" class="status" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mr-2">Add region</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </form>
                <hr>
                <div class="mt-3">
                    <div class="form-group">
                        <label for="search">Region name:</label>
                        <input class="form-control" type="text" id="search" placeholder="Search region"
                               onkeyup="search()">
                    </div>
                    <div id="search-item">
                        @foreach($regions as $region)
                            <div class="element-item">
                                <div class="row">
                                    <div class="col-sm-8">

                                        <div class="form-group">
                                            <label for="region_name">Region name:</label>
                                            <input class="form-control region_name" type="text" readonly
                                                   value="{{$region->name}}"
                                                   id="region_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="region_name">Region seo:</label>
                                            <input class="form-control" type="text" readonly
                                                   value="{{$region->name_seo}}"
                                                   id="region_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="region_image">Region image:</label>
                                            <input class="form-control" type="text" readonly value="{{$region->image}}"
                                                   id="region_image">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        @if($region->image)<img class="m-img-w" src="{{$region->image}}">@else<p
                                                class="text-danger text-center">Image not found</p>@endif
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="Description" readonly></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <label class="switch">
                                        <input type="checkbox" name="status" value="1" class="status" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="mt-3 text-center">
                                    <a class="mr-2" href="{{url('admin/group/'.$region->id.'/editRegion')}}">
                                        <button class="btn btn-info"><span class="fa fa-pencil"></span> Edit region
                                        </button>
                                    </a>
                                    <a href="{{url('admin/group/deleteRegion/'.$region->id)}}" class="remove-item"
                                       data-toggle="modal" data-target=".remove">
                                        <button type="button" class="btn btn-danger"><span class="fa fa-trash"></span>
                                            Delete
                                            region
                                        </button>
                                    </a>
                                </div>
                                <hr/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="mb-3">
                    <button class="btn btn-info text-light" data-toggle="modal" data-target="#addGroup"><span
                                class="fa fa-group"></span> Add Group
                    </button>
                </div>
                @if ($groups->count() != 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#N</th>
                            <th>Name</th>
                            <th>SEO</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>###</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $key=>$group)
                            <tr id="{{$group->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$group->name}}</td>
                                <td>{{$group->name_seo}}</td>
                                <td>{!! $group->description?str_limit($group->description,$limit=100,$end='...'):'<p class="text-danger">None</p>' !!}</td>
                                <td><label class="switch">
                                        <input class="status" type="checkbox"
                                               value="{{$group->status}}" {{$group->status == 1?'checked':''}}>
                                        <span class="slider round"></span>
                                    </label></td>
                                <td>{!! $group->created_at?$group->created_at->todateString():'<p class="text-danger">None</p>' !!}</td>
                                <td><a href="{{url('admin/group/'.$group->id.'/edit')}}" style="margin-right: 6px"
                                       title="edit"><span
                                                class="fa fa-pencil"></span></a><a
                                            class="remove-item" href="{{url('admin/group/delete/'.$group->id)}}"
                                            title="remove" data-toggle="modal" data-target=".remove"><span
                                                class="fa fa-trash"></span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class=" mb-5">
                        <a href="{{route('view.image')}}" class="h3 text-dark">Not found item</a>
                    </div>
            @endif
            {{Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4")}}
            {{ $groups->links() }}
            <!-- Add group -->
                <div class="modal fade" id="addGroup">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action="{{route('view.group.create')}}">
                            {{csrf_field()}}
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Group</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea type="text" class="form-control" id="description"
                                                  name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inlineFormCustomSelectPref">Region:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"
                                                name="region"
                                                required>
                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}">{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <label class="switch">
                                            <input type="checkbox" name="status" value="1" class="status" id="status"
                                                   checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!--delete-->
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
                                    <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> OK
                                    </button>
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
    <!-- HTML -->
    <script src="{{asset('html-js/html.js')}}" type="text/javascript"></script>
    <!-- Scrip -->
    <script>
        changeBox('.status');
        closeError();

        $(document).on('click', '.remove-item', function () {
            var url = $(this).attr('href');
            $('#remove-item').attr('action', url);
        });

        function search() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            ul = document.getElementById("search-item");
            li = ul.getElementsByClassName("element-item");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByClassName("region_name")[0].value;
                console.log(a.toUpperCase());
                if (a.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";

                }
            }
        }
    </script>
@endsection
