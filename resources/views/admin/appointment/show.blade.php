@extends('admin.layouts.app')
@section('title', 'Randevu Detayları')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3><strong>1 </strong>Detaylar</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ad-Soyad</label>
                                <input disabled type="text" class="form-control form-control-plaintext"
                                       id="lastname_booking" value="{{ $appointment->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input disabled type="email" id="email_booking" value="{{ $appointment->email }}"
                                       class="form-control form-control-plaintext">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Telefon</label>
                                <input disabled type="text" id="telephone_booking" value="{{ $appointment->phone }}"
                                       class="form-control form-control-plaintext">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Transfer Bilgileri</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Tek Yön
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Araba Adı</label>
                                                <input disabled type="text" class="form-control form-control-plaintext"
                                                       id="lastname_booking"
                                                       value="{{ \App\Models\Car::getCarName($appointment->car_id) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Başlangıç Noktası</label>
                                                <input disabled type="text" class="form-control form-control-plaintext"
                                                       id="lastname_booking"
                                                       value="{{ \App\Models\CityLocationCarPrice::getSartPoint($appointment->city_location_car_price_id) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Varış Noktası</label>
                                                <input disabled type="text" class="form-control form-control-plaintext"
                                                       id="lastname_booking"
                                                       value="{{ \App\Models\CityLocationCarPrice::getSartPoint($appointment->city_location_car_price_id, true) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Başlangıç Tarihi</label>
                                                @php
                                                    $dateString =$appointment->start_date;
                                                       $dateTime = new DateTime($dateString);
                                                       $formattedDateTime = $dateTime->format('d.m.Y H:i');

                                                @endphp
                                                <input disabled type="text" class="form-control form-control-plaintext"
                                                       id="lastname_booking" value="{{ $formattedDateTime }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Yetişkin Sayısı</label>
                                                <input disabled type="text" class="form-control form-control-plaintext"
                                                       id="lastname_booking" value="{{ $appointment->adults_2 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Çocuk Sayısı Sayısı</label>
                                                <input disabled type="text" class="form-control form-control-plaintext"
                                                       id="lastname_booking" value="{{ $appointment->children_2 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Çocuk Koltuğu</label>
                                                <input type="checkbox" class="form-control form-control-plaintext"
                                                       id="lastname_booking" {{ $appointment->child_seat == 1 ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tek Yön Fiyat</label>
                                                <input disabled type="text" class="form-control form-control-plaintext"
                                                       id="lastname_booking" value="{{ $appointment->price }} €">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!is_null($appointment->round_start_date))
                            @php
                                $dateString =$appointment->round_start_date;
                                   $dateTime = new DateTime($dateString);
                                   $formattedDateTime = $dateTime->format('d.m.Y H:i');

                            @endphp
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Dönüş
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Araba Adı</label>
                                                    <input disabled type="text"
                                                           class="form-control form-control-plaintext"
                                                           id="lastname_booking"
                                                           value="{{ \App\Models\Car::getCarName($appointment->car_id) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Başlangıç Noktası</label>
                                                    <input disabled type="text"
                                                           class="form-control form-control-plaintext"
                                                           id="lastname_booking"
                                                           value="{{ \App\Models\CityLocationCarPrice::getSartPoint($appointment->city_location_car_price_id) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Varış Noktası</label>
                                                    <input disabled type="text"
                                                           class="form-control form-control-plaintext"
                                                           id="lastname_booking"
                                                           value="{{ \App\Models\CityLocationCarPrice::getSartPoint($appointment->city_location_car_price_id, true) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Başlangıç Tarihi</label>
                                                    @php
                                                        $dateString =$appointment->round_start_date;
                                                           $dateTime = new DateTime($dateString);
                                                           $formattedDateTime = $dateTime->format('d.m.Y H:i');

                                                    @endphp
                                                    <input disabled type="text"
                                                           class="form-control form-control-plaintext"
                                                           id="lastname_booking" value="{{ $formattedDateTime }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Yetişkin Sayısı</label>
                                                    <input disabled type="text"
                                                           class="form-control form-control-plaintext"
                                                           id="lastname_booking"
                                                           value="{{ $appointment->round_adults_2 }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Çocuk Sayısı Sayısı</label>
                                                    <input disabled type="text"
                                                           class="form-control form-control-plaintext"
                                                           id="lastname_booking"
                                                           value="{{ $appointment->round_children_2 }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Çocuk Koltuğu</label>
                                                    <input type="checkbox" class="form-control form-control-plaintext"
                                                           id="lastname_booking" {{ $appointment->round_child_seat == 1 ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tek Yön Fiyat</label>
                                                    <input disabled type="text"
                                                           class="form-control form-control-plaintext"
                                                           id="lastname_booking"
                                                           value="{{ $appointment->return_price }} €">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Fiyat Bilgilendirmesi
                                </div>
                                <div class="card-body">
                                    <table class="table table_summary">
                                        <tbody>
                                        <tr class="">
                                            <td>
                                                Ödeme Yöntemi
                                            </td>
                                            <td class="text-end">
                                                @if($appointment->payment_method == 1)
                                                    Nakit
                                                @else
                                                    Kredi Kartı
                                                @endif

                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td>
                                                Toplam Fiyat
                                            </td>
                                            <td class="text-end">
                                                {{ $appointment->total_price }} €

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--End step -->
                </div>
                <!--End step -->
            </div>

            <div class="card">
                <div class="card-header">
                    <h3><strong>2 </strong>Adres</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adres 1</label>
                                <input disabled type="text" class="form-control form-control-plaintext"
                                       value="{{ $appointment->address }}" id="address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adres 2</label>
                                <input disabled type="text" id="card_number" value="{{ $appointment->address_2 }}"
                                       class="form-control form-control-plaintext  ">
                            </div>
                        </div>
                    </div>
                    <!--End row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Şehir</label>
                                <input disabled type="text" class="form-control form-control-plaintext  "
                                       value="{{ $appointment->city }}" id="address" name="city">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Uçak Numarası</label>
                                    <input disabled type="text" id="card_number" name="flight_number"
                                           value="{{ $appointment->flight_number }}"
                                           class="form-control form-control-plaintext  ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--End row -->
                    <!--End row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Otel Adı</label>
                                <input disabled type="text" class="form-control form-control-plaintext  "
                                       value="{{ $appointment->hotel_name }}" id="address" name="hotel_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Yanındaki Yolcu İsimleri</label>
                                    <input disabled type="text" id="card_number"
                                           value="{{ $appointment->passenger_name }}" name="passenger_name"
                                           class="form-control form-control-plaintext  ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Transfer Notu
                                </label>
                                <input disabled type="text" class="form-control form-control-plaintext  "
                                       value="{{ $appointment->transfer_note }}" id="transfer_note"
                                       name="transfer_note">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>İstek Notu</label>
                                    <input disabled type="text" id="card_number" name="order_note"
                                           value="{{ $appointment->order_note }}"
                                           class="form-control form-control-plaintext  ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End row -->
                    <!--End row -->


                    <!--End step -->
                </div>
                <!--End step -->
            </div>
        </div>
    </div>

@endsection
