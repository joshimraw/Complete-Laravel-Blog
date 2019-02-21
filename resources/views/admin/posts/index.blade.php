@extends('backend.layout')

@section('title', '| Posts')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
	    	<button type="button" class="btn btn-primary waves-effect">
	            <i class="material-icons">add</i>
	            <span>Add New Posts</span>
	        </button>
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
                                <th>Name</th>
                                <th>Created</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
								<tr>
									<td>
										<input type="checkbox" id="" class="filled-in chk-col-light-blue">
										<label for=""> 1</label></td>
                                    <td>Name</td>
                                    <td>21.02.219</td>
                                    <td>21.02.219</td>
								</tr>
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