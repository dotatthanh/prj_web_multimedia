@extends('layouts.master')

@section('title') Danh mục tin tức @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2"></div>
                <div class="col-md-10 col-sm-10 -col-xs-10 list-item">
                    <ul>
                        <li><a href="{{ route('web.index') }}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="javascript:void(0)" title="Danh mục sản phẩm">Danh mục tin tức</a></li>
                        <li><a href="javascript:void(0)" title="{{ $category->name }}">{{ $category->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="container p-top20">
            <div class="row">
                <div class="col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                    <div class="row product-news-list">
                        @foreach ($posts as $news)
                            <div class="col-md-4 col-sm-6 col-xs-12 fadeIn animated p-bot20">
                                <div class="news">
                                    <a href="{{ route('web.news-detail', $news->id) }}" title="{{ $news->title }}" class="c-img"><img title="" src="{{ asset($news->image) }}" alt=""></a>
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
                <div class="col-md-3 col-md-pull-9 col-sm-12 col-xs-12 categories">
                    <div class="news-category">
                        <h3>Danh mục tin tức</h3>
                        <ul>
                            @foreach ($category_news as $category)
                                <li><a href="{{ route('web.category-news', $category->id) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="care">
                        <h3>Có thể bạn quan tâm</h3>
                        @foreach ($random_news as $news)
                            <a href="{{ route('web.news-detail', $news->id) }}" title="">{{ $news->title }}</a>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>

        {{ $posts->links() }}
@endsection