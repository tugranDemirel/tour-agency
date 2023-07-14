@extends('admin.layouts.app')
@section('title', 'Randevular')
@section('content')
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Randevular</h2>

            </div>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>ID</th>

                        <th>Müşteri Ad-Soyad</th>
                        <th>Müşteri Email</th>
                        <th>Müşteri Telefon</th>
                        <th>Yön</th>
                        <th>Toplam Fiyat</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($appointments)
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>#{{ $appointment->id }}</td>

                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>
                                    @if(is_null($appointment->round_start_date))
                                        Gidiş
                                    @else
                                        Gidiş-Dönüş
                                    @endif
                                </td>
                                <td>{{ $appointment->total_price }} €</td>

                                <td>{{ $appointment->created_at }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ route('admin.appointment.show', ['appointment' => $appointment]) }}" class="au-btn-icon mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Düzenle">
                                            <i class="zmdi zmdi-eye" style="color: deepskyblue"></i>
                                        </a>
                                       {{-- <button  class="au-btn-icon remove" data-id="{{ $appointment->id }}" data-toggle="tooltip" data-placement="top" title="Sil" data-original-title="Sil">
                                            <i class="zmdi zmdi-delete" style="color: red"></i>
                                        </button>--}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">Kayıt bulunamadı.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
