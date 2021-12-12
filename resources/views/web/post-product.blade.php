@extends('layouts.master')

@section('title') Đăng sản phẩm @endsection

@section('content')
    <div class="bg-news-list">
        <div class="container p-top50">
            <h2 class="text-center mb-3 h2">Đăng sản phẩm</h2>

            <form method="post" action="{{ route('web.post-product') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Tên sản phẩm" value="">
                            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="category_id">Danh mục sản phẩm <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="category_id">
                                <option value="">Chọn danh mục sản phẩm</option>
                                @foreach ($category_products as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="text-danger">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="file">File <span class="text-danger">*</span></label>
                            <input id="file" name="file" type="file" class="form-control">
                            {!! $errors->first('file', '<span class="text-danger">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="image">Ảnh <span class="text-danger">*</span></label>
                            <input id="image" name="image" type="file" class="form-control">
                            {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Mô tả <span class="text-danger">*</span></label>
                            <textarea id="description" class="summernote mb-2" name="description"></textarea>
                            {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng sản phẩm</button>
                        </div>
                    </div>


                </div>
            </form>

        </div>
    </div>
@endsection

@push('js')
    <!-- select 2 plugin -->
    <script src="{{ asset('libs\select2\js\select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('js\pages\ecommerce-select2.init.js') }}"></script>

    <!-- Summernote js -->
    <script src="{{ asset('libs\summernote\summernote-bs4.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('js\pages\form-editor.init.js') }}"></script>
@endpush

@push('css')
    <!-- Summernote css -->
    <link href="{{ asset('libs\summernote\summernote-bs4.min.css') }}" rel="stylesheet" type="text/css">
    <!-- select2 css -->
    <link href="{{ asset('libs\select2\css\select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush