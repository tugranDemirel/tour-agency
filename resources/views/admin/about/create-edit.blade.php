@extends('admin.layouts.app')
@section('title', 'Hakkımızda Sayfası')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Hakkımızda</strong> Sayfası
                </div>
                <div class="card-body">
                        <div class="card-body">
                            <p class="text-muted m-b-15">Hakımızda sayfası <strong>{{ isset($about) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi buradan yapabilirsiniz.Hakkımızda sayfası <strong>{{ isset($about) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi yaparken lütfen dil içeriklerinin hepsini doldurmaya özen gösteriniz.</p>
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

                            <form action="{{ isset($about) ? route('admin.about.update', ['about' => $main]) : route('admin.about.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @isset($about)
                                    @method('PUT')
                                @endisset
                                <div class="tab-content pl-3 p-1" id="myTabContent">

                                    <div class="tab-pane fade show active" id="genel" role="tabpanel" aria-labelledby="genel-tab">
                                        <div class="card">
                                            <div class="card-body card-block">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="image" class=" form-control-label">Hakkımızda Sayfası Arka Plan Resim</label>
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
                                                        <label for="banner_image" class=" form-control-label">Hakkımızda Sayfası Banner Resim</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file" id="banner_image" name="banner_image" class="form-control">
                                                        @error('banner_image')
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
                                                            <label for="name" class=" form-control-label">Başlık</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="name" name="name[{{$language->locale}}]"
                                                                   value="{{ isset($about) ? $about['name'][$language->locale] ?? '' : old('name['.$language->locale.']') }}"
                                                                   placeholder="" class="form-control slug-source">
                                                            @error('name.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="slug" class=" form-control-label">Sayfa Linki</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="slug" name="slug[{{$language->locale}}]"
                                                                   value="{{ isset($about) ? $about['slug'][$language->locale] ?? '' : old('slug['.$language->locale.']') }}"
                                                                   placeholder="" class="form-control slug-target form-control-plaintext">
                                                            @error('slug.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="banner_title" class=" form-control-label">Banner Alanı Başlık</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="banner_title" name="banner_title[{{$language->locale}}]" value="{{ isset($about) ? $about['banner_title'][$language->locale] ?? '' : old('banner_title['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('banner_title.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="banner_text" class=" form-control-label">Banner Alanı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="banner_text" name="banner_text[{{$language->locale}}]" value="{{ isset($about) ? $about['banner_text'][$language->locale] ?? '' : old('banner_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('banner_text.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="short_desc" class=" form-control-label">Kısa Açıklama</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="short_desc" name="short_desc[{{$language->locale}}]" value="{{ isset($about) ? $about['short_desc'][$language->locale] ?? '' : old('short_desc['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('short_desc.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="premium_text" class=" form-control-label">Premium Alanı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="premium_text" name="premium_text[{{$language->locale}}]" value="{{ isset($about) ? $about['premium_text'][$language->locale] ?? '' : old('premium_text['.$language->locale.']') }}" placeholder="" class="form-control">
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
                                                            <input type="text" id="customer_text" name="customer_text[{{$language->locale}}]" value="{{ isset($about) ? $about['customer_text'][$language->locale] ?? '' : old('customer_text['.$language->locale.']') }}" placeholder="" class="form-control">
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
                                                            <input type="text" id="support_text" name="support_text[{{$language->locale}}]" value="{{ isset($about) ? $about['support_text'][$language->locale] ?? '' : old('support_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('support_text.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="language_text" class=" form-control-label">Dil Alanı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="language_text" name="language_text[{{$language->locale}}]" value="{{ isset($about) ? $about['language_text'][$language->locale] ?? '' : old('language_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('language_text.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="accessibility_text" class=" form-control-label">Erişilebilirlik Alanı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="accessibility_text" name="accessibility_text[{{$language->locale}}]" value="{{ isset($about) ? $about['accessibility_text'][$language->locale] ?? '' : old('accessibility_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('accessibility_text.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="pet_allow_text" class=" form-control-label">Evcil Hayvan İzni Alanı Açıklaması</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="pet_allow_text" name="pet_allow_text[{{$language->locale}}]" value="{{ isset($about) ? $about['pet_allow_text'][$language->locale] ?? '' : old('pet_allow_text['.$language->locale.']') }}" placeholder="" class="form-control">
                                                            @error('pet_allow_text.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="mission" class=" form-control-label">Misyon</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea name="mission[{{$language->locale}}]" class="form-control" id="mission" cols="30"
                                                                      rows="10">{{ isset($about) ? $about['mission'][$language->locale] ?? '' : old('mission['.$language->locale.']') }}</textarea>
                                                             @error('mission.*')
                                                            <span class="help-block text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="vision" class=" form-control-label">Vizyon</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea name="vision[{{$language->locale}}]" class="form-control" id="vision" cols="30"
                                                                      rows="10">{{ isset($about) ? $about['vision'][$language->locale] ?? '' : old('vision['.$language->locale.']') }}</textarea>
                                                           @error('vision.*')
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
@endsection
