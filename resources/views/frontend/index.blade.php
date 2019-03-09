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

<div class="main-slider">
        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
            data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
            data-swiper-breakpoints="true" data-swiper-loop="true" >
            <div class="swiper-wrapper">
                @foreach($categories as $category)
                    
                    <div class="swiper-slide">
                        <a class="slider-category" href="#">
                            <div class="blog-image"><img src="{{asset('frontend/images/'.$category->image)}}" alt=""></div>

                            <div class="category">
                                <div class="display-table center-text">
                                    <div class="display-table-cell">
                                        <h3><b>{{$category->name}}</b></h3>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                @endforeach
                

            </div><!-- swiper-wrapper -->

        </div><!-- swiper-container -->

    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">
                {{-- Post Item --}}
                @foreach($posts as $post)
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{asset('frontend/post-images/'.$post->image)}}" alt=""></div>

                                <a class="avatar" href="#"><img src="{{asset('frontend/images/love-icon.png')}}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{route('post.details', $post->slug)}}"><b>{{ $post->title}}</b></a></h4>

                                    <ul class="post-footer">

                                        @guest

                                         <li><a href="javascript:void(0)" onclick="toastr.info('Add To favroute you need to login', 'info',{
                                            closeButton: true,
                                            progressBar: true,
                                         })">
                                                <i class="ion-heart"></i>
                                                {{ $post->favourite_to_users->count() }}
                                            </a></li>

                                        @else 

                                        <li><a
                                        class="{{ Auth::user()->favourite_posts->where('pivot.post_id', $post->id)->count() > 0 ? 'isFavourite' : ''  }}"

                                         href="javascript:void(0)" onclick="document.getElementById('favourite-post-{{$post->id}}').submit()">
                                                <i class="ion-heart"></i>
                                                {{ $post->favourite_to_users->count() }}
                                            </a>
                                        </li>
                                        <form id="favourite-post-{{$post->id}}" action="{{ route('post.favourite', $post->id) }}" method='post' style="display: none">

                                            @csrf
                                            
                                        </form>

                                        @endguest
                                        
                                        <li><a href="#"><i class="ion-chatbubble"></i>0</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->

                @endforeach
                

            </div><!-- row -->

            <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

        </div><!-- container -->
    </section><!-- section -->


@endsection