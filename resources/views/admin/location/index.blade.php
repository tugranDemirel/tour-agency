@extends('admin.layouts.app')
@section('title', 'Lokasyon')
@section('styles')


@endsection
@section('content')
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Lokasyonlar</h2>
                <a href="{{ route('admin.location.create') }}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Yeni Lokasyon</a>
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
                        <th>#</th>
                        <th>ID</th>
                        <th>SIRA</th>
                        <th>Şehir</th>
                        <th>Lokasyon</th>
                        <th>Aktiflik Durumu</th>
                        <th>Popülerlik Durumu</th>
                        <th>Havalanı Durumu</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody class="sirali">
                    @if($locations)
                        @foreach($locations as $location)
                            <tr id="order_{{ $location->id }}">
                                <td>
                                    <i class="fa fa-arrows-alt-v handle"></i>
                                </td>
                                <td>#{{ $location->id }}</td>
                                <td>{{ $location->order + 1}}</td>
                                <td class="denied">{{ $location->city->name }}</td>
                                <td>{{ $location->name }}</td>
                                <td>
                                    @if($location->is_active)
                                        <span class="status--process">Aktif</span>
                                    @else
                                        <span class="status--denied">Pasif</span>
                                    @endif

                                </td>
                                <td>
                                    @if($location->is_popular)
                                        <span class="status--process">Aktif</span>
                                    @else
                                        <span class="status--denied">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    @if($location->is_airport)
                                        <span class="status--process">Aktif</span>
                                    @else
                                        <span class="status--denied">Pasif</span>
                                    @endif
                                </td>
                                <td>{{ $location->updated_at->format('m/d/Y H:m') }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ route('admin.location.edit', ['location' => $location]) }}" class="au-btn-icon mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Düzenle">
                                            <i class="zmdi zmdi-edit" style="color: deepskyblue"></i>
                                        </a>
                                        <button  class="au-btn-icon remove" data-id="{{ $location->id }}" data-toggle="tooltip" data-placement="top" title="Sil" data-original-title="Sil">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            let remove = document.querySelectorAll('.remove');
            for (let i = 0; i < remove.length; i++){
                remove[i].addEventListener('click', function () {
                    let id = remove[i].attributes['data-id'].value;
                    let url = '{{ route('admin.location.destroy', ['location' => 'id']) }}'.replace('id', id);
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
    <script>
        $( function() {
            $( ".sirali" ).sortable({
                handle: '.handle',
                update: function (event, ui) {
                    let order = $(this).sortable('serialize');
                    console.log(order)
                    $.ajax({
                        url: '{{ route('admin.order_location') }}?'+order,
                        type: 'GET',
                        success: function (data) {
                            console.log(data)
                        },
                        error: function (data) {
                            console.log(data)
                        }
                    })
                }
            });
            // $( ".sirali" ).disableSelection();
        } );
    </script>
@endsection
