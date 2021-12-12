@extends('layouts.master')

@section('title') Đăng ký @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container p-top50">
            <h2 class="text-center mb-3 h2">Đăng ký</h2>

            <form method="post" action="{{ route('web.post-register') }}" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name" class="control-label">Họ và tên: <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Họ và tên">
                            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                        </div>
                        

                        <div class="form-group">
                            <label class="control-label" for="email">Email: <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email">
                            {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">Mật khẩu: <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                            {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password_confirmation">Xác nhận mật khẩu: <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Nhập lại mật khẩu">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="phone_number">Số điện thoại: <span class="text-danger">*</span></label>
                            <input type="number" name="phone_number" class="form-control" id="phone_number" placeholder="Nhập số điện thoại">
                            {!! $errors->first('phone_number', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label for="gender" class="control-label">Giới tính <span class="text-danger">*</span></label>
                            <div class="radio">
                                <label><input type="radio" id="nam" name="gender" value="Nam" checked>Nam</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" id="nu" name="gender" value="Nữ">Nữ</label>
                            </div>
                            {!! $errors->first('gender', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label for="avatar" class="control-label">Ảnh đại diện:</label>
                            <input type="file" name="avatar" class="form-control" id="avatar">
                            {!! $errors->first('avatar', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="birthday">Ngày sinh: <span class="text-danger">*</span></label>
                            <input type="date" name="birthday" class="form-control" id="birthday" placeholder="Nhập ngày sinh">
                            {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="address">Địa chỉ: <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ">
                            {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        </div>
    </div>
@endsection