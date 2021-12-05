@extends('layouts.default')

@section('title') Cập nhật sản phẩm @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Cập nhật sản phẩm</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="Quản lý sản phẩm" data-toggle="tooltip" data-placement="top">Quản lý sản phẩm</a></li>
                                    <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Thông tin cơ bản</h4>
                                <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>

                                <form method="POST" action="{{ route('products.update', $data_edit->id) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @include('product._form', ['routeType' => 'update'])
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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