@extends('layouts.app')
@section('title', 'Payment')
@section('content')
    <section id="hero_2" class="background-image" data-image-src="{{ asset('images/private-service.jpg') }}" data-natural-width="1400" data-natural-height="470"
             style="background:url({{ asset('images/private-service.jpg') }})  no-repeat center center;">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="intro_title">
                <h1>@lang('Your Tours')</h1>
                <div class="bs-wizard row">

                    <div class="col-4 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">@lang('Your Tours')</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-4 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">@lang('Details')</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-4 bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">@lang('Finish')!</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                </div>
                <!-- End bs-wizard -->
            </div>
            <!-- End intro-title -->
        </div>
        <!-- End opacity-mask-->
    </section>
    <!-- End Section hero_2 -->

    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="#">@lang('Home')</a>
                    </li>
                    <li>@lang('Details')</li>
                </ul>
            </div>
        </div>
        <!-- End position -->

        <div class="container margin_60">
            <form method="post" action="{{ route('front.appointment.store') }}">
                @csrf
            <div class="row">
                <div class="col-lg-8 add_bottom_15">
                    <div class="form_title">
                        <h3><strong>1</strong>@lang('Details')</h3>

                    </div>
                    <div class="step">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>@lang('First name')</label>
                                    <input type="text" class="form-control" id="firstname_booking" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>@lang('Last name')</label>
                                    <input type="text" class="form-control" id="lastname_booking" name="surname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>@lang('Email')</label>
                                    <input type="email" id="email_booking" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>@lang('Phone')</label>
                                    <input type="text" id="telephone_booking" name="phone" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End step -->

                    <div class="form_title">
                        <h3><strong>2</strong>@lang('Address')</h3>
                        <p>
                           @lang('Enter the address information completely').
                        </p>
                    </div>
                    <div class="step">
                        <div class="form-group">
                            <label>@lang('Address') 1</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>@lang('Address') 2</label>
                                    <input type="text" id="card_number" name="address_2" class="form-control  @error('address_2') is-invalid @enderror">
                                </div>
                            </div>
                        </div>
                        <!--End row -->
                        <div class="form-group">
                            <label>@lang('City')(@lang('optional'))</label>
                            <input type="text" class="form-control  @error('city') is-invalid @enderror" id="address" name="city">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>@lang('FLIGHT NUMBER (IF IT IS NOT AN AIRPORT TRANSFER, YOU CAN SKIP BY TYPING 123.)')*</label>
                                    <input type="text" id="card_number" name="flight_number" class="form-control  @error('flight_number') is-invalid @enderror">
                                </div>
                            </div>
                        </div>
                        <!--End row -->
                        <!--End row -->
                        <div class="form-group">
                            <label>@lang('Hotel Name')(@lang('optional'))</label>
                            <input type="text" class="form-control  @error('hotel_name') is-invalid @enderror" id="address" name="hotel_name">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>@lang("PASSENGERS' NAMES (TO BE USED FOR INSURANCE)") (@lang('optional'))</label>
                                    <input type="text" id="card_number" name="passenger_name" class="form-control  @error('passenger_name') is-invalid @enderror">
                                </div>
                            </div>
                        </div>
                        <!--End row -->
                        <!--End row -->
                        <div class="form-group">
                            <label>@lang('TRANSFER NOTE') (@lang('optional'))
                            </label>
                            <input type="text" class="form-control  @error('transfer_note') is-invalid @enderror" id="transfer_note" name="transfer_note">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>@lang('ORDER NOTES') (@lang('optional'))</label>
                                    <input type="text" id="card_number" name="order_note" class="form-control  @error('order_note') is-invalid @enderror">
                                </div>
                            </div>
                        </div>
                        <!--End row -->
                    </div>
                    <!--End step -->
                </div>

                <aside class="col-lg-4">
                    <div class="box_style_1">
                        <h3 class="inner">- @lang('Summary') -</h3>
                        <table class="table table_summary">
                            <tbody>
                            <tr>
                                <td>
                                    @lang('One Way Date')
                                </td>
                                <td class="text-end">
                                    @if(!empty( $appointment['start_date']))
                                        @php
                                            $datetime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i',  $appointment['start_date']);

                                            // İstediğiniz formatta çıktı alın
                                            $formattedDatetime = $datetime->format('Y-m-d H:i');
                                        @endphp
                                        {{  $formattedDatetime}}
                                    @endif
                                </td>
                            </tr>
                            @if(!empty($appointment['round_start_date']))
                                <tr>
                                    <td>
                                        @lang('Round Date')
                                    </td>
                                    <td class="text-end">
                                        @if(!empty( $appointment['round_start_date']))
                                            @php
                                                $datetime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i',  $appointment['round_start_date']);

                                                // İstediğiniz formatta çıktı alın
                                                $formattedDatetime = $datetime->format('Y-m-d H:i');
                                            @endphp
                                            {{  $formattedDatetime}}
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td>
                                    @lang('Adults')
                                </td>
                                <td class="text-end">
                                    @if(!empty( $appointment['round_adults_2']))
                                        {{  $appointment['round_adults_2'] +  $appointment['adults_2']}}
                                    @else
                                        {{  $appointment['adults_2'] }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @lang('Children')
                                </td>
                                <td class="text-end">
                                    @if(!empty( $appointment['round_children_2']))
                                        {{  $appointment['round_children_2'] +  $appointment['children_2']}}
                                    @else
                                        {{  $appointment['children_2'] }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @lang('Child Seat')
                                </td>
                                <td class="text-end">
                                    @if(!empty($appointment['round_child_seat']) && !empty($appointment['child_seat']))
                                        @php $total = 10 @endphp
                                    @elseif(!empty($appointment['child_seat']))
                                        @php $total = 5 @endphp
                                    @elseif(!empty($appointment['round_child_seat']))
                                       @php $total = 5 @endphp
                                    @else
                                        @php $total = 0 @endphp
                                    @endif
                                    {{ $total }}
                                </td>
                            </tr>
                            <tr class="total">
                                <td>
                                    @lang('Total cost')
                                </td>
                                <td class="text-end">
                                    @if(!empty($appointment['roundLocation']->price))
                                        @php $total =  $appointment['roundLocation']->price + $appointment['oneWayLocation']->price @endphp
                                        @if(!empty($appointment['round_child_seat']))
                                            @php $total = $total + 10 @endphp
                                        @elseif(!empty($appointment['child_seat']))
                                            @php $total = $total + 5 @endphp
                                        @endif
                                        {{ $total }}
                                    @else
                                        @php $total = $appointment['oneWayLocation']->price @endphp
                                        @if(!empty($appointment['child_seat']))
                                            @php $total = $total + 5 @endphp
                                        @endif
                                        {{ $total }} {{$_setting->currency ?? '€'}}
                                    @endif

                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <select name="payment_method" class="form-select" id="payment_method">
                            <option selected value="1">
                                @lang('CASH PAYMENT AFTER TRANSFER')
                            </option >
                           {{-- <option value="2">@lang('ONLINE DEBIT AND CREDIT CARD')</option>--}}
                        </select>
                        <button type="submit" class="btn_full mt-2"><i class="icon-credit-card"></i>@lang('Checkout')</button>
                    </div>
                    <div class="box_style_4">
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
            </div>
            </form>
            <!--End row -->
        </div>
        <!--End container -->
    </main>
    <!-- End main -->
@endsection
