@extends('backend.layout')

@section('title', '| Post Details')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
	    	<div class="row">
                <div class="col-md-8">
                <a href="{{route('admin.post.index')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">arrow_back</i>
                    <span>Back</span>
                </a>   

                <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-primary waves-effect pull-right">
                    <i class="material-icons">edit</i>
                    <span>Edit</span>
                </a>

            </div>
            </div>
        </div>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ $post->title }}
                        <small>
                            Posted By {{$post->user->name}} 
                            on {{$post->category->name}}
                            at {{$post->created_at->toFormattedDateString()}}
                    </small>
                    </h2>
                </div>
                <div class="body">
                    <img src="{{ asset('frontend/post-images/'.$post->image) }}" alt="">
                    <p>{!! $post->body !!}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Category: {{ $post->category->name }}</h2>
                </div>
                <div class="header">
                    <h2>Tag:</h2>
                    <ul>
                        @foreach($post->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card">
                    <div class="header">

                        <form action="{{route('admin.post.destroy', $post->id)}}" method='post'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger waves-effect btn-block"> 
                                <i class="material-icons">delete</i>
                            <span>Delete</span>
                            </button>
                        </form>
                    </div>
                </div>    

            </div>
        </div>
    </div>
</div>
</section>

@endsection

@push('script')

@endpush