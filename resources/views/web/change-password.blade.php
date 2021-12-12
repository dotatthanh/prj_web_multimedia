@extends('layouts.master')

@section('title') Đổi mật khẩu @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container p-top50">
            <h2 class="text-center mb-3 h2">Đổi mật khẩu</h2>

            <form method="post" action="{{ route('web.post-change-password') }}" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label" for="password_old">Mật khẩu hiện tại: <span class="text-danger">*</span></label>
                            <input name="password_old" type="password" class="form-control" id="password_old" placeholder="Nhập mật khẩu">
                            {!! $errors->first('password_old', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">Mật khẩu mới: <span class="text-danger">*</span></label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu mới">
                            {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password_confirmation">Nhập lại mật khẩu mới: <span class="text-danger">*</span></label>
                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Nhập lại mật khẩu mới">
                            {!! $errors->first('password_confirmation', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection