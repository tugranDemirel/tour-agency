@extends('admin.layouts.app')
@section('title', 'Hizmetler')
@section('content')
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Hizmetler</h2>
                <a href="{{ route('admin.service.create') }}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Yeni Hizmet</a>
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
                        <th>Başlık</th>
                        <th>Aktiflik Durumu</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($services)
                        @foreach($services as $service)
                            <tr>
                                <td>#{{ $service->id }}</td>
                                <td class="denied">
                                    <img src="{{ asset($service->banner_image) }}" alt="" width="80">
                                </td>
                                <td>{{ $service->title }}</td>
                                <td>
                                    @if($service->is_active)
                                        <span class="status--process">Aktif</span>
                                    @else
                                        <span class="status--denied">Pasif</span>
                                    @endif

                                </td>
                                <td>{{ $service->updated_at->format('m/d/Y H:m') }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ route('admin.service.edit', ['service' => $service]) }}" class="au-btn-icon mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Düzenle">
                                            <i class="zmdi zmdi-edit" style="color: deepskyblue"></i>
                                        </a>
                                        <button  class="au-btn-icon remove" data-id="{{ $service->id }}" data-toggle="tooltip" data-placement="top" title="Sil" data-original-title="Sil">
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
                    let url = '{{ route('admin.service.destroy', ['service' => 'id']) }}'.replace('id', id);
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
