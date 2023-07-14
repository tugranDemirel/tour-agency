<!DOCTYPE html>
<html lang="tr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>@yield('title') </title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('assets/admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('assets/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('assets/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
          media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('assets/admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
          rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">

    {{--    <title>@yield('title') - {{ config('app.name') }}</title>--}}
    <link href="{{ asset('assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
          media="all">

    <!-- Main CSS-->
    <link href="{{ asset('assets/admin/css/theme.css') }}" rel="stylesheet" media="all">
    @yield('styles')
</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="">
                        <img src="{{ asset($_setting->logo) }}" alt="{{ $_setting->title }}"/>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow">
                            <i class="fas fa-tachometer-alt"></i>Anasayfa</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('admin.main_config') }}">Anasayfa Ayarları</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.appointment.index') }}">
                            <i class="fas fa-calendar-check"></i>Randevular</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pricing.index') }}">
                            <i class="fas fa-money-bill-alt"></i>Fiyatlandırma</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.location.index') }}">
                            <i class="fas fa-map-marker-alt"></i>Lokasyonlar</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Araç</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('admin.car-type.index') }}">Araç Tipi</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.car-model.index') }}">Araç Model</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.car.index') }}">Araçlar</a>
                            </li>
                        </ul>
                    </li>


                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Sayfalar</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('admin.about.index') }}">Hakkımızda</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.contact.index') }}">İletişim</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.faq.index') }}">Sıkça Sorulan Sorular</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.private-service.index') }}">Özel İstek</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.service.index') }}">
                            <i class="fas fa-rss"></i>Servisler</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.comment.index') }}">
                            <i class="fas fa-table"></i>Yorumlar</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="{{ route('admin.setting.index') }}">
                            <i class="fas fa-desktop"></i>Site Ayarları</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="{{ route('admin.language.index') }}">
                            <i class="fas fa-language"></i>Dil Ayarları</a>
                    </li>
                    <li class="">
                        <a class="" href="/languages" target="_blank">
                            <i class="fas fa-language"></i>Sabit Dil Ayarları</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="{{asset($_setting->logo)}}" alt="{{ $_setting->title }}"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Anasayfa</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('admin.main_config') }}">Anasayfa Ayarları</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.appointment.index') }}">
                            <i class="fas fa-calendar-check"></i>Randevular</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pricing.index') }}">
                            <i class="fas fa-money-bill-alt"></i>Fiyatlandırma</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.location.index') }}">
                            <i class="fas fa-map-marker-alt"></i>Lokasyonlar</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Araç</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('admin.car-type.index') }}">Araç Tipi</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.car-model.index') }}">Araç Model</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.car.index') }}">Araçlar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Sayfalar</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('admin.about.index') }}">Hakkımızda</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.contact.index') }}">İletişim</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.faq.index') }}">Sıkça Sorulan Sorular</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.private-service.index') }}">Özel İstek</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.service.index') }}">
                            <i class="fas fa-rss"></i>Servisler</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.comment.index') }}">
                            <i class="fas fa-comment"></i>Yorumlar</a>
                    </li>
                    <li class="">
                        <a class="js-arrow" href="{{ route('admin.setting.index') }}">
                            <i class="fas fa-desktop"></i>Site Ayarları</a>

                    </li>
                    <li class="">
                        <a class="js-arrow" href="{{ route('admin.language.index') }}">
                            <i class="fas fa-language"></i>Dil Ayarları</a>
                    </li>
                    <li class="">
                        <a  href="/languages" target="_blank">
                            <i class="fas fa-language"></i>Sabit Dil Ayarları</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                            {{--<input class="au-input au-input--xl" type="text" name="search"
                                   placeholder="Search for datas &amp; reports..."/>
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>--}}
                        </form>
                        <div class="header-button">
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{ asset('assets/admin/images/icon/avatar-01.jpg') }}"
                                             alt="John Doe"/>
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        {{--<div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ asset('assets/admin/images/icon/avatar-01.jpg') }}"
                                                         alt="John Doe"/>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">john doe</a>
                                                </h5>
                                                <span class="email">johndoe@example.com</span>
                                            </div>
                                        </div>--}}
                                        {{--<div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
                                            </div>
                                        </div>--}}
                                        <div class="account-dropdown__footer">
                                            <a onclick="document.getElementById('logoutForm').submit()">
                                                <i class="zmdi zmdi-power"></i>Çıkış Yap</a>
                                        </div>
                                        <form id="logoutForm" method="post" action="{{ route('logout') }}" style="display:none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @if(session()->has('success') || session()->has('error'))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                @if(session()->has('success'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Başarılı</span>
                                        {{ session()->get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Hatalı</span>
                                        {{ session()->get('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    @yield('content')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Tüm Hakları Saklıdır. Design by <a href="https://colorlib.com">Tuğran Demirel</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

</div>

<!-- Jquery JS-->
<script src="{{ asset('assets/admin/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('assets/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('assets/admin/vendor/slick/slick.min.js') }}">
</script>
<script src="{{ asset('assets/admin/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
</script>
<script src="{{ asset('assets/admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ asset('assets/admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}">
</script>

<!-- Main JS-->
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
@yield('js')

</body>

</html>
<!-- end document-->
