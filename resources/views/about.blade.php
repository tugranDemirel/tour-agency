@extends('layouts.app')
@section('title', $about->name.' | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('meta')
    <meta name="description" content="{{ $about->short_desc }}">
    <meta name="keywords" content="{{ $about->name }}">

@endsection
@section('content')

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset($about->image) }}"
             style="background: url({{ asset($about->image) }})  no-repeat center center;
                height: 470px;
                width: auto;
                background-attachment: fixed;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                position: relative;"
    >
        <div class="parallax-content-1 opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="animated fadeInDown">
                <h1>{{$about->name}}</h1>
                <p>{{$about->short_desc}}</p>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="#">@lang('Home')</a>
                    </li>
                    <li>@lang('About Us')</li>
                </ul>
            </div>
        </div>
        <!-- End Position -->

        <div class="container margin_60">

            <div class="main_title">
                <h2>@lang('Some') <span>@lang('good') </span>@lang('reasons')</h2>
                <p>@lang('Some good reasons text')</p>
            </div>

            <div class="row">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature">
                        <i class="icon_set_1_icon-30"></i>
                        <h3><span>+ 1000</span> @lang('Customer')</h3>
                        <p>
                            {{ $about->customer_text }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="feature">
                        <i class="icon_set_1_icon-41"></i>
                        <h3><span>+120</span> @lang('Premium city tours')</h3>
                        <p>
                            {{ $about->premium_text }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <div class="row">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature">
                        <i class="icon_set_1_icon-57"></i>
                        <h3><span>@lang('H24')</span> @lang('Support')</h3>
                        <p>
                            {{ $about->support_text }}</p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.4s">
                    <div class="feature">
                        <i class="icon_set_1_icon-61"></i>
                        <h3><span>{{$langCount}} @lang('Languages')</span> @lang('available')</h3>
                        <p>
                            {{ $about->language_text }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <div class="row">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature">
                        <i class="icon_set_1_icon-13"></i>
                        <h3><span>@lang('Accesibility')</span> @lang('managment')</h3>
                        <p>
                            {{ $about->accessibility_text }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.6s">
                    <div class="feature">
                        <i class="icon_set_1_icon-22"></i>
                        <h3><span>@lang('Pet')</span> @lang('allowed')</h3>
                        <p>
                            {{ $about->pet_allow_text }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <h4>@lang('Mission')</h4>
                    <p>
                        {{ $about->mission }}
                    </p>
                    <div class="general_icons">
                        <ul>
                            <li><i class="icon_set_1_icon-59"></i>@lang('Breakfast')</li>
                            <li><i class="icon_set_1_icon-8"></i>@lang('Dinner')</li>
                            <li><i class="icon_set_1_icon-32"></i>@lang('Photo collection')</li>
                            <li><i class="icon_set_1_icon-50"></i>@lang('Personal shopper')</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>@lang('Vision')</h4>
                    <p>
                        {{ $about->vision }}
                    </p>
                    <div class="general_icons">
                        <ul>
                            <li><i class="icon_set_1_icon-98"></i>@lang('Audio guide')</li>
                            <li><i class="icon_set_1_icon-27"></i>@lang('Parking')</li>
                            <li><i class="icon_set_1_icon-36"></i>@lang('Exchange')</li>
                            <li><i class="icon_set_1_icon-63"></i>@lang('Mobile')</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 nopadding features-intro-img">
                    <div class="features-bg" style="position: relative;
    min-height: 400px;
    background: url({{ asset($about->banner_image) }}) no-repeat center center;
    background-size: cover;">
                        <div class="features-img" style="    width: 100%;
    height: 400px;
    text-align: center;
    line-height: 400px;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 nopadding">
                    <div class="features-content">
                        <h3>"{{ $about->banner_title }}"</h3>
                        <p>
                            {{ $about->banner_text }}
                        </p>
                       {{-- <p>
                            <a href="#" class=" btn_1 white">Read more</a>
                        </p>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End container-fluid  -->

        <div class="container margin_60">

            <div class="main_title">
                <h2>@lang('What') <span>@lang('customers') </span>@lang('says')</h2>
                <p>@lang('What customers says text')</p>
            </div>

            <div class="row">
                @foreach($comments as $comment)
                <div class="col-lg-6">
                    <div class="review_strip">
                        <h4 style="margin: -12px 0 30px 0;">{{$comment->author_name}}</h4>
                        <p>
                            "{{$comment->message}}"
                        </p>
                    </div>
                    <!-- End review strip -->
                </div>
                @endforeach
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $_mainConfig->laptop_image }}" alt="{{ $_setting->title }}" class="img-fluid laptop">
                </div>
                <div class="col-md-6">
                    <h3><span>@lang('Get started')</span> @lang('with CityTours')</h3>
                    <p>
                        @lang('Get started with CityTours text')
                    </p>
                    <ul class="list_order">
                        <li><span>1</span>@lang('Select your preferred tours')</li>
                        <li><span>2</span>@lang('Purchase tickets and options')</li>
                        <li><span>3</span>@lang('Pick them directly from your office')</li>
                    </ul>
                    <a href="{{ route('front.index') }}" class="btn_1">@lang('Start now')</a>
                </div>
            </div>
            <!-- End row -->

        </div>
        <!-- End Container -->
    </main>
    <!-- End main -->
@endsection
