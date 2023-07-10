@extends('frontend.main_master')
@section('main')
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            {{-- <h2 class="title">Recent Article</h2> --}}
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon02.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon03.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon04.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon05.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon06.png" alt=""></li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- blog-area -->
        <section class="standard__blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($blogpost as $blogs)
                        <div class="standard__blog__post">
                            <div class="standard__blog__thumb">
                                <a href="blog-details.html"><img src="{{asset($blogs->blog_image)}}" alt="Blog_thumbnail"></a>
                                <a href="blog-details.html" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                            </div>
                            <div class="standard__blog__content">
                                <div class="blog__post__avatar">
                                    <div class="thumb"><img src="assets/img/blog/blog_avatar.png" alt="avatar"></div>
                                    <span class="post__by">By : <a href="#">Halina Spond</a></span>
                                </div>
                                <h2 class="title"><a href="blog-details.html">{{$blogs->blog_title}}</a></h2>
                                <p>{!! Str::limit($blogs->blog_description, 200) !!};
                                </p>
                                <ul class="blog__post__meta">
                                    <li><i class="fal fa-calendar-alt"></i>{{Carbon\Carbon::parse($blogs->created_at)->diffForHumans()}}</li>
                                    {{-- <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li> --}}
                                    {{-- <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        <div class="pagination-wrap">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="far fa-long-arrow-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="far fa-long-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="blog__sidebar">
                            <div class="widget">
                                <form action="#" class="search-form">
                                    <input type="text" placeholder="Search">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Recent Blog</h4>
                                <ul class="rc__post">
                                    @foreach ($allblogs as $blogs)
                                        <li class="rc__post__item">
                                            <div class="rc__post__thumb">
                                                <a href="{{ route('blog.details', $blogs->id) }}"><img
                                                        src="{{ asset($blogs->blog_image) }}" alt=""></a>
                                            </div>
                                            <div class="rc__post__content">
                                                <h5 class="title"><a
                                                        href="{{ route('blog.details', $blogs->id) }}">{{ $blogs->blog_title }}</a>
                                                </h5>
                                                <span class="post-date"><i
                                                        class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blogs->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Categories</h4>
                                <ul class="sidebar__cat">
                                    @foreach ($categories as $cat)
                                        <li class="sidebar__cat__item"><a
                                                href="{{ route('category.blog', $cat->id) }}">{{ $cat->blog_category }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Recent Comment</h4>
                                <ul class="sidebar__comment">
                                    <li class="sidebar__comment__item">
                                        {{-- <a href="{{ route('blog.details', $blog->id) }}">Rasalina Sponde</a> --}}
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        {{-- <a href="{{ route('blog.details', $blog->id) }}">Rasalina Sponde</a> --}}
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        {{-- <a href="{{ route('blog.details', $blog->id) }}">Rasalina Sponde</a> --}}
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        {{-- <a href="{{ route('blog.details', $blog->id) }}">Rasalina Sponde</a> --}}
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Popular Tags</h4>
                                <ul class="sidebar__tags">
                                    <li><a href="blog.html">Business</a></li>
                                    <li><a href="blog.html">Design</a></li>
                                    <li><a href="blog.html">apps</a></li>
                                    <li><a href="blog.html">landing page</a></li>
                                    <li><a href="blog.html">data</a></li>
                                    <li><a href="blog.html">website</a></li>
                                    <li><a href="blog.html">book</a></li>
                                    <li><a href="blog.html">Design</a></li>
                                    <li><a href="blog.html">product design</a></li>
                                    <li><a href="blog.html">landing page</a></li>
                                    <li><a href="blog.html">data</a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->


        <!-- contact-area -->
        @include('frontend.home_all.home_contact_area')
        <!-- contact-area-end -->

    </main>
    <!-- main-area -->
    <main>





    </main>
    <!-- main-area-end -->
    <!-- main-area-end -->
@endsection
