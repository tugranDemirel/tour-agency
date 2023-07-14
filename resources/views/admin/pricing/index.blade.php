
@extends('admin.layouts.app')
@section('title', 'Fiyatlandırma')
@section('content')
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Fiyatlandırma</h2>
                <a href="{{ route('admin.pricing.create') }}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Yeni Fiyat Ekle </a>
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
                        <th>Resim</th>
                        <th>Başlangıç Noktası</th>
                        <th>Varış Noktası</th>
                        <th>Araç Model Adı</th>
                        <th>Araç Tipi Adı</th>
                        <th>Kişi Sayısı</th>
                        <th>Fiyat</th>
                        <th>Aktiflik Durumu</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($pricings)
                        @foreach($pricings as $pricing)
                            <tr>
                                <td>#{{ $pricing->id }}</td>
                                <td>
                                    <img src="{{asset( $pricing->car->image) }}" alt="{{ $pricing->name }}" style="width: 100px; height: 100px">
                                </td>
                                <td>{{ \App\Models\CityLocation::startPoint($pricing->city_location_id) }}</td>
                                <td>{{ \App\Models\CityLocation::startPoint($pricing->parent_city_location_id) }}</td>
                                <td>{{ $pricing->car->carModel->name }}</td>
                                <td>{{ $pricing->car->carModel->carType->name }}</td>
                                <td>{{ $pricing->person_count }}</td>
                                <td>
                                    <span class="status--process">{{ $pricing->price }} $</span>
                                </td>
                                <td>
                                    @if($pricing->is_active)
                                        <span class="status--process">Aktif</span>
                                    @else
                                        <span class="status--denied">Pasif</span>
                                    @endif
                                </td>
                                <td>{{ $pricing->updated_at->format('m/d/Y H:m') }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ route('admin.pricing.edit', ['pricing' => $pricing]) }}" class="au-btn-icon mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Düzenle">
                                            <i class="zmdi zmdi-edit" style="color: deepskyblue"></i>
                                        </a>
                                        <button  class="au-btn-icon remove" data-id="{{ $pricing->id }}" data-toggle="tooltip" data-placement="top" title="Sil" data-original-title="Sil">
                                            <i class="zmdi zmdi-delete" style="color: red"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">Kayıt bulunamadı.</td>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            let remove = document.querySelectorAll('.remove');
            for (let i = 0; i < remove.length; i++){
                remove[i].addEventListener('click', function () {
                    let id = remove[i].attributes['data-id'].value;
                    let url = '{{ route('admin.pricing.destroy', ['pricing' => 'id']) }}'.replace('id', id);
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function (data) {
                            window.location.reload();
                        },
                        error: function (data) {
                            window.location.reload();
                        }
                    })
                })
            }
        })
    </script>
@endsection
