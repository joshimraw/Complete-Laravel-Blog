@extends("frontend.layout")

@section('title', '| Welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset("frontend/single-css/styles.css")}}">
<link rel="stylesheet" href="{{ asset("frontend/single-css/responsive.css")}}">

<style>
    .isFavourite{
        color: blue;
    }
</style>
@endpush


@section('content')

<section class="post-area" style="margin-top: 120px;">
        <div class="container">

            <div class="row">

                <div class="col-lg-1 col-md-0"></div>
                <div class="col-lg-10 col-md-12">

                    <div class="main-post">

                        <div class="post-top-area">

                            <h5 class="pre-title">{{ 'CATEGORY NAME' }}</h5>

                            <h3 class="title"><a href="#"><b>
                                {{ $post->title }}
                            </b></a></h3>

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="{{asset('frontend/images/love-icon.png')}}" alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{$post->user->name}}</b></a>
                                    <h6 class="date">on {{ date('M j, Y', strtotime($post->created_at)) }} at {{ date('G:ia', strtotime($post->created_at)) }}</h6>
                                </div>

                            </div><!-- post-info -->

                        </div><!-- post-top-area -->

                        <div class="post-image"><img height="380" src="{{asset('frontend/post-images/'.$post->image)}}" alt="Blog Image"></div>

                        <div class="post-bottom-area">

                            <div class="para">
                                {!! html_entity_decode($post->body) !!}
                            </div>

                            <ul class="tags">
                                @foreach($post->tags as $tag)

                                <li><a href="#">{{$tag->name}}</a></li>

                                @endforeach
                                
                            </ul>

                            <div class="post-icons-area">
                                <ul class="post-icons">
                                    
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
                            </div>


                        </div><!-- post-bottom-area -->

                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- post-area -->

        <section class="recomended-area section">
        <div class="container">
            <div class="row">

             @foreach($randposts as $randpost)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">


                                <div class="blog-image"><img src="{{asset('frontend/post-images/'.$randpost->image)}}" alt=""></div>

                                <a class="avatar" href="#"><img src="{{asset('frontend/images/love-icon.png')}}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{route('post.details', $randpost->slug)}}"><b>{{ $randpost->title}}</b></a></h4>

                                    <ul class="post-footer">

                                        @guest

                                         <li><a href="javascript:void(0)" onclick="toastr.info('Add To favroute you need to login', 'info',{
                                            closeButton: true,
                                            progressBar: true,
                                         })">
                                                <i class="ion-heart"></i>
                                                {{ $randpost->favourite_to_users->count() }}
                                            </a></li>

                                        @else 

                                        <li><a
                                        class="{{ Auth::user()->favourite_posts->where('pivot.post_id', $randpost->id)->count() > 0 ? 'isFavourite' : ''  }}"

                                         href="javascript:void(0)" onclick="document.getElementById('favourite-post-{{$randpost->id}}').submit()">
                                                <i class="ion-heart"></i>
                                                {{ $randpost->favourite_to_users->count() }}
                                            </a>
                                        </li>
                                        <form id="favourite-post-{{$randpost->id}}" action="{{ route('post.favourite', $randpost->id) }}" method='post' style="display: none">

                                            @csrf
                                            
                                        </form>

                                        @endguest
                                        
                                        <li><a href="#"><i class="ion-chatbubble"></i>0</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $randpost->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->


                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-md-6 col-sm-12 -->
            @endforeach

            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section center-text">
        <div class="container">
            <h4><b>POST COMMENT</b></h4>
            <div class="row">

                <div class="col-lg-2 col-md-0"></div>

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">

                        <form action="{{route('comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-sm-12">
                                    <textarea name="comment" rows="2" class="text-area-messge form-control"
                                        placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                </div><!-- col-sm-12 -->
                                <div class="col-sm-12">
                                    <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                        </form>


                    </div><!-- comment-form -->

                    <h4><b>COMMENTS({{ $post->comments()->count() }})</b></h4>
                    
                    @foreach($post->comments as $comment)

                    <div class="commnets-area text-left">

                        <div class="comment">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="{{asset('frontend/images/love-icon.png')}}" alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{$comment->user->name}}</b></a>
                                    <h6 class="date">on {{ date('M j, Y', strtotime($comment->created_at)) }}</h6>
                                </div>

                                <div class="right-area">
                                    <h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
                                </div>

                            </div><!-- post-info -->

                            <p>{{$comment->comment}}</p>

                        </div>
                    </div><!-- commnets-area -->
                    @endforeach

                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>


@endsection