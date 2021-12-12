@extends('layouts.master')

@section('title') Chi tiết tin tức @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2"></div>
                <div class="col-md-10 col-sm-10 col-xs-10 list-item">
                    <ul>
                        <li><a href="{{ route('web.index') }}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="javascript:void(0)" title="Danh mục tin tức">Danh mục tin tức</a></li>
                        <li><a href="javascript:void(0)" title="{{ $news->title }}">{{ $news->title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="container p-top20 mb-4">
            <div class="row">
                <div class="col-md-9 col-md-push-3 col-sm-12 col-xs-12 news-detail">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h1>{{ $news->title }}</h1>
                            <div class="date">
                                <span>{{ date("d/m/Y", strtotime($news->created_at)) }} |</span>
                                <a href="{{ route('web.category-news', $news->category->id) }}" title="">{{ $news->category->name }}</a>
                            </div>
                            
                            <div class="news-other">
                                <ul>
                                    @foreach ($orther_news as $news)
                                        <li><a href="{{ route('web.news-detail', $news->id) }}" title="">{{ $news->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            
                            <div class="s-content">
                                {!! $news->content !!}
                            </div>
                        </div>
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
    </div>
@endsection