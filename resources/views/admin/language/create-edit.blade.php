@extends('admin.layouts.app')
@section('title', isset($language) ? 'Lokasyon Düzenle' : 'Lokasyon Oluştur')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lokasyon <strong>{{ isset($language) ? 'düzenleme' : 'oluşturma' }}</strong> formu
                </div>

                <form action="{{ isset($language) ? route('admin.language.update', ['language' => $language]) : route('admin.language.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @isset($language)
                        @method('PUT')
                    @endisset
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="name" class=" form-control-label">Dil Adı</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" value="{{ isset($language) ? $language->name : old('name') }}" placeholder="" class="form-control">
                                @error('name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="locale" class=" form-control-label">Dil Kodu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="locale" name="locale" value="{{ isset($language) ? $language->locale : old('locale') }}" placeholder="" class="form-control">
                                @error('locale')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
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
                                                   {{ isset($language) && $language->is_active ? 'checked' : '' }}
                                                   name="is_active" class="form-check-input">
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
