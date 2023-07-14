@extends('admin.layouts.app')
@section('title', 'Main Config')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Site</strong> Ayarları
                    </div>
                    <form id="settingForm" action="{{ route('admin.main_config_update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-muted m-b-15">Site Anasayfa ayarlarını <strong>{{ isset($mainConfig) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi buradan yapabilirsiniz.Site Anasayfa <strong>{{ isset($mainConfig) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi yaparken lütfen dil içeriklerinin hepsini doldurmaya özen gösteriniz.</p>
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

                            <form action="{{ isset($mainConfig) ? route('admin.car.update', ['car' => $mainConfig]) : route('admin.car.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content pl-3 p-1" id="myTabContent">

                                    <div class="tab-pane fade show active" id="genel" role="tabpanel" aria-labelledby="genel-tab">
                                        <div class="card">
                                            <div class="card-body card-block">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="filter_image" class=" form-control-label">Anasayfa Filtre Arka Plan Resim</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file" id="filter_image" name="filter_image" class="form-control">
                                                        @error('filter_image')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="laptop_image" class=" form-control-label">Anasayfa Alt Resim</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file" id="laptop_image" name="laptop_image" class="form-control">
                                                        @error('laptop_image')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="video_image" class=" form-control-label">Video Arka Plan Resim</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file" id="video_image" name="video_image" class="form-control">
                                                        @error('video_image')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="video_url" class=" form-control-label">Video URL</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="video_url" name="video_url" value="{{ isset($mainConfig) ? $mainConfig->video_url : old('video_url') }}" placeholder="" class="form-control">
                                                        @error('video_url')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="price" class=" form-control-label">En Düşük Fiyat</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="price" name="price" value="{{ isset($mainConfig) ? $mainConfig->price : old('price') }}" placeholder="" class="form-control">
                                                        @error('price')
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
                                                            <label for="price_description" class=" form-control-label">En Düşük Fiyat Altı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="price_description" name="price_description[{{$language->locale}}]"
                                                                   value="{{ isset($mainConfig) ? $mainConfig->getTranslations()['price_description'][$language->locale] : old('price_description['.$language->locale.']') }}"
                                                                   placeholder="" class="form-control"
                                                            >
                                                            @error('price_description.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="video_title" class=" form-control-label">Video Başlığı</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="video_title" name="video_title[{{$language->locale}}]" value="{{ isset($mainConfig) ? $mainConfig->getTranslations()['video_title'][$language->locale] : old('video_title['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('video_title.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="video_description" class=" form-control-label">Video Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="video_description" name="video_description[{{$language->locale}}]" value="{{ isset($mainConfig) ? $mainConfig->getTranslations()['video_description'][$language->locale] : old('video_description['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('video_description.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="premium_text" class=" form-control-label">Premium Alanı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="premium_text" name="premium_text[{{$language->locale}}]" value="{{ isset($mainConfig) ? $mainConfig->getTranslations()['premium_text'][$language->locale] : old('premium_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('premium_text.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="customer_text" class=" form-control-label">Customer Alanı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="customer_text" name="customer_text[{{$language->locale}}]" value="{{ isset($mainConfig) ? $mainConfig->getTranslations()['customer_text'][$language->locale] : old('customer_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('customer_text.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="support_text" class=" form-control-label">Support Alanı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="support_text" name="support_text[{{$language->locale}}]" value="{{ isset($mainConfig) ? $mainConfig->getTranslations()['support_text'][$language->locale] : old('support_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('support_text.*')
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
                    </form>
                </div>
            </div>
        </div>
@endsection
