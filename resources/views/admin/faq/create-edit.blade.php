@extends('admin.layouts.app')
@section('title', isset($faq) ? 'Yorum Düzenle' : 'Yorum Oluştur')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Araç Tipi <strong>{{ isset($faq) ? 'düzenleme' : 'oluşturma' }}</strong> formu
                </div>

                <p class="text-muted m-b-15">Araç <strong>{{ isset($faq) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi buradan yapabilirsiniz.Araç <strong>{{ isset($faq) ? 'düzenleme' : 'oluşturma' }}</strong> işlemlerinizi yaparken lütfen dil içeriklerinin hepsini doldurmaya özen gösteriniz.</p>
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

                <form action="{{ isset($faq) ? route('admin.faq.update', ['faq' => $faq]) : route('admin.faq.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @isset($faq)
                        @method('PUT')
                    @endisset
                    <div class="tab-content pl-3 p-1" id="myTabContent">

                        <div class="tab-pane fade show active" id="genel" role="tabpanel" aria-labelledby="genel-tab">
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Aktiflik Durumu</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox13" class="form-check-label ">
                                                        <input type="checkbox" id="checkbox13"
                                                               {{ isset($faq) && $faq->is_active ? 'checked' : '' }}
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
                                                <label for="title" class=" form-control-label">Soru Başlığı</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="title" name="title[{{$language->locale}}]" value="{{ isset($faq) ? $faq->getTranslations()['title'][$language->locale] : old('title['.$language->locale.']') }}" placeholder="" class="form-control">
                                                @error('title')
                                                <span class="help-block text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="question" class=" form-control-label">Soru</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="question" name="question[{{$language->locale}}]" value="{{ isset($faq) ? $faq->getTranslations()['question'][$language->locale] : old('question['.$language->locale.']') }}" placeholder="" class="form-control">
                                                @error('question')
                                                <span class="help-block text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="editor" class=" form-control-label">Sorunun Cevabı</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="answer[{{ $language->locale }}]"  class="form-control ckeditor1" rows="15">{!!  isset($faq) ? $faq->getTranslations()['answer'][$language->locale] : old('answer['.$language->locale.']')  !!}</textarea>
                                                @error('answer')
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

@endsection
