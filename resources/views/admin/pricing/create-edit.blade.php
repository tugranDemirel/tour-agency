@extends('admin.layouts.app')
@section('title', isset($pricing) ? 'Fiyatlandırma Düzenle' : 'Fiyatlandırma Oluştur')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Fiyatlandırma <strong>{{ isset($pricing) ? 'düzenleme' : 'oluşturma' }}</strong> formu
                </div>

                <form action="{{ isset($pricing) ? route('admin.pricing.update', ['pricing' => $pricing])  : route('admin.pricing.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @isset($pricing)
                        @method('PUT')
                    @endisset
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Başlangıç Noktası</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="city_location_id" id="select" class="form-control">
                                    <option >Başlangıç Noktası Seçiniz</option>
                                    @foreach($locaitons as $locaiton)
                                        <option value="{{ $locaiton->id }}" {{ isset($pricing) && $pricing->city_location_id == $locaiton->id ? 'selected' : '' }} >{{ $locaiton->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_location_id')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Variş Noktası</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="parent_city_location_id" id="select" class="form-control">
                                    <option >Varış Noktası Seçiniz</option>
                                    @foreach($locaitons as $locaiton)
                                        <option value="{{ $locaiton->id }}" {{ isset($pricing) && $pricing->parent_city_location_id == $locaiton->id ? 'selected' : '' }} >{{ $locaiton->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_city_location_id')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Araç</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="car_id" id="select" class="form-control">
                                    <option >Araç Seçiniz</option>
                                    @foreach($cars as $car)
                                        <option value="{{ $car->id }}" {{ isset($pricing) && $pricing->car_id == $car->id ? 'selected' : '' }} >{{ $car->name }}</option>
                                    @endforeach
                                </select>
                                @error('car_id')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="person_count" class=" form-control-label">Kişi Sayısı</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="person_count" name="person_count" value="{{ isset($pricing) ? $pricing->person_count : old('person_count') }}" placeholder="" class="form-control">
                                @error('person_count')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="price" class=" form-control-label">Fiyat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="price" name="price" value="{{ isset($pricing) ? $pricing->price : old('price') }}" placeholder="" class="form-control">
                                @error('price')
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
                                                   {{ isset($pricing) && $pricing->is_active ? 'checked' : '' }}
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
