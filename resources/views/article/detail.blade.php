@extends('layouts/home')
@section('body')
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="{{asset('img/blog/details/details-hero.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{{$articleDetail->a_name}}</h2>
                        <ul>
                            <li>By ThanhBK</li>
                            <li>{{$articleDetail->created_at}}</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Beauty (20)</a></li>
                                <li><a href="#">Food (5)</a></li>
                                <li><a href="#">Life Style (9)</a></li>
                                <li><a href="#">Travel (10)</a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                            @if(isset($articleNew))
                                @foreach($articleNew as $articleNew)
                                <a href="{{route('get.detail.article',[$articleNew->a_slug,$articleNew->id])}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{pare_url_file($articleNew->a_avatar)}}" style="width: 60px;height: 60px;" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$articleNew->a_name}}</h6>
                                        <span>{{$articleNew->created_at}}</span>
                                    </div>
                                </a>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        <!-- <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text"><br><br>
                        <img src="{{pare_url_file($articleDetail->a_avatar)}}"    alt="">
                        <p>{{$articleDetail->a_content}}</p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{asset('img/blog/details/details-author.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>ThanhBK</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> Food</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Post You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @if(isset($articles))
            @foreach($articles as $new)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{pare_url_file($new->a_avatar)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$new->created_at}}</li>
                            </ul>
                            <h5><a href="{{route('get.detail.article',[$new->a_slug,$new->id])}}">{{$new->a_description}}</a></h5>
                            <p>{{$new->a_description}}... </p>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif   
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
@stop