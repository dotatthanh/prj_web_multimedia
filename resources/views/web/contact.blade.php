@extends('layouts.master')

@section('title') Liên hệ @endsection

@section('content')
    <div class="bg-news-list">
        <div class="contact-page">
            <div class="bg-color">
                <div class="container p-top20">
                    <div class="row text-white">
                        <div class="col-md-2 col-sm-2 col-xs-2"></div>
                        <div class="col-md-10 col-sm-10 -col-xs-10 list-item">
                            <ul>
                                <li><a href="{{ route('web.index') }}" title="Trang chủ">Trang chủ</a></li>
                                <li><a href="javascript:void(0)" title="Liên hệ">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row pt-100 pb-100">
                        <div class="col-md-6 col-sm-12 col-xs-12 text-center text-white text-contact">
                            {!! $info->description !!}
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 categories">
                            <form method="POST" action="{{ route('web.post-contact') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="name" placeholder="Họ và tên" class="form-control mt-1">
                                        {!! $errors->first('name', '<span class="text-danger d-block">:message</span>') !!}
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <input type="email" name="email" placeholder="Email" class="form-control mt-1">
                                        {!! $errors->first('email', '<span class="text-danger d-block">:message</span>') !!}
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <input type="number" name="phone_number" placeholder="Số điện thoại" class="form-control mt-1">
                                        {!! $errors->first('phone_number', '<span class="text-danger d-block">:message</span>') !!}
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <textarea placeholder="Nội dung" class="form-control mt-1" rows="5" name="content"></textarea>
                                        {!! $errors->first('content', '<span class="text-danger d-block">:message</span>') !!}
                                        <button class="btn btn-success mt-1 send">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection