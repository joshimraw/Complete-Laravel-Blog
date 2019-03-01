@extends('backend.layout')

@section('title', '| Posts')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
	            {{-- A heading bar will be placed there --}}
        </div>
<div class="row clearfix">
    <form action="{{route('admin.post.store')}}" enctype="multipart/form-data" method='post'>
            @csrf
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <h2 class="card-inside-title">Add new post</h2>
                    <div class="row clearfix">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="title" type="text" class="form-control" placeholder="Post Title" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Feature Image</label>
                                   <input type="file" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Body</label>
                                    <textarea name="body" class="form-control">
                                        
                                    </textarea>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Category and Tag</h2>
                </div>
                <div class="body">
                    <div class="form-group form-float{{$errors->has('categories')? 'focused error': ''}}">
                        <label for="category" class="form-label">Select Category</label>
                        <select name="category" id="category" class="form-control show-tick" data-live-search="true">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-float">
                        <label for="tag" class="form-label">Select Tags</label>
                        <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary  btn-block waves-effect">
                            <i class="material-icons">publish</i>
                            <span>Publish</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</section>

@endsection

@push('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
 <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
    selector:'textarea',
     menubar:false,
     });
</script>

@endpush