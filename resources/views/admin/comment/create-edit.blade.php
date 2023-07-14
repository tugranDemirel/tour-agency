@extends('admin.layouts.app')
@section('title', isset($comment) ? 'Yorum Düzenle' : 'Yorum Oluştur')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Araç Tipi <strong>{{ isset($comment) ? 'düzenleme' : 'oluşturma' }}</strong> formu
                </div>

                <form action="{{ isset($comment) ? route('admin.comment.update', ['comment' => $comment]) : route('admin.comment.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @isset($comment)
                        @method('PUT')
                    @endisset
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="name" class=" form-control-label">Yazar Adı</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" disabled value="{{ isset($comment) ? $comment->author_name : old('name') }}" placeholder="" class="form-control-plaintext">
                                @error('name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="name" class=" form-control-label">Yazar Maili</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" disabled value="{{ isset($comment) ? $comment->author_email : old('name') }}" placeholder="" class="form-control-plaintext">
                                @error('name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="name" class=" form-control-label">Yazar Mesajı</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="message" disabled class="form-control-plaintext" id="" cols="30" rows="10">{{ isset($comment) ? $comment->message : old('message') }}</textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Aktiflik Durumu</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox13" class="form-check-label ">
                                            <input type="checkbox" id="checkbox13"
                                                   {{ isset($comment) && $comment->is_active ? 'checked' : '' }}
                                                   name="is_active" class="form-check-input">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Anasayfa Da Gösterme Durumu</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox13" class="form-check-label ">
                                            <input type="checkbox" id="checkbox13"
                                                   {{ isset($comment) && $comment->is_approved ? 'checked' : '' }}
                                                   name="is_approved" class="form-check-input">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Kaydet
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Sıfırla
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
