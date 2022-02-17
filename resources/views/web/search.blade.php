@extends('layouts.master')

@section('title') Tìm kiếm @endsection

@section('content')
    <div class="container">
        <div class="slider-banner fadeIn animated mt-4">
            <div><a class="c-img" href="javascript:void(0)" title=""><img title="" src="{{ asset('images/web/slide-1.jpg') }}" alt=""></a></div>
            <div><a class="c-img" href="javascript:void(0)" title=""><img title="" src="{{ asset('images/web/slide-2.jpg') }}" alt=""></a></div>
            <div><a class="c-img" href="javascript:void(0)" title=""><img title="" src="{{ asset('images/web/slide-3.jpg') }}" alt=""></a></div>
        </div>
    </div>
    <div class="bg1">
        <div class="container">
            <div class="row p-top30 pb-4">
                <div class="col-md-12 col-sm-12 col-xs-12 title">
                    <h1>Tìm kiếm</h1>
                </div>
                @foreach ($products as $product)
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
            </div>
        </div>
        {{ $products->links() }}
    </div>
@endsection