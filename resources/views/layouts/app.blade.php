<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ isset($_seo) ? $_seo->meta_description : 'Turizm, vip taşımacılık, Vip, transfer, private transfer, istanbul, arap, rus' }}">
    <meta name="keywords" content="{{ isset($_seo) ? $_seo->meta_keywords : 'Turizm, vip taşımacılık, Vip, transfer, private transfer, istanbul, arap, rus' }}">
    <meta name="author" content="Tuğran Demirel">
    <title>@yield('title', 'İstanbul Koş Koş Tur Transfer')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    @yield('meta')
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- COMMON CSS -->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/vendors.css') }}" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="{{ asset('assets/front/css/custom.css') }}" rel="stylesheet">
    <style>
        #logo_home h1 a, header.sticky #logo_home h1 a, header#plain #logo_home h1 a, header#colored #logo_home h1 a{
            width:160px;
            height:34px;
            display:block;
            background-image:url({{ asset($_setting->logo) }});
            background-repeat:no-repeat;
            background-position:left top;
            background-size: 160px 34px;
            text-indent:-9999px;
        }

        .whatsapp {
            position: fixed;
            left: 0;
            opacity: 0;
            bottom: 25px;
            margin: 0 25px 0 0;
            z-index: 9999;
            transition: 0.35s;
            transform: scale(0.7);
            width: 46px;
            height: 46px;
            opacity: 1;
            transition: all 0.3s;
            border-radius: 50%;
            text-align: center;
            font-size: 21px;
            color: #fff;
            cursor: pointer;
            border-radius: 50%;

        }
    </style>
    @yield('styles')
</head>
<body>

<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Header================================================== -->
<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                @php
                   $phones = explode(',', $_setting->phone);
                @endphp

                <div class="col-6">
                    @foreach($phones as $phone)
                        <a href="https://wa.me/{{ $phone }}"> <i class="icon-phone"></i><strong>{{ $phone }}</strong></a>
                    @endforeach
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div id="logo_home" >
                    <h1><a href="{{ route('front.index') }}" title="İstanbul Koş Koş Tur Transfer">@lang('Home')</a></h1>
                </div>
            </div>
            <nav class="col-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{ $_setting->logo }}" width="160" height="34" alt="City tours">
                    </div>
                    <a class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                        <li class="submenu">
                            <a href="{{ route('front.index') }}" class="show-submenu">@lang('Home') </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">@lang('Services') <i class="icon-down-open-mini"></i></a>
                            <ul>
                                @foreach($_services as $service)
                                <li><a href="{{ route('front.service', ['service' => $service]) }}">{{ $service->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="{{ route('front.about') }}" class="show-submenu">@lang('About') </a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('front.private_service') }}" class="show-submenu">@lang('Private Service') </a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('front.contact') }}" class="show-submenu">@lang('Contact') </a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('front.faq') }}" class="show-submenu">@lang('FAQ')</a>
                        </li>
                    </ul>
                </div><!-- End main-menu -->
            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->
@yield('filter')
<main>
    @yield('content')
</main>
<!-- End main -->

<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>@lang('Need help?')</h3>
                @php
                    $phones = explode(',', $_setting->phone);
                @endphp

                    @foreach($phones as $phone)
                        <a href="https://wa.me/{{ $phone }}" id="phone">{{ $phone }}</a>
                    @endforeach
{{--                <a href="tel:{{ $_setting->phone }}" id="phone">{{ $_setting->phone }}</a>--}}
                <a href="mailto:{{ $_setting->email }}" id="email_footer">{{ $_setting->email }}</a>
            </div>
            <div class="col-md-3">
                <h3>@lang('About')</h3>
                <ul>
                    <li><a href="{{ route('front.about') }}">@lang('About Us')</a></li>
                    <li><a href="{{ route('front.faq') }}">@lang('FAQ')</a></li>
                </ul>
            </div>

            <div class="col-md-2">
                <h3>@lang('Language Settings')</h3>
                <div class="styled-select">
                    <select name="lang" id="langSelected" >
                        @foreach($_langs as $lang)
                        <option value="{{ $lang->locale }}"
                            {{ $lang->locale == app()->getLocale() ? 'selected' :'' }}>
                            {{ $lang->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        @isset($_setting->facebook)
                        <li><a href="{{ $_setting->facebook }}" target="_blank"><i class="icon-facebook"></i></a></li>
                        @endisset
                        <li><a href="{{ $_setting->instagram }}" target="_blank"><i class="icon-instagram"></i></a></li>
                    </ul>

                    <p>© <a href="tel:+905443380633">Tuğran Demirel</a></p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    </a>
</footer><!-- End footer -->
@php
    $height= 0;
@endphp
@foreach($phones as $phone)

<div class="whatsapp"
    style="margin-bottom: {{ $height += 42 }}px;">

    <a href="https://wa.me/{{ $phone }}"

       target="_blank">
        <img src="{{ asset('images/whatsapp.png') }}" alt=""  width="50">
    </a>
</div>
@endforeach
<div id="toTop"></div><!-- Back to top button -->


<!-- Common scripts -->

<script src="{{ asset('assets/front/js/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('assets/front/js/common_scripts_min.js') }}"></script>
<script src="{{ asset('assets/front/js/functions.js') }}"></script>

@yield('scripts')
@yield('scripts2')
<!-- Specific scripts -->
<script>
    $(document).ready(function () {
        $('#langSelected').on('change', function () {
           var lang = $(this).val();
           $.ajax({
               url: "{{ route('front.locale') }}",
               type: "POST",
               data: {
                   _token: "{{ csrf_token() }}",
                   lang: lang
               },
                success: function (data) {
                     location.reload();
               }
           })

       })
    })
</script>
<script>
    $(function() {
        $('input.date-pick').daterangepicker({
            autoUpdateInput: true,
            singleDatePicker: true,
            autoApply: true,
            minDate:new Date(),
            showCustomRangeLabel: false,
            locale: {
                format: 'MM-DD-YYYY'
            }
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('DD-MM-YYYY') + ' (predefined range: ' + label + ')');
        });
    });
</script>
<script>
    $('input.time-pick').timepicker({
        minuteStep: 15,
        showInpunts: false
    })
</script>

<script src="{{ asset('assets/front/js/jquery.ddslick.js') }}"></script>
<script>
    $("select.ddslick").each(function() {
        $(this).ddslick({
            showSelectedHTML: true
        });
    });
</script>
</body>
</html>
