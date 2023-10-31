@extends('layouts.app')
@section('title', 'Anasayfa | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('meta')
    @isset($_seo)
        <meta name="description" content="{{ $_seo->meta_description }}">
        <meta name="keywords" content="{{ $_seo->meta_keywords }}">
    @endisset
@endsection
@section('filter')
   {{-- <img class="img-fluid" src="{{ asset('images/prices.jpg') }}" alt="" style="
            max-height: 700px;
            max-width: 100%;
            width: 100%;
            display: table;
            z-index: 99;
            position: relative;
    ">--}}
   <div class="row mt-5 justify-content-center">
       <div class="col-md-4 d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block">
           <div class="thumbnail">
                   <img src="{{ asset('images/prices_left.jpg') }}" alt="Lights" style="width:100%; z-index: 99!important;">
           </div>
       </div>
       <div class="col-md-4">
           <div class="thumbnail">
                   <img src="{{ asset('images/prices_main.jpg') }}" alt="Lights" style="width:100%; z-index: 99!important;">
           </div>
       </div>
       <div class="col-md-4 d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block">
           <div class="thumbnail">
                   <img src="{{ asset('images/prices_right.jpg') }}" alt="Lights" style="width:100%; z-index: 99!important;">
           </div>
       </div>
   </div>
    @include('layouts.filter')
@endsection
@section('content')

    <div class="">
        @if(session()->has('success'))
            <div class="row" style="justify-content: center; text-align: center">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="row" style="justify-content: center; text-align: center">
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <div class="container  margin_60">
            <div class="main_title">
                <h2><span>@lang('Popular')</span> @lang('tours')</h2>
                <p>
                    @lang('popular tours text')
                </p>
            </div>
            <div class="row add_bottom_45">
               {{-- @foreach($_popularLocations as $_popularLocation)
                    @foreach($_popularLocation->cityLocation as $cityLocation)
                        @dd($cityLocation)
                        @foreach($cityLocation->city as $location)
                            <div class="col-lg-4 other_tours">
                                <ul>
                                    <li><a href="#"><i class="icon_set_1_icon-41"></i>test</a>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach--}}
                @foreach($_cityLocations->where('is_popular', 1)->take(25) as $_popularLocation)
                            <div class="col-lg-4 other_tours ">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icon_set_1_icon-41"></i>
                                                {{ $_popularLocation->name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                @endforeach
            </div>
            <!-- End row -->
            {{--<div class="margin_60">

                    <div class="row feature_home_2 justify-content-between">
                        <div class="col-md-5 text-center review_strip wow zoomIn" data-wow-delay="0.2s">

                            <h3>Mission</h3>
                            <p>{{ $_about->mission }}</p>
                        </div>
                        <div class="col-md-5 text-center review_strip wow zoomIn ml-2" data-wow-delay="0.2s">

                            <h3>Vision</h3>
                            <p> {{ $_about->vision }}</p>
                        </div>

                    </div>

                <!-- End container -->
            </div>--}}

            <div class="container margin_60" style="background: #f9f9f9;">


                <div class="row justify-content-between">

                    <div class="col-lg-5 wow zoomIn" data-wow-delay="0.2s">
                        <div class="feature_home">
                            <h3><span>@lang('Mission')</span></h3>
                            <p> {{ $_about->mission }}</p>
                            <a href="{{ route('front.about') }}" class="btn_1 outline">@lang('Read more')</a>
                        </div>
                    </div>

                    <div class="col-lg-5 wow zoomIn" data-wow-delay="0.4s">
                        <div class="feature_home">
                            <h3><span>@lang('Vision')</span></h3>
                            <p> {{ $_about->vision }}</p>
                            <a href="{{ route('front.about') }}" class="btn_1 outline">@lang('Read more')</a>
                        </div>
                    </div>


                </div>
                <!--End row -->

            </div>
            <div class="banner colored">
                <h4>@lang('Discover our Top tours from') <span> {{ $_setting->currency ?? '$' }}{{$_mainConfig->price}}</span></h4>
                <p>
                    {{ $_mainConfig->price_description}}
                </p>
                <a href="#search_container" class="btn_1 white">@lang('Read more')</a>
            </div>

            <div class="row ">
                @foreach($services as $service)
                    <div class="col-lg-3 col-md-6 text-center wow zoomIn" data-wow-delay="0.2s">
                        <p>
                            <a href="{{ route('front.service', ['service'=> $service]) }}"><img src="{{ asset($service->banner_image) }}" alt="{{ $service->title }}" class="img-fluid rounded"></a>
                        </p>
                        <h4>{{ $service->title }}</h4>
                        <p>{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
            <!-- End row -->

        </div>
        <!-- End container -->
    </div>
    <!-- End white_bg -->

    <section class="promo_full" style="background: url({{ asset($_mainConfig->video_image) }})  no-repeat center center;
    height: auto;
    background-attachment: fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    position: relative;">
        <div class="promo_full_wp magnific">
            <div>
                <h3>{{ $_mainConfig->video_title }}</h3>
                <p>
                    {{ $_mainConfig->video_description }}
                </p>
                <a href="{{ $_mainConfig->video_url }}" class="video"><i class="icon-play-circled2-1"></i></a>
            </div>
        </div>
    </section>
    <!-- End section -->

    <div class="container margin_60">

        <div class="main_title">
            <h2>@lang('Some') <span>@lang('good')</span> @lang('reasons')</h2>
            <p>
                @lang('Some good reasons text')
            </p>
        </div>

        <div class="row">

            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-41"></i>
                    <h3><span>+120</span> @lang('Premium city tours')</h3>
                    <p>
                        {{ $_mainConfig->premium_text }}
                    </p>
                    <a href="{{ route('front.about') }}" class="btn_1 outline">@lang('Read more')</a>
                </div>
            </div>

            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.4s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-30"></i>
                    <h3><span>+1000</span> @lang('Customer')</h3>
                    <p>
                        {{ $_mainConfig->customer_text }}
                    </p>
                    <a href="{{ route('front.about') }}" class="btn_1 outline">@lang('Read more')</a>
                </div>
            </div>

            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-57"></i>
                    <h3><span>@lang('H24') </span> @lang('Support')</h3>
                    <p>
                        {{ $_mainConfig->support_text }}
                    </p>
                    <a href="{{ route('front.about') }}" class="btn_1 outline">@lang('Read more')</a>
                </div>
            </div>

        </div>
        <!--End row -->

        <hr>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($_mainConfig->laptop_image) }}" alt="Laptop" class="img-fluid laptop">
            </div>
            <div class="col-md-6">
                <h3><span>@lang('Get started')</span>@lang('with CityTours')</h3>
                <p>
                    @lang('Get started with CityTours text')
                </p>
                <ul class="list_order">
                    <li><span>1</span>@lang('Select your preferred tours')</li>
                    <li><span>2</span>@lang('Purchase tickets and options')</li>
                    <li><span>3</span>@lang('Pick them directly from your office')</li>
                </ul>
                <a href="#search_container" class="btn_1">@lang('Start now')</a>
            </div>
        </div>
        <!-- End row -->
        <div class="row mt-5">
            @foreach($comments as $comment)
                <div class="col-lg-6 wow zoomIn">
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

    </div>
    <!-- End container -->
@endsection
