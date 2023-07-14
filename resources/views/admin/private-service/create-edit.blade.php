@extends('admin.layouts.app')
@section('title', isset($privateService->full_name) ? 'İsteği' : '')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Araç Tipi <strong>{{ isset($privateService) ? 'İsteği' : '' }}</strong> formu
                </div>
                    <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Adı Soyadı</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" disabled value="{{ $privateService->full_name }}" placeholder="" class=" form-control-plaintext">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Maili</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" disabled value="{{ $privateService->email }}" placeholder="" class=" form-control-plaintext">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Telefon Numarası</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" disabled value="{{ $privateService->phone }}" placeholder="" class=" form-control-plaintext">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Özel İstek Tipi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" disabled value="{{ $privateService->type }}" placeholder="" class=" form-control-plaintext">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Mesaj</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="message" disabled class="form-control-plaintext" id="" cols="30" rows="10">{{ $privateService->description }}</textarea>
                                </div>
                            </div>

                    </div>
            </div>
        </div>
    </div>

@endsection
