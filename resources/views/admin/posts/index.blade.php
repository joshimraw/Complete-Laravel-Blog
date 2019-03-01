@extends('backend.layout')

@section('title', '| Posts')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
	    	<a href="{{route('admin.post.create')}}" class="btn btn-primary waves-effect">
	            <i class="material-icons">add</i>
	            <span>Add New Posts</span>
	        </a>
        </div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>All Posts
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
                                <th>Author</th>
                                <th>Name</th>
                                <th>body</th>
                                <th>View</th>
                                <th>Status</th>
                                <th>Approved</th>
                                <th>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($posts as $key => $post)
								<tr>
									<td>
										<input type="checkbox" id="" class="filled-in chk-col-light-blue">
										<label for=""> {{ $key + 1 }}</label>
                                    </td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ str_limit( $post->title, 12) }}</td>
                                    <td>{{ str_limit( $post->body, 18 ) }}</td>
                                    <td class="text-center">2</td>
                                    <td>{{ ($post->status == 1) ? 'Published' : 'Draft'  }}</td>
                                    <td>{{ ($post->is_approved == 1) ? 'Approved' : 'Pending' }}</td>
                                    <td>{{ date('M j, Y', strtotime($post->updated_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.post.show', $post->id) }}">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{ route('admin.post.edit', $post->id) }}">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        
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