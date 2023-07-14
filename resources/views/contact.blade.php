@extends('layouts.app')

@section('title', 'İletişim | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('meta')
    @isset($_seo)
        <meta name="description" content="{{ $_seo->meta_description }}">
        <meta name="keywords" content="{{ $_seo->meta_keywords }}">
    @endisset
@endsection

@section('content')

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset($_setting->contact_image) }}" data-natural-width="1400" data-natural-height="470"
   style="background:url({{ asset($_setting->contact_image) }})  no-repeat center center;
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
                <h1>@lang('Contact us')</h1>
                <p>@lang('Contact us text')</p>
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
                    <li>@lang('Contact')</li>
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
            <div class="row">
                <div class="col-md-8">
                    <div class="form_title">
                        <h3><strong><i class="icon-pencil"></i></strong>@lang('Fill the form below')</h3>
                        <p>
                            @lang('Fill the form below text')
                        </p>
                    </div>
                    <div class="step">

                        <div id="message-contact"></div>
                        <form method="post" action="{{ route('admin.contact.store') }}" id="">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('First Name')</label>
                                        <input type="text" class="form-control @error('message') is-invalid @enderror" id="name_contact" name="name" placeholder="@lang('First Name')">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('Last Name')</label>
                                        <input type="text" class="form-control @error('message') is-invalid @enderror" id="lastname_contact" name="surname" placeholder="@lang('Last Name')">
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('Email')</label>
                                        <input type="email" id="email_contact" name="email" class="form-control @error('message') is-invalid @enderror" placeholder="@lang('Email')">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('Phone')</label>
                                        <input type="text" id="phone_contact" name="phone" class="form-control @error('message') is-invalid @enderror" placeholder="@lang('Phone')">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('Message')</label>
                                        <textarea rows="5" id="message_contact" name="message" class="form-control @error('message') is-invalid @enderror" placeholder="@lang('Message')" style="height:200px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn_1">@lang('Submit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End col-md-8 -->

                <div class="col-md-4">
                    <div class="box_style_1">
                        <span class="tape"></span>
                        <h4>@lang('Address') <span><i class="icon-pin pull-right"></i></span></h4>
                        <p>
                            {{ $_setting->address }}
                        </p>
                        <hr>
                        <h4>@lang('Help center') <span><i class="icon-help pull-right"></i></span></h4>
                        <ul id="contact-info">
                            <li>{{ $_setting->phone }}</li>
                            <li><a href="mailto:{{ $_setting->email }}" target="_blank">{{ $_setting->email}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col-md-4 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
@endsection
