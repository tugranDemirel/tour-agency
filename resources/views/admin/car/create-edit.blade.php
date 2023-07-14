@extends('admin.layouts.app')
@section('title', isset($car) ? 'Araç Düzenle' : 'Araç Oluştur')
@section('styles')
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>

@endsection
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        Araç <strong>{{ isset($car) ? 'düzenleme' : 'oluşturma' }}</strong> formu
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted m-b-15">Araç <strong>{{ isset($car) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi buradan yapabilirsiniz.Araç <strong>{{ isset($car) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi yaparken lütfen dil içeriklerinin hepsini doldurmaya özen gösteriniz.</p>
                    <p><b>İçerikler doldurulmadığı taktirde</b> dil değiştirildiğinde doldurulmayan içerik boş gelecektir.</p>
                    <br>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="genel-tab" data-toggle="tab" href="#genel" role="tab" aria-controls="genel" aria-selected="false">Genel</a>
                        </li>
                        @foreach($languages as $language)
                            <li class="nav-item">
                                <a class="nav-link " id="{{ $language->locale }}-tab" data-toggle="tab" href="#{{ $language->locale }}" role="tab" aria-controls="profile" aria-selected="false">{{ $language->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <form action="{{ isset($car) ? route('admin.car.update', ['car' => $car]) : route('admin.car.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @isset($car)
                            @method('PUT')
                        @endisset
                        <div class="tab-content pl-3 p-1" id="myTabContent">

                            <div class="tab-pane fade show active" id="genel" role="tabpanel" aria-labelledby="genel-tab">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="name" class=" form-control-label">Araç Adı</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="name" name="name" value="{{ isset($car) ? $car->name : old('name') }}" placeholder="" class="form-control">
                                                @error('name')
                                                <span class="help-block text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Araç Modeli</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="car_model_id" id="select" class="form-control">
                                                    <option >Araç Tipi Seçiniz</option>
                                                    @foreach($carModels as $carModel)
                                                        <option value="{{ $carModel->id }}" {{ isset($car) && $car->car_model_id == $carModel->id ? 'selected' : '' }}>{{ $carModel->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="image" class=" form-control-label">Araç Resimi</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="image" name="image" class="form-control">
                                                @error('image')
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
                                                                   {{ isset($car) && $car->is_active ? 'checked' : '' }}
                                                                   name="is_active" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="year" class=" form-control-label">Araç Model Yılı</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="year" name="year" value="{{ isset($car) ? $car->year : old('year') }}" placeholder="" class="form-control">
                                                @error('year')
                                                <span class="help-block text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="km" class=" form-control-label">Araç KM</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="km" name="km" value="{{ isset($car) ? $car->km : old('km') }}" placeholder="" class="form-control">
                                                @error('km')
                                                <span class="help-block text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="door" class=" form-control-label">Araç Kapı Sayısı</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="door" name="door" value="{{ isset($car) ? $car->door : old('door') }}" placeholder="" class="form-control">
                                                @error('door')
                                                <span class="help-block text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($languages as $language)
                                <div class="tab-pane fade " id="{{ $language->locale }}" role="tabpanel" aria-labelledby="{{ $language->locale }}-tab">
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">DİL</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static">{{ $language->name }}</p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="color" class=" form-control-label">Araç Rengi</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="color" name="color[{{$language->locale}}]" value="{{ isset($car) ? $car->getTranslations()['color'][$language->locale] : old('color['.$language->locale.']') }}" placeholder="" class="form-control">
                                                    @error('color')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="editor" class=" form-control-label">Araç Özellikleri</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="description[{{ $language->locale }}]"  class="form-control ckeditor1" rows="15">{!!  isset($car) ? $car->getTranslations()['description'][$language->locale] : old('description['.$language->locale.']')  !!}</textarea>
                                                    @error('description')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Save
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        let ck = document.querySelectorAll('.ckeditor1');
        for (let i = 0; i < ck.length; i++) {
            CKEDITOR.replace(ck[i], {
                height: 500,
                filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        }
    </script>
@endsection
