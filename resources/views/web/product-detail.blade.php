@extends('layouts.master')

@section('title') Chi tiết sản phẩm @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2"></div>
                <div class="col-md-10 col-sm-10 col-xs-10 list-item">
                    <ul>
                        <li><a href="{{ route('web.index') }}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="javascript:void(0)" title="Danh mục sản phẩm">Danh mục sản phẩm</a></li>
                        <li><a href="javascript:void(0)" title="{{ $product->name }}">{{ $product->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="container p-top20 mb-4">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 product-detail">
                    <h4>{{ $product->name }}</h4>
                    <p>Người đăng: {{ $product->customer->name }}</p>
                    <p class="mb-3">Danh mục: {{ $product->category->name }}</p>

                    @if (substr($product->file, -3) == 'pdf')
                        <embed src="{{ asset($product->file) }}" class="w-100" height="600px" />
                    @elseif (substr($product->file, -3) == 'mp3' || substr($product->file, -3) == 'mp4')
                        <video class="w-100" controls>
                            <source src="{{ asset($product->file) }}" type="video/{{ substr($product->file, -3) }}">
                        </video>
                    @else
                        <img class="w-100" src="{{ asset($product->file) }}" alt="" style="max-width: 766px;">
                    @endif

                    <div class="description">
                        {!! $product->description !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection