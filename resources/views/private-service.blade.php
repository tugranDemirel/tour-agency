@extends('layouts.app')
@section('title', 'Özel istek | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('meta')
    @isset($_seo)
        <meta name="description" content="{{ $_seo->meta_description }}">
        <meta name="keywords" content="{{ $_seo->meta_keywords }}">
    @endisset
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
                {{--<h1>{{ $service->banner_title }}</h1>
                <p>{{ $service->banner_text }}</p>--}}
            </div>
        </div>
    </section>
    <!-- End Section -->
    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">@lang('Home')</a>
                </li>
                <li>@lang('Private Service')</li>
            </ul>
        </div>
    </div>
    <!-- End Position -->
    <div class="container margin_60">

        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>@lang('Success')!</strong> {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                <strong>@lang('Error')!</strong> {{ session()->get('error') }}
            </div>
        @endif
        <aside class="col-lg-12 mt-5">
            <div class="box_style_1 expose">
                <h3 class="inner">- @lang('Private Service') -</h3>
                <form action="{{ route('front.store_private_service') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label><i class="icon-user-3"></i>@lang('First Name')</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label><i class="icon-user-3"></i>@lang('Last Name')</label>
                                <input class="form-control @error('surname') is-invalid @enderror" name="surname" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label><i class="icon-phone"></i>@lang('Phone')</label>
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text">
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><i class=" icon-email"></i>@lang('Email')</label>
                            <input class=" form-control @error('email') is-invalid @enderror" name="email" type="email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><i class="icon-accessibility"></i> @lang('Sevice Type')</label>
                            <select name="type" id="" class="@error('type') is-invalid @enderror form-select">
                                <option value="not-selected" selected="selected">@lang('Not Selected')</option>
                                <option value="private-daily-tours">@lang('Private Daily Tours')</option>
                                <option value="shared-daily-tours">@lang('Shared Daily Tours')</option>
                                <option value="private-tailor-made-tours">@lang('Private Tailor Made Tours')</option>
                                <option value="rent-a-car-with-a-driver">@lang('Rent a Car With a Driver')</option>
                                <option value="other-private-services">@lang('Other Private Services')</option>
                                <option value="other-transfer-options">@lang('Other Transfer Options')</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="icon-pencil"></i>@lang('Message')</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn_full" type="submit" >@lang('Submit')</button>
                    @csrf
                </form>
            </div>
            <!--/box_style_1 -->

        </aside>
    </div>
@endsection
