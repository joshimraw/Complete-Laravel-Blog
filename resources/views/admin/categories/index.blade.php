@extends('backend.layout')

@section('title', '| Categoris')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <form action="{{ route('admin.category.store') }}" method='post' enctype="multipart/form-data">
                @csrf
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="name" type="text" class="form-control" placeholder=" Category Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="file" name="image" class="form-control"> 
                            </div>
                        </div>
                    </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Add New Category</span>
                </button>
                </div>
            </div>
        </form>
        </div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>All Tags
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Delete</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="check_all" class="filled-in chk-col-light-blue">
                                    <label for="check_all"><strong>All ID</strong></label>
                                </th>
                                <th>Name</th>
                                <th>Images</th>
                                <th>Created</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="{!! $category->id !!}" class="filled-in chk-col-light-blue">
                                        <label for="{!! $category->id !!}"> {{ $key + 1 }}</label></td>
                                    <td>{{$category->name}}</td>
                                    <td>{{ $category->image }}</td>
                                    <td>{{ date('M j, Y', strtotime($category->created_at)) }}</td>
                                    <td>{{ date('M j, Y', strtotime($category->updated_at)) }}</td>
                                    <td>
                                       {!! Form::open(['route'=>['admin.category.destroy', $category->id], 'method'=>'delete']) !!}
                                       {!! Form::submit('Delete', ['class'=>'btn bg-red btn-sm waves-effect']) !!}
                                       {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>

@endsection

@push('script')
<script src="{{asset('backend/plugins/jquery-datatable-extension/dtaTables.bootstrap.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable-extension/jquery.dtaTables.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable-extension/dtaTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable-extension/buttons.flash.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable-extension/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable-extension/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable-extension/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable-extension/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable-extension/vfs_fonts.js')}}"></script>
@endpush