@extends('layouts.front')

@section('content')
<div class="content-wrapper">

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tag: #{{ $tag->tag }}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Post Details -->


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">

                <div class="row">
                    <div class="case-item-wrap">
                        @if ($tag->posts->count() > 0)
                            @foreach ($tag->posts as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ asset('uploads/posts/post-bg-1.jpg') }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('post.single', ['slug' => $post->slug]) }}">{{
                                            $post->title }}</a></h6>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="heading text-center">
                                <h4 class="h1 heading-title">No Posts yet!</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </main>
        </div>
    </div>
    @endsection
