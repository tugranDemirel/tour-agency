@extends('admin.layouts.app')
@section('title', 'Site Ayarları')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Site</strong> Ayarları
            </div>
            <form id="settingForm" action="{{ isset($setting) ? route('admin.setting.update', ['setting' => $setting]) : route('admin.setting.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @if(isset($setting))
                    @method('PUT')
                @endif
            <div class="card-body card-block">
               <div class="row">
                   <div class="col-md-6">
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-email" class=" form-control-label">Site Email</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="email" id="hf-email" name="email" value="{{ isset($setting) ? $setting->email : old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                   @error('email')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-password" class=" form-control-label">Site Telefon</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="text" id="hf-password" name="phone"  value="{{ isset($setting) ? $setting->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                                   @error('phone')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-logo" class=" form-control-label">Site Logo</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="file" id="hf-logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
                                   @error('logo')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-favicon" class=" form-control-label">Site Favicon</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="file" id="hf-favicon" name="phone"  class="form-control @error('favicon') is-invalid @enderror">
                                   @error('favicon')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-faviconcontact_image" class=" form-control-label">İletişim Sayfası Resim</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="file" id="hf-faviconcontact_image" name="contact_image"  class="form-control @error('favicon') is-invalid @enderror">
                                   @error('contact_image')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                   </div>
                   <div class="col-md-6">
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-title" class=" form-control-label">Site Adı</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="text" id="hf-title" name="title"  value="{{ isset($setting) ? $setting->title : old('title') }}" class="form-control @error('title') is-invalid @enderror">

                                   @error('title')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-address" class=" form-control-label">Site Adres</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="text" id="hf-address" name="address" value="{{ isset($setting) ? $setting->address : old('address') }}" class="form-control @error('address') is-invalid @enderror">

                                   @error('title')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-facebook" class=" form-control-label">Facebook</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="text" id="hf-facebook" name="facebook" value="{{ isset($setting) ? $setting->facebook : old('facebook') }}" class="form-control @error('facebook') is-invalid @enderror">
                                   <span class="help-block">Lütfen URL şeklinde giriniz.(https://www.facebook.com/username)</span>
                                   @error('facebook')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row form-group">
                               <div class="col col-md-3">
                                   <label for="hf-instagram" class=" form-control-label">Instagram</label>
                               </div>
                               <div class="col-12 col-md-9">
                                   <input type="text" id="hf-instagram" name="instagram" value="{{ isset($setting) ? $setting->instagram : old('instagram') }}" class="form-control @error('instagram') is-invalid @enderror">
                                   <span class="help-block">Lütfen URL şeklinde giriniz.(https://www.instagram.com/username)</span>
                                   @error('instagram')
                                   <span class="help-block">{{ $message }}</span>
                                   @enderror
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
                    <i class="fa fa-ban"></i> Resetle
                </button>
            </div>

            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Seo Ayarları</h4>
            </div>
            <div class="card-body">
                <p class="text-muted m-b-15">Seo ayarlarınızı buradan yapabilirsiniz. Seo ayarlarını yaparken lütfen dil içeriklerinin hepsini doldurmaya özen gösteriniz.</p>
                <p><b>İçerikler doldurulmadığı taktirde</b> dil değiştirildiğinde doldurulmayan içerik boş gelecektir.</p>
                <br>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($languages as $language)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active show @endif" id="{{ $language->locale }}-tab" data-toggle="tab" href="#{{ $language->locale }}" role="tab" aria-controls="profile" aria-selected="false">{{ $language->name }}</a>
                    </li>
                    @endforeach
                </ul>
                <form action="{{ route('admin.seo.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                <div class="tab-content pl-3 p-1" id="myTabContent">
                    @foreach($languages as $language)
                    <div class="tab-pane fade @if($loop->first) active show @endif" id="{{ $language->locale }}" role="tabpanel" aria-labelledby="{{ $language->locale }}-tab">
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
                                            <label for="text-input" class=" form-control-label">Başlık</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="meta_title[{{$language->locale}}]" value="{{ isset($seo) ? $seo['meta_title'][$language->locale] : old('meta_title['.$language->locale.']')}}" class="form-control">
                                            @error('meta_title['.$language->locale.']')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Anahtar Kelimeler</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="email-input" name="meta_keywords[{{$language->locale}}]" value="{{ isset($seo) ? $seo['meta_keywords'][$language->locale] : old('meta_keywords['.$language->locale.']')}}" class="form-control">
                                            <small class="help-block form-text">Lütfen kelimeleri , ile ayırınız</small>
                                            @error('meta_keywords['.$language->locale.']')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Site Açıklaması</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="meta_description[{{$language->locale}}]" id="textarea-input" rows="9"  class="form-control">{{ isset($seo) ? $seo['meta_description'][$language->locale] : old('meta_description['.$language->locale.']') }}</textarea>
                                            @error('meta_description['.$language->locale.']')
                                            <small class="form-text text-muted">{{ $message }}</small>
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
@endsection

