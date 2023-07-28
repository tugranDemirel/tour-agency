@extends('admin.layouts.app')
@section('title', isset($service) ? 'Servis Düzenle' : 'Servis Oluştur')
@section('styles')
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>

@endsection
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        Servis <strong>{{ isset($service) ? 'düzenleme' : 'oluşturma' }}</strong> formu
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted m-b-15">Servis <strong>{{ isset($service) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi buradan yapabilirsiniz.Servis <strong>{{ isset($service) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi yaparken lütfen dil içeriklerinin hepsini doldurmaya özen gösteriniz.</p>
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

                    <form action="{{ isset($service) ? route('admin.service.update', ['service' => $service]) : route('admin.service.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @isset($service)
                            @method('PUT')
                        @endisset
                        <div class="tab-content pl-3 p-1" id="myTabContent">

                            <div class="tab-pane fade show active" id="genel" role="tabpanel" aria-labelledby="genel-tab">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="image" class=" form-control-label">Servis Banner Resmi</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="image" name="banner_image" class="form-control">
                                                @error('banner_image')
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
                                                                   {{ isset($service) && $service->is_active ? 'checked' : '' }}
                                                                   name="is_active" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </div>
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
                                                    <label for="title" class=" form-control-label">Servis Başlığı</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="title" name="title[{{$language->locale}}]" value="{{ isset($service) ? $service->getTranslations()['title'][$language->locale] ?? '' : old('title['.$language->locale.']') }}" placeholder="" class="form-control slug-source">
                                                    @error('title')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="slug" class=" form-control-label">Servis URL</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="slug" name="slug[{{$language->locale}}]" value="{{ isset($service) ? $service->getTranslations()['slug'][$language->locale] ?? '' : old('slug['.$language->locale.']') }}" placeholder="" class="form-control  slug-target form-control-plaintext">
                                                    @error('slug')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="banner_title" class=" form-control-label">Banner Başlığı</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="banner_title" name="banner_title[{{$language->locale}}]" value="{{ isset($service) ? $service->getTranslations()['banner_title'][$language->locale] ?? '' : old('banner_title['.$language->locale.']') }}" placeholder="" class="form-control">
                                                    @error('banner_title')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="banner_text" class=" form-control-label">Banner Açıklaması</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="banner_text" name="banner_text[{{$language->locale}}]" value="{{ isset($service) ? $service->getTranslations()['banner_text'][$language->locale] ?? '' : old('banner_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                    @error('banner_text')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="description" class=" form-control-label">Servis Kısa Açıklaması</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="description" name="description[{{$language->locale}}]" value="{{ isset($service) ? $service->getTranslations()['description'][$language->locale] ?? '' : old('description['.$language->locale.']') }}" placeholder="" class="form-control">
                                                    @error('description')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="content" class=" form-control-label">Servis Açıklaması</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="content[{{ $language->locale }}]"  class="form-control ckeditor1" rows="15">{!!  isset($service) ? $service->getTranslations()['content'][$language->locale] ?? '' : old('content['.$language->locale.']')  !!}</textarea>
                                                    @error('content')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="meta_title" class=" form-control-label">SEO Meta Title</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="meta_title" name="meta_title[{{$language->locale}}]" value="{{ isset($service) ? $service->getTranslations()['meta_title'][$language->locale] ?? '' : old('meta_title['.$language->locale.']') }}" placeholder="" class="form-control">
                                                    @error('meta_title['.$language->locale.']')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="meta_description" class=" form-control-label">SEO Meta Açıklama</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="meta_description" name="meta_description[{{$language->locale}}]" value="{{ isset($service) ? $service->getTranslations()['meta_description'][$language->locale] ?? '' : old('meta_description['.$language->locale.']') }}" placeholder="" class="form-control">
                                                    @error('meta_description')
                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="meta_keywords" class=" form-control-label">SEO Meta Anahtar Kelime</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="meta_keywords" name="meta_keywords[{{$language->locale}}]" value="{{ isset($service) ? $service->getTranslations()['meta_keywords'][$language->locale] ?? '' : old('meta_keywords['.$language->locale.']') }}" placeholder="" class="form-control">
                                                    @error('meta_keywords')
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
        $(document).ready(function(){
            let slugSource = document.querySelectorAll('.slug-source')
            let slugTarget = document.querySelectorAll('.slug-target')
            console.log(slugSource);
            for (let i = 0; i < slugSource.length; i++){
                slugSource[i].addEventListener('keyup', function(){
                    let slug = this.value.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
                    slugTarget[i].value = slug
                })

            }
        })
    </script>
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
