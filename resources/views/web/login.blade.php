@extends('layouts.master')

@section('title') Đăng nhập @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container p-top50">
            <h2 class="text-center mb-3 h2">Đăng nhập</h2>
            <form method="post" action="{{ route('web.post-login') }}" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label" for="email">Email: <span class="text-danger">*</span></label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Nhập email">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">Mật khẩu: <span class="text-danger">*</span></label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                            {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <a href="{{ route('web.view-forgot-password') }}" class="text-primary" title="Quên mật khẩu?">Quên mật khẩu?</a>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection