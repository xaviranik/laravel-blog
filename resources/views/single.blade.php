@extends('layouts.front')

@section('content')
<div class="content-wrapper">

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{ $post->title }}</h1>
        </div>
    </div>

</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    {{-- <div class="post-thumb">
                        <img src="{{ $post->featured }}" alt="seo">
                    </div> --}}

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">{{ $post->user->name }}</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published">
                                    {{ $post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single', ['id' => $post->category->id]) }}">{{
                                    $post->category->name}}</a>
                            </span>

                        </div>

                        <div class="post__content-info">

                            <div class="main_content">
                                {!! $post->content !!}
                            </div>

                            <div class="widget w-tags mt-4">
                                <div class="tags-wrap">
                                    @foreach ($post->tags as $tag)
                                    <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="w-tags-item">#{{
                                        $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials text-center p-4">
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset('app/img/blog-details-author.png') }}" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $post->user->name }}</h5>
                            {{-- <p class="author-info">SEO Specialist</p> --}}
                        </div>
                        <p class="text">{{ $post->user->profile->about }}</p>
                        <div class="socials">

                            <a href="{{ $post->user->profile->facebook }}" class="social__item">
                                <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                            <a href="{{ $post->user->profile->youtube }}" class="social__item">
                                <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                    @if ($prev_post)
                    <a href="{{ route('post.single', ['slug' => $prev_post->slug]) }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{ str_limit($prev_post->title, $limit = 45, $end = '...')
                                }}</p>
                        </div>
                    </a>
                    @endif

                    @if ($next_post)
                    <a href=" {{ route('post.single', ['slug' => $next_post->slug]) }}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{ str_limit($next_post->title, $limit = 45, $end = '...')
                                }}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                    @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>

                    @include('includes.disqus')
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12 mt-4">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach ($all_tags as $tag)
                            <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="w-tags-item">#{{ $tag->tag
                                }}</a>
                            @endforeach

                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>
@endsection
