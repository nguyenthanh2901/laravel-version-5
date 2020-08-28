@extends('layouts/home')
@section('body')
<!-- Hero Section Begin -->
<section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                        @if(isset($categories))
                        @foreach($categories as $cate)
                            <li><a href="#">{{$cate -> c_name}}</a></li>
                            
                        @endforeach
                        @endif    
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                    
                                </div> -->
                                <input type="text" placeholder="What do you need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 0342.730.001</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    @if(isset($slides))
                    @foreach($slides as $slides)
                    <div class="hero__item set-bg" data-setbg="{{pare_url_file($slides->s_avatar)}}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                @if(isset($categories))
                @foreach($categories as $new)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg"  data-setbg="{{ pare_url_file($new->c_avartar) }}">
                        <h5><a href="#">{{$new->c_name}}</a></h5>
                        </div>
                    </div>
                @endforeach
                @endif    
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            @if(isset($productHot))
            @foreach($productHot as $productHot)
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{pare_url_file($productHot->pro_avatar)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$productHot->pro_name}}</a></h6>
                            <h5>{{$productHot->pro_price}}.00$</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif  

            @if(isset($productSale))
            @foreach($productSale as $productHot)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges vegetables ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{pare_url_file($productHot->pro_avatar)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$productHot->pro_name}}</a></h6>
                            <h5>{{$productHot->pro_price}}.00$</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif  
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
            @if(isset($banners))
            @foreach($banners as $banners)
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                    <a href=""><img src="{{pare_url_file($banners->s_avatar)}}" alt=""></a>
                    </div>
                </div>
            @endforeach
            @endif    
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @if(isset($productOld))
                            @foreach($productOld as $productOld)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img  src="{{pare_url_file($productOld->pro_avatar)}}" style="width: 110px;height: 110px;" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$productOld->pro_name}}</h6>
                                        <span>{{$productOld->pro_price}}.00$</span>
                                    </div>
                                </a>
                            @endforeach
                            @endif    
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @if(isset($productNew))
                            @foreach($productNew as $productOld)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img  src="{{pare_url_file($productOld->pro_avatar)}}" style="width: 110px;height: 110px;" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$productOld->pro_name}}</h6>
                                        <span>{{$productOld->pro_price}}.00$</span>
                                    </div>
                                </a>
                            @endforeach
                            @endif    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @if(isset($productNew))
                            @foreach($productNew as $productOld)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img  src="{{pare_url_file($productOld->pro_avatar)}}" style="width: 110px;height: 110px;" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$productOld->pro_name}}</h6>
                                        <span>{{$productOld->pro_price}}.00$</span>
                                    </div>
                                </a>
                            @endforeach
                            @endif    
                             
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @if(isset($productOld))
                            @foreach($productNew as $productOld)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img  src="{{pare_url_file($productOld->pro_avatar)}}" style="width: 110px;height: 110px;" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$productOld->pro_name}}</h6>
                                        <span>{{$productOld->pro_price}}.00$</span>
                                    </div>
                                </a>
                            @endforeach
                            @endif    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @if(isset($productOldHot))
                            @foreach($productOldHot as $productOldHot)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                    <img  src="{{pare_url_file($productOldHot->pro_avatar)}}" style="width: 110px;height: 110px;" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$productOldHot->pro_name}}</h6>
                                        <span>{{$productOldHot->pro_price}}.00$</span>
                                    </div>
                                </a>
                            @endforeach
                            @endif    
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @if(isset($product))
                            @foreach($product as $productOldHot)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                    <img  src="{{pare_url_file($productOldHot->pro_avatar)}}" style="width: 110px;height: 110px;" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$productOldHot->pro_name}}</h6>
                                        <span>{{$productOldHot->pro_price}}.00$</span>
                                    </div>
                                </a>
                            @endforeach
                            @endif    
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @if(isset($articleNew))
            @foreach($articleNew as $articleNew)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{pare_url_file($articleNew->a_avatar)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$articleNew->created_at}}</li>
                            </ul>
                            <h5><a href="#">{{$articleNew->a_description}}</a></h5>
                            <p>{{$articleNew->a_description}}... </p>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif   
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@stop