@extends('layouts.app')
@section('title', 'Sıkça Sorulan Sorular | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('meta')
    @isset($_seo)
        <meta name="description" content="{{ $_seo->meta_description }}">
        <meta name="keywords" content="{{ $_seo->meta_keywords }}">
    @endisset
@endsection
@section('content')

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/faq.jpg') }}" data-natural-width="1400" data-natural-height="470"
             style="background:url({{ asset('images/faq.jpg') }})  no-repeat center center;
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
                <h1>@lang('FAQ')</h1>
                <p>@lang('FAQ text')</p>
            </div>
        </div>
    </section>
    <!-- End section -->

    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="#">@lang('Home')</a>
                    </li>
                    <li>@lang('FAQ')</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">
            <div class="row">
                <aside class="col-lg-3" id="sidebar">
                    <div class="theiaStickySidebar">
                        <div class="box_style_cat" id="faq_box">
                            <ul id="cat_nav">
                                @foreach($faqs as $faq)
                                <li><a href="#payment{{$faq->id}}" class="@if($loop->first)active @endif"><i class="icon_set_1_icon-95"></i>{{ $faq->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--End sticky -->
                </aside>
                <!--End aside -->
                <div class="col-lg-9" id="faq">
                    @foreach($faqs as $faq)
                    <h3 class="nomargin_top">{{ $faq->title }}</h3>
                    <div id="payment{{ $faq->id }}" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#payment{{ $faq->id }}" href="#collapseOne_payment{{ $faq->id }}">{{ $faq->question }}<i style="color:#e04f67" class=" icon-minus float-end"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_payment{{ $faq->id }}" class="collapse @if($loop->first)show @endif" data-bs-parent="#payment{{ $faq->id }}">
                                <div class="card-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--End privacy -->
                </div>
                <!-- End col lg-9 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
@endsection
