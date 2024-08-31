@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="row g-3" method="POST" action="{{ route('setting_landing.update', $setting->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ $setting->alamat }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $setting->email }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="{{ $setting->telepon }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Maps</label>
                            <input type="text" name="maps" class="form-control" value="{{ $setting->maps }}">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark" style="float: right"> <i class="fas fa-save"> </i> Simpan</button>
                </form>
                </div>
            </div>
        </div>
    @endsection
