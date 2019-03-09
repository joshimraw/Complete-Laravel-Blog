@extends("frontend.layout")

@section('title', '| Welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset("frontend/css/homepage/styles.css")}}">
<link rel="stylesheet" href="{{ asset("frontend/css/homepage/responsive.css")}}">

<style>
    .isFavourite{
        color: blue;
    }
</style>
@endpush


@section('content')

    <section class="blog-area section">
        <div class="container">

            <div class="row">
                {{-- Post Item --}}
                @foreach($posts as $post)
                    
                    <div class="col-md-12">
                        <div class="blog-info text-left">

                            <h4><a href="{{route('post.details', $post->slug)}}"><b>{{ $post->title}}</b></a></h4>
                            <p>{!! html_entity_decode($post->body) !!}</p>

                        </div>
                    </div>

                @endforeach

            </div>

        </div><!-- container -->
    </section><!-- section -->


@endsection