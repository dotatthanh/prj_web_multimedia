<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"> --}}

    @yield('css')
    @stack('css')


    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Toastr Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs\toastr\build\toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}" type="text/css">
</head>
<body>
    <header>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-2 logo">
                        {{-- <a href="{{ route('web.index') }}" title="">
                            <img title="" class="img-responsive" src="{{ asset('images/web/logo.jpg') }}" alt="">
                        </a> --}}
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <div class="phone">
                            <i class="fa fa-phone-square" aria-hidden="true"></i> <a href="tel:0563047024" title="">0563.047.024</a>
                        </div>
                        <div class="email">
                            <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:ducthang.dt03@gmail.com">ducthang.dt03@gmail.com</a>
                        </div>
                        @if (auth()->guard('web')->user())
                            <div class="dropdown d-inline-block-sm float-right account">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->guard('web')->user()->name }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('web.profile') }}" title="Th??ng tin c?? nh??n">Th??ng tin c?? nh??n</a>
                                    <a class="dropdown-item" href="{{ route('web.change-password') }}" title="?????i m???t kh???u">?????i m???t kh???u</a>
                                    <form method="POST" action="{{ route('web.logout') }}">
                                        @csrf
                                        <a class="dropdown-item text-danger" href="{{ route('web.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">????ng xu???t</a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="login ml-3">
                                <a href="{{ route('web.login') }}" title="????ng nh???p">????ng nh???p</a>
                            </div>

                            <div class="register ml-3">
                                <a href="{{ route('web.register') }}" title="????ng k??">????ng k??</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-2 logo">
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-10 rip">
                        <button class="btn-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
                        <div class="menu">
                            <ul>
                                <li><a href="{{ route('web.index') }}" title="Trang ch???">Trang ch???</a></li>
                                </li>
                                <li><a href="javascript:void(0)" title="Danh m???c s???n ph???m">Danh m???c s???n ph???m</a>
                                    <ul>
                                    @foreach ($category_products as $category)
                                        <li><a href="{{ route('web.category-product', $category->id) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)" title="Tin t???c">Tin t???c</a>
                                    <ul>
                                        @foreach ($category_news as $category)
                                          <li><a href="{{ route('web.category-news', $category->id) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('web.contact') }}" title="Li??n h???">Li??n h???</a></li>
                                @if (auth()->guard('web')->user())
                                    <li><a href="{{ route('web.view-post-product') }}" title="????ng s???n ph???m">????ng s???n ph???m</a></li>
                                @endif
                            </ul>
                        </div>

                        <div class="menu1">
                            <button class="btn-menu1"><i class="fa fa-close" aria-hidden="true"></i></button>
                            <ul>
                                <li><a href="{{ route('web.index') }}" title="Trang ch???">Trang ch???</a></li>
                                </li>
                                <li><a href="javascript:void(0)" title="Danh m???c s???n ph???m">Danh m???c s???n ph???m</a>
                                    <ul>
                                      @foreach ($category_products as $category)
                                        <li><a href="{{ route('web.category-product', $category->id) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
                                      @endforeach
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)" title="Tin t???c">Tin t???c</a>
                                    <ul>
                                        @foreach ($category_news as $category)
                                          <li><a href="{{ route('web.category-news', $category->id) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('web.contact') }}" title="Li??n h???">Li??n h???</a></li>
                                @if (auth()->guard('web')->user())
                                    <li><a href="{{ route('web.view-post-product') }}" title="????ng s???n ph???m">????ng s???n ph???m</a></li>
                                    <li><a href="{{ route('web.profile') }}" title="Th??ng tin c?? nh??n">Th??ng tin c?? nh??n</a></li>
                                    <li><a href="{{ route('web.change-password') }}" title="?????i m???t kh???u">?????i m???t kh???u</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('web.logout') }}">
                                            @csrf
                                            <a class="dropdown-item text-danger" href="{{ route('web.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">????ng xu???t</a>
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('web.login') }}" title="????ng nh???p">????ng nh???p</a></li>
                                    <li><a href="{{ route('web.register') }}" title="????ng k??">????ng k??</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="search">
                            <form action="{{ route('web.search') }}">
                                <input type="text" placeholder="T??? kh??a t??m ki???m..." name="search">
                                <button type="submit" title=""><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!--          Content -->
    @yield('content')
    <!--          Content -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12 info-contact p-top30">
                    <h2>TH??NG TIN LI??N H???</h2>
                    <p>?????a ch???: Km 10, ???????ng Nguy???n Tr??i, Qu???n Thanh Xu??n , TP H?? N???i, Vi???t Nam</p>
                    <div><span>Hotline:</span> <a href="tel:0563047024">0563.047.024</a></div>
                    <div><span>Email:</span> <a href="mailto:ducthang.dt03@gmail.com">ducthang.dt03@gmail.com</a></div>
                    <p>Gi???y CN??KDN: 0308808576</p>
                </div>
                <div class="col-md-5 col-sm-8 col-xs-12 p-top30">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 info-footer">
                            <h3>TH??NG TIN</h3>
                            <a href="#" title="">Th??ng tin TK ng??n h??ng</a>
                            <a href="#" title="">Th??ng tin li??n h???</a>
                            <img title="" class="img-responsive" src="{{ asset('images/web/dky.png') }}" alt="">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 sup-footer">
                            <h3>H??? TR??? KH??CH H??NG</h3>
                            <a href="#" title="">H??nh th???c thanh to??n</a>
                            <a href="#" title="">Ch??nh s??ch</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 p-top30">
                    <div class="fb-page" 
                        data-href="https://www.facebook.com/facebook"
                        data-width="380" 
                        data-hide-cover="false"
                        data-show-facepile="false">
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <a href="tel:0564654654" title="" class="btn-call">
        <span><i class="fa fa-phone"></i></span>
    </a>

    <button class="btn-top"><i class="fa fa-angle-up"></i></button>



    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('slick/slick.js') }}"></script>
    <!-- toastr plugin -->
    <script src="{{ asset('libs\toastr\build\toastr.min.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      // add class paginate theme
      $('ul.pagination').addClass('pagination-rounded justify-content-center mt-4 mb-4');

      // toastr noti
        @if(Session::has('alert-success'))
            Command: toastr["success"]("{{ Session::get('alert-success') }}")

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 0,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        @endif

        @if(Session::has('alert-error'))
        Command: toastr["error"]("{{ Session::get('alert-error') }}")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @endif
    </script>

    @yield('js')
    @stack('js')
</body>
</html>