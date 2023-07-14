@extends('admin.layouts.app')
@section('title', isset($carType) ? 'Araç Tipi Düzenle' : 'Araç Tipi Oluştur')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Araç Tipi <strong>{{ isset($carType) ? 'düzenleme' : 'oluşturma' }}</strong> formu
                </div>

                <form action="{{ isset($carType) ? route('admin.car-type.update', ['car_type' => $carType]) : route('admin.car-type.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @isset($carType)
                        @method('PUT')
                    @endisset
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="name" class=" form-control-label">Araç Tipi</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" value="{{ isset($carType) ? $carType->name : old('name') }}" placeholder="" class="form-control">
                                @error('name')
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
                                                   {{ isset($carType) && $carType->status ? 'checked' : '' }}
                                                   name="status" class="form-check-input">
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
