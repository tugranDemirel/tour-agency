@extends('layouts.app')
@section('title', $service->title.' | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('meta')
    <meta name="description" content="{{ $service->meta_description }}">
    <meta name="keywords" content="{{ $service->meta_title }}">
@endsection
@section('content')

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/private-service.jpg') }}" data-natural-width="1400" data-natural-height="470"
             style="background:url({{ asset('images/private-service.jpg') }})  no-repeat center center;
    height: 470px;
    width: auto;
    background-attachment: fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    position: relative;">
        <div class="parallax-content-1 opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="animated fadeInDown">
                <h1>{{ $service->banner_title }}</h1>
                <p>{{ $service->banner_text }}</p>
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
                    <li>@lang('Services')</li>
                </ul>
            </div>
        </div>
        <!-- End Position -->

        <div class="container margin_60">
            <div class="main_title">
                <h2>{{ $service->title }}</h2>

            </div>
            <hr>
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-5">
                    <img src="{{ asset($service->banner_image) }}" alt="Image" class="img-fluid styled">
                </div>
                <div class="col-lg-7 col-md-7">
                    {!! $service->content !!}
                </div>
            </div>
            <!-- End row -->
            <hr>

        </div>
        <!-- End container -->

        <div class="container-fluid mt-5">
            <div class="row">
                @foreach($services as $s)
                <div class="col-lg-3 col-md-6 text-center">
                    <p>
                        <a href="{{ route('front.service', ['service'=> $s]) }}"><img src="{{ asset($s->banner_image) }}" alt="{{ $service->title }}" class="img-fluid rounded"></a>
                    </p>
                    <h4>{{ $s->title }}</h4>
                    <p>{{ $s->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End container-fluid -->
    </main>
    <!-- End main -->

@endsection
