@extends('layouts.app')
@section('title', 'Arama | '.$_setting->title ?? 'İstanbul Koş Koş Tur Transfer')
@section('meta')
    @isset($_seo)
        <meta name="description" content="{{ $_seo->description }}">
        <meta name="keywords" content="{{ $_seo->keywords }}">
    @endisset
@endsection
@section('content')
    <section id="hero_2" class="background-image" data-image-src="{{ asset('images/private-service.jpg') }}" data-natural-width="1400" data-natural-height="470"
             style="background:url({{ asset('images/private-service.jpg') }})  no-repeat center center;">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="intro_title">
                <h1>@lang('Your Tours')</h1>
                <div class="bs-wizard row">

                    <div class="col-4 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">@lang('Your Tours')</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-4 bs-wizard-step disabled">
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <table class="table table-striped cart-list add_bottom_30">
                            <thead>
                            <tr>
                                <th>
                                    @lang('Your Tour')
                                </th>
                                <th>
                                    @lang('Person Count')
                                </th>
                                <th>
                                    @lang('Child Seat')
                                </th>
                                <th>
                                    @lang('Total')
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ asset($appointment['car']->image) }}" alt="Image" width="60" height="60">
                                    </div>
                                    <span class="item_cart">
                                        {{ \App\Models\CityLocation::startPoint((int)$appointment['pickuplocation']) }}
                                        -
                                        {{ \App\Models\CityLocation::endPoint((int)$appointment['dropofflocation']) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $appointment['adults_2'] + $appointment['children_2']  }}
                                </td>
                                <td>
                                    @if(!empty($appointment['child_seat']))
                                        <strong>@lang('Yes')</strong>
                                    @else
                                        <strong>@lang('No')</strong>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $appointment['oneWayLocation']->price }} {{$_setting->currency ?? '$'}}</strong>
                                </td>
                            </tr>
                            @if(!empty($appointment['round_car_id']))
                                <tr>
                                    <td>
                                        <div class="thumb_cart">
                                            <img src="{{ asset($appointment['roundCar']->image) }}" alt="Image" width="60" height="60">
                                        </div>
                                        <span class="item_cart">
                                        {{ \App\Models\CityLocation::startPoint((int)$appointment['round_pickuplocation']) }}
                                        -
                                        {{ \App\Models\CityLocation::endPoint((int)$appointment['round_dropofflocation']) }}
                                    </span>
                                    </td>
                                    <td>
                                        {{ $appointment['round_adults_2'] + $appointment['round_children_2']  }}
                                    </td>
                                    <td>
                                        @if(!empty($appointment['round_child_seat']))
                                            <strong>@lang('Yes')</strong>
                                        @else
                                            <strong>@lang('No')</strong>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $appointment['roundLocation']->price }} {{$_setting->currency ?? '$'}}</strong>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End col -->

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
                            <tr class="total">
                                <td>
                                    @lang('Total cost')
                                </td>
                                <td class="text-end">
                                    @if(!empty($appointment['roundLocation']->price))
                                        @php $total =  $appointment['roundLocation']->price + $appointment['oneWayLocation']->price @endphp
                                        @if(!empty($appointment['round_child_seat']))
                                            @php $total = $total @endphp
                                        @elseif(!empty($appointment['child_seat']))
                                            @php $total = $total @endphp
                                        @endif
                                        {{ $total }}
                                    @else
                                       @php $total = $appointment['oneWayLocation']->price @endphp
                                            @if(!empty($appointment['child_seat']))
                                                @php $total = $total @endphp
                                            @endif
                                            {{ $total }} {{$_setting->currency ?? '$'}}
                                    @endif

                                </td>
                            </tr>
                            </tbody>
                        </table>
                            <a href="{{ route('front.appointment.payment') }}" class="btn_full mt-2"><i class="icon-credit-card"></i>Checkout</a>
                    </div>
                    <div class="box_style_4">
                        <i class="icon_set_1_icon-57"></i>
                        <h4><span>@lang('Need')</span> @lang('Help')?</h4>
                        <a href="tel:{{ $_setting->phone }}" class="phone">{{ $_setting->phone }}</a>
                        <small>@lang('24/7')</small>
                    </div>
                </aside>
                <!-- End aside -->

            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </main>
    <!-- End main -->
@endsection

@section('scripts')
{{--    <script>
        $(document).ready(function() {
            let value;
            $('#payment_method').change(function() {
                var selectedValue = $(this).val();
                value = (selectedValue); // Seçilen değeri konsola yazdırabilirsiniz
                // Diğer işlemleri burada gerçekleştirebilirsiniz
            });
            $('#payment').click(function () {
                if(value == 'undefined' || value == null){
                    value = 1;
                }
                $.ajax({
                    url: '{{ route('payment') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        payment_method: value,
                        appointment: '{{ $appointment['id'] }}'
                    },
                    success: function (response) {
                        if(response.status == 'success'){
                            window.location.href = response.url;
                        }
                    }
                });
            });
        });
    </script>--}}
@endsection
