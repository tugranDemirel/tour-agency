@extends('admin.layouts.app')
@section('title', $contact->full_name.' İletişim Mesajı')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>{{ $contact->name.' '.$contact->surname }} 'in Mesajı</p>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Kullanıcı Adı Soyadı</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control form-control-plaintext" value="{{ $contact->name.' '.$contact->surname }}">
                        </div>
                    </div>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control form-control-plaintext" value="{{ $contact->email }}">
                        </div>
                    </div>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">İletişim Numarası</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control form-control-plaintext" value="{{ $contact->phone }}">
                        </div>
                    </div>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Mesaj</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <textarea class="form-control form-control-plaintext" rows="10" cols="30">{{ $contact->message }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
