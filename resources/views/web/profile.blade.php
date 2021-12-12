@extends('layouts.master')

@section('title') Thông tin cá nhân @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container p-top50 mb-4">
            <h2 class="text-center mb-3 h2">Thông tin cá nhân</h2>
            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <label class="col-sm-2">Họ và tên:</label>
                        <div class="col-sm-10">{{ auth()->guard('web')->user()->name }}</div>

                        <label class="col-sm-2">Email:</label>
                        <div class="col-sm-10">{{ auth()->guard('web')->user()->email }}</div>

                        <label class="col-sm-2">Giới tính:</label>
                        <div class="col-sm-10">{{ auth()->guard('web')->user()->gender }}</div>

                        <label class="col-sm-2">Địa chỉ:</label>
                        <div class="col-sm-10">{{ auth()->guard('web')->user()->address }}</div>

                        <label class="col-sm-2">Ngày sinh:</label>
                        <div class="col-sm-10">{{ date("d-m-Y", strtotime(auth()->guard('web')->user()->birthday)) }}</div>

                        <label class="col-sm-2">Số điện thoại:</label>
                        <div class="col-sm-10">{{ auth()->guard('web')->user()->phone_number }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col">Ảnh đại diện: </label>
                    <img title="" class="img-responsive w-100" src="{{ asset(auth()->guard('web')->user()->avatar) }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection