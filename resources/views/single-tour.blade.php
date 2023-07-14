@extends('layouts.app')
@section('title', $cityLocationCarPrice->car->name.' | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('meta')
    <meta name="description" content="{{ $cityLocationCarPrice->car->description }}">
    <meta name="keywords" content="{{ $cityLocationCarPrice->car->name }}">
@endsection
@section('filter')

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset($cityLocationCarPrice->car->image) }}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>{{ $cityLocationCarPrice->car->name }}</h1>
                        <span></span>
                    </div>
                    <div class="col-md-4">
                        <div id="price_single_main">
                             <span><sup>{{ $_setting->currency ?? '$'}}</sup>{{ $cityLocationCarPrice->price }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End section -->

@endsection
@section('content')

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">@lang('Home')</a>
                </li>
                <li>@lang('Car Detail')</li>
            </ul>
        </div>
    </div>
    <!-- End Position -->


    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-8" id="single_tour_desc">

                <div id="single_tour_feat">
                    <ul>
                        <li><i class="icon_set_1_icon-86"></i>@lang('Wi-fi')</li>
                        <li><i class="icon_set_1_icon-22"></i>@lang('Pet allowed')</li>
                        <li><i class="icon_set_1_icon-97"></i>@lang('Music')</li>
                        <li><i class="icon_set_1_icon-29"></i>@lang('Chat')</li>
                    </ul>
                </div>

                <p class="d-block d-lg-none"><a class="btn_map" data-bs-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a></p>
                <!-- Map button for tablets/mobiles -->

                <div class="row">
                    <div class="col-lg-3">
                        <h3>@lang('Description')</h3>
                    </div>
                    <div class="col-lg-9">
                        <h4>{{ $cityLocationCarPrice->car->name }}</h4>
                        {!! $cityLocationCarPrice->car->description !!}
                        <!-- End row  -->
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <ul class="list_ok">
                            <li>@lang('Cold Treats')</li>
                            <li>@lang('Chat')</li>
                            <li>@lang('Pet allowed')</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list_ok">
                            <li>@lang('Wi-fi')</li>
                            <li>@lang('Music')</li>
                        </ul>
                    </div>
                </div>
                <hr>

                <div class="row">
                    {{--<div class="col-lg-3">
                        <h3>Reviews </h3>
                        <a href="#" class="btn_1 add_bottom_30" data-bs-toggle="modal" data-bs-target="#myReview">Leave a review</a>
                    </div>--}}
                    <div class="col-lg-9">
                    @foreach($cityLocationCarPrice->comments as $comment)
                        <div class="review_strip_single">

                            <small> - {{ date('d.m.Y', strtotime($comment->created_at)) }} -</small>
                            <h4 style="margin: -12px 0 30px 0;">{{ $comment->author_name }}</h4>
                            <p>
                                "{{ $comment->message }}"
                            </p>
                           {{-- <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                            </div>--}}
                        </div>
                        <!-- End review strip -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!--End  single_tour_desc-->

            <aside class="col-lg-4 mt-5">
                <div class="box_style_1 expose">
                    <h3 class="inner">- @lang('Review') -</h3>
                    <form action="{{ route('front.store_comment', ['cityLocationCarPrice' => $cityLocationCarPrice]) }}" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="icon-user-3"></i>@lang('First Name') @lang('Last Name')</label>
                                <input class="form-control @error('author_name') is-invalid @enderror" name="author_name" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class=" icon-email"></i> @lang('Email')</label>
                                <input class=" form-control @error('author_email') is-invalid @enderror" name="author_email" type="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="icon-sub"></i>@lang('Message')</label>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="" style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn_full" >@lang('Comment')</button>
                        @csrf
                    </form>
                </div>
                <!--/box_style_1 -->

                <div class="box_style_4">
                    <i class="icon_set_1_icon-90"></i>
                    <h4><span>@lang('Need')</span> @lang('Help')?</h4>
                    <a href="tel:{{ $_setting->phone }}" class="phone">{{ $_setting->phone }}</a>
                    <small>@lang('24/7')</small>
                </div>

            </aside>
        </div>
        <!--End row -->
    </div>
    <!--End container -->

    <div id="overlay"></div>
    <!-- Mask on input focus -->
@endsection
