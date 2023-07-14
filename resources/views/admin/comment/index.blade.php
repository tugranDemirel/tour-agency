@extends('admin.layouts.app')
@section('title', 'Yorumlar')
@section('content')
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Yorumlar</h2>
                <a href="{{ route('admin.car-type.create') }}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i></a>
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
                        <th>Yazar Adı</th>
                        <th>Yazar Maili</th>
                        <th>Aktiflik Durumu</th>
                        <th>Anasayfada GÖsterme Durumu</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($comments)
                        @foreach($comments as $comment)
                            <tr>
                                <td>#{{ $comment->id }}</td>
                                <td>{{ $comment->author_name }}</td>
                                <td>{{ $comment->author_email }}</td>
                                <td>
                                    @if($comment->is_active)
                                        <span class="status--process">Aktif</span>
                                    @else
                                        <span class="status--denied">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    @if($comment->is_approved)
                                        <span class="status--process">Aktif</span>
                                    @else
                                        <span class="status--denied">Pasif</span>
                                    @endif
                                </td>
                                <td>{{ $comment->updated_at->format('m/d/Y H:m') }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ route('admin.comment.edit', ['comment' => $comment]) }}" class="au-btn-icon mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Düzenle">
                                            <i class="zmdi zmdi-edit" style="color: deepskyblue"></i>
                                        </a>
                                        <button  class="au-btn-icon remove" data-id="{{ $comment->id }}" data-toggle="tooltip" data-placement="top" title="Sil" data-original-title="Sil">
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
                    let url = '{{ route('admin.comment.destroy', ['comment' => 'id']) }}'.replace('id', id);
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
