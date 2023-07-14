@extends('admin.layouts.app')
@section('title', isset($location) ? 'Lokasyon Düzenle' : 'Lokasyon Oluştur')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lokasyon <strong>{{ isset($location) ? 'düzenleme' : 'oluşturma' }}</strong> formu
                </div>

                <form action="{{ isset($location) ? route('admin.location.update', ['location' => $location]) : route('admin.location.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @isset($location)
                        @method('PUT')
                    @endisset
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Şehir</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city_id" id="select" class="form-control">
                                <option >Şehir Seçiniz</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ isset($location) && $location->city_id == $city->id ? 'selected' : '' }} >{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="name" class=" form-control-label">Lokasyon Adı</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" value="{{ isset($location) ? $location->name : old('name') }}" placeholder="" class="form-control">
                                @error('name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Havaalanı Durumu</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="checkbox1"
                                                   {{ isset($location) && $location->is_airport ? 'checked' : '' }}
                                                   name="is_airport" class="form-check-input">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Popülerlik Durumu</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox12" class="form-check-label ">
                                            <input type="checkbox" id="checkbox12"
                                                   {{ isset($location) && $location->is_popular ? 'checked' : '' }}
                                                   name="is_popular" class="form-check-input">
                                        </label>
                                    </div>
                                </div>
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
                                                   {{ isset($location) && $location->is_active ? 'checked' : '' }}
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
