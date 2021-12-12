@extends('layouts.master')

@section('title') Quên mật khẩu @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container p-top50">
            <h2 class="text-center mb-3 h2">Quên mật khẩu</h2>
            <form method="post" action="{{ route('web.forgot-password') }}" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label" for="email">Email: <span class="text-danger">*</span></label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Nhập email">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection