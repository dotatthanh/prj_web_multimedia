@extends('layouts.master')

@section('title') Trang chủ @endsection

@section('content')
    <div class="slider-banner fadeIn animated">
        <div><a class="c-img" href="javascript:void(0)" title=""><img title="" src="{{ asset('images/web/slider.jpg') }}" alt=""></a></div>
        <div><a class="c-img" href="javascript:void(0)" title=""><img title="" src="{{ asset('images/web/slider.jpg') }}" alt=""></a></div>
        <div><a class="c-img" href="javascript:void(0)" title=""><img title="" src="{{ asset('images/web/slider.jpg') }}" alt=""></a></div>
    </div>
    <div class="bg1">
        <div class="container">
            <div class="row p-top30">
                @foreach ($category_products as $category)
                    <div class="col-md-12 col-sm-12 col-xs-12 title">
                        <h1>{{ $category->name }}</h1>
                    </div>
                    @foreach ($category->getProducts as $product)
                        <div class="col-md-3 col-sm-6 col-xs-12 fadeInUp animated p-top20">
                            <div class="product">
                                <a href="{{ route('web.product-detail', $product->id) }}" title="{{ $product->name }}" class="c-img light">
                                    <img title="{{ $product->name }}" src="{{ $product->image }}" alt="">
                                </a>
                                <div class="ct">
                                    <h3><a href="{{ route('web.product-detail', $product->id) }}" title="">{{ $product->name }}</a></h3>
                                    <span>{{ $product->customer->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg2 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 title">
                    <h2>Tin tức mới nhất</h2>
                </div>

                @foreach ($latest_news as $news)
                <div class="col-md-3 col-sm-6 col-xs-12 fadeIn animated p-top20">
                    <div class="news">
                        <a href="{{ route('web.news-detail', $news->id) }}" title="{{ $news->title }}" class="c-img"><img title="" src="{{ asset('images/web/anh2-1.jpg') }}" alt=""></a>
                        <h3><a class="title-news" href="{{ route('web.news-detail', $news->id) }}" title="{{ $news->title }}">{{ $news->title }}</a></h3>
                        <p>
                            @php
                                $str = strip_tags($news->summary); //Lược bỏ các tags HTML
                                if(strlen($str)>220) { //Đếm kí tự chuỗi $str, 220 ở đây là chiều dài bạn cần quy định
                                    $strCut = substr($str, 0, 220); //Cắt 220 kí tự đầu
                                    $str = substr($strCut, 0, strrpos($strCut, ' ')).' ... '; //Tránh trường hợp cắt dang dở như "nội d... Read More"
                                }
                                echo $str;
                            @endphp
                        </p>
                        <span>{{ date("d/m/Y", strtotime($news->created_at)) }} |</span>
                        <a href="{{ route('web.category-news', $news->category->id) }}" title="">{{ $news->category->name }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection