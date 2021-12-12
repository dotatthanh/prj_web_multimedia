@extends('layouts.master')

@section('title') Danh mục sản phẩm @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2"></div>
                <div class="col-md-10 col-sm-10 col-xs-10 list-item">
                    <ul>
                        <li><a href="{{ route('web.index') }}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="javascript:void(0)" title="Danh mục sản phẩm">Danh mục sản phẩm</a></li>
                        <li><a href="javascript:void(0)" title="{{ $category->name }}">{{ $category->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="container p-top20">
            <div class="row">
                <div class="col-md-3  col-sm-12 -col-xs-12 categories-product-list">
                    <div class="product-category">
                        <h3>Danh mục sản phẩm</h3>
                        <ul>
                             @foreach ($category_products as $category)
                                <li><a href="{{ route('web.category-product', $category->id) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
                              @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9  col-sm-12 -col-xs-12">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4 col-sm-6 col-xs-12 fadeInUp animated p-bot30">
                                <div class="product">
                                    <a href="{{ route('web.product-detail', $product->id) }}" title="{{ $product->name }}" class="c-img light">
                                        <img title="{{ $product->name }}" src="{{ asset($product->image) }}" alt="">
                                    </a>
                                    <div class="ct">
                                        <h3><a href="{{ route('web.product-detail', $product->id) }}" title="">{{ $product->name }}</a></h3>
                                        <span>{{ $product->customer->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                
            </div>
        </div>

        {{ $products->links() }}
    </div>
@endsection