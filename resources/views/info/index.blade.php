@extends('layouts.default')

@section('title') Quản lý thông tin @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Thông tin</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);" title="Quản lý" data-toggle="tooltip" data-placement="top">Quản lý</a></li>
                                    <li class="breadcrumb-item active">Thông tin</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="GET" action="{{ route('infos.index') }}">
                                    <div class="row mb-2">
                                        {{-- @can('Sửa thông tin') --}}
                                        <div class="col">
                                            <div class="text-sm-right">
                                                <a href="{{ route('infos.edit', $info->id) }}" data-toggle="tooltip" data-placement="top" title="Sửa" class="text-white btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-pencil mr-1"></i> Sửa thông tin</a>
                                            </div>
                                        </div><!-- end col-->
                                        {{-- @endcan --}}
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Mô tả</h4>
                                
                                {!! $info->description !!}

                            </div>
                        </div>
                    </div>
                </div>
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