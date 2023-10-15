@extends('layouts.app')
@section('title', 'Arama | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('styles')
    <style>
        .selectedAppointment{
            background:  #e04f67 !important;
        }
    </style>
@endsection
@section('filter')
    @include('layouts.filter')
@endsection
@section('content')

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">@lang('Home')</a>
                </li>
                <li>@lang('Search')</li>
            </ul>
        </div>
    </div>
    <!-- Position -->

    <div class="container margin_60">

        <form action="{{ route('front.appointment.create') }}" method="get" >
            <div class="row">
                <aside class="col-lg-3">
                    <div class="box_style_2 d-none d-sm-block">
                        <i class="icon_set_1_icon-57"></i>
                        <h4><span>@lang('Need')</span> @lang('Help')?</h4>
                        @php
                            $phones = explode(',', $_setting->phone);
                        @endphp
                        @foreach($phones as $phone)
                            <a href="https://wa.me/{{ $phone }}" class="phone">{{ $phone }}</a>
                        @endforeach
                        <small>@lang('24/7')</small>
                    </div>
                </aside>
                <!--End aside -->

                    @if(!empty($cars))
                        @if(count($cars) > 0)
                            <div class="col-lg-9">
                                <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">

                                        <div class="row justify-content-center" style="text-align: center;">
                                            <div class="col-lg-6 col-md-6 mt-2">
                                                <h3><strong>@lang('One Way')</strong></h3>
                                                <p>@lang('Please Choose')</p>
                                            </div>

                                        </div>
                                </div>

                                @php $i = 1 @endphp
                                @foreach($cars as $car)
                                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.{{$i++}}s">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 position-relative">

                                                <div class="img_list">
                                                    <a href="{{ route('front.single_tour', ['cityLocationCarPrice' => $car]) }}">
                                                        <img src="{{ asset($car->car->image) }}" alt="Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="tour_list_desc">
                                                    <h3><strong>{{ $car->car->name }}</strong></h3>
                                                    <p>
                                                    @php
                                                        $text= $car->car->description;
                                                        if (strlen($car->car->description) > 100)
                                                        {
                                                            $text = substr($text, 0, 100);
                                                            $text = substr($text, 0, strrpos($text, ' '));
                                                            $text = $text . '...';
                                                            echo $text;
                                                        }
                                                        else
                                                            echo $text;
                                                    @endphp
                                                    </p>

                                                    <input type="hidden" name="pickuplocation" value="{{ $data['pickuplocation'] }}">
                                                    <input type="hidden" name="dropofflocation" value="{{ $data['dropofflocation'] }}">
                                                    <input type="hidden" name="start_date" value="{{ $data['start_date'] }}">
                                                    <input type="hidden" name="adults_2" value="{{ $data['adults_2'] }}">
                                                    <input type="hidden" name="children_2" value="{{ $data['children_2'] }}">
                                                    <input type="hidden" name="car_id" value="{{ $car->car->id }}">
                                                    <input type="hidden" name="start_date" value="{{ isset($data['start_date']) ?  $data['start_date'] : '' }}">


                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="price_list">
                                                    <div><sup>{{ $_setting->currency }}</sup>{{ (isset($childSeat) && $childSeat === true) ? $car->price + 5 : $car->price  }} {{$_setting->currency ?? '€'}}<span class="normal_price_list"></span><small>*{{ $car->person_count }} Total number of people</small>
                                                        <p>
                                                            <label for="">
                                                                <input type="radio" id="oneWay"  class="btn_1" name="one_way_location" class="@error('one_way_location') is-invalid @enderror " value="{{ $car->id }}">
                                                                SELECT
                                                            </label>
                                                            @if(isset($childSeat) && $childSeat === true)
                                                                <input type="hidden" name="child_seat" value="1">
                                                            @endif

                                                        <p class="mt-2">
                                                            <a href="{{ route('front.single_tour', ['cityLocationCarPrice' => $car]) }}" class="btn_1">Details</a>
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!--End strip -->
                            </div>
                            <hr>
                        @else
                            <div class="col-md-9">
                                <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
                                    <div class="row justify-content-center" style="text-align: center;">

                                        <div class="col-lg-6 col-md-6 mt-2">
                                            <div class="">
                                                <h3><strong>@lang('No vehicles were found matching your search criteria').</strong></h3>
                                                <p>@lang('No vehicles were found matching your search criteria. Please try again by changing your criteria.')</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        @endif
                    @endif
                    <!-- End col lg-9 -->
                    @if(!empty($rounds))
                        @if($rounds->count() > 0)
                            <div class="col-lg-3"></div>
                            <div class="col-lg-9">
                                <!--/tools -->

                                <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">

                                        <div class="row justify-content-center" style="text-align: center;">
                                            <div class="col-lg-6 col-md-6 mt-2">
                                                <h3><strong>@lang('Round')</strong></h3>
                                                <p>@lang('Please Choose')</p>
                                            </div>

                                        </div>

                                </div>

                                @php $i = 1 @endphp
                                @foreach($rounds as $round)
                                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.{{$i++}}s">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 position-relative">

                                                <div class="img_list">
                                                    <a href="{{ route('front.single_tour', ['cityLocationCarPrice' => $round]) }}">
                                                        <img src="{{ asset($round->car->image) }}" alt="Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="tour_list_desc">
                                                    <h3><strong>{{ $round->car->name }}</strong></h3>
                                                    <p>
                                                        @php
                                                            $text= $round->car->description;
                                                            if (strlen($round->car->description) > 100)
                                                            {
                                                                $text = substr($text, 0, 100);
                                                                $text = substr($text, 0, strrpos($text, ' '));
                                                                $text = $text . '...';
                                                                echo $text;
                                                            }
                                                            else
                                                                echo $text;
                                                        @endphp
                                                    </p>
                                                    <input type="hidden" name="round_pickuplocation" value="{{ $data['round_pickuplocation'] }}">
                                                    <input type="hidden" name="round_dropofflocation" value="{{ $data['round_dropofflocation'] }}">
                                                    <input type="hidden" name="round_start_date" value="{{ $data['round_start_date'] }}">
                                                    <input type="hidden" name="round_adults_2" value="{{ $data['round_adults_2'] }}">
                                                    <input type="hidden" name="round_children_2" value="{{ $data['round_children_2'] }}">
                                                    <input type="hidden" name="round_car_id" value="{{ $round->car->id }}">
                                                    <input type="hidden" name="round_start_date" value="{{ isset($data['round_start_date']) ?  $data['round_start_date'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="price_list">
                                                    <div><sup>{{ $_setting->currency }}</sup>{{ (isset($round_childSeat) && $round_childSeat === true) ? $car->price + 5 : $round->price  }} {{$_setting->currency ?? '€'}}<span class="normal_price_list"></span><small>*{{ $round->person_count }} Total number of people</small>
                                                        <p>
                                                            <label for="">
                                                                <input type="radio" id="rounded" class="btn_1" name="round_location" value="{{ $round->id }}">
                                                                SELECT
                                                            </label>
                                                            @if(isset($round_childSeat) && $round_childSeat === true)
                                                                <input type="hidden" name="round_child_seat" value="1">
                                                            @endif

                                                        </p>
                                                        <p class="mt-2">
                                                            <a href="{{ route('front.single_tour', ['cityLocationCarPrice' => $round]) }}" class="btn_1">@lang('Details')</a>
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!--End strip -->
                            </div>
                        @else
                            <div class="col-lg-3"></div>
                            <div class="col-md-9">
                                <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="">
                                                <h3><strong>@lang('No vehicles were found matching your search criteria').</strong></h3>
                                                <p>@lang('No vehicles were found matching your search criteria. Please try again by changing your criteria.')</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endif
                        <div class="col-lg-3"></div>
                        <div class="col-lg-9">
                            <button type="submit" id="createAppointment" class="btn_1">@lang('Continue')</button>
                        </div>

                <!-- End col lg-9 -->
            </div>
        </form>
        <!-- End row -->
    </div>
@endsection
