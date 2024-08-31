@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
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
                    <form action="{{ route('keluarga.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="">No. Kartu Keluarga</label>
                        <input type="number" name="no_keluarga" class="form-control" value="{{ old('no_keluarga') }}">
                    </div> 
                    <div class="form-group mb-2">
                        <label for="">Kepala Keluarga</label>
                        <select name="id_penduduk" id="dropdown" class="form-control">
                            <option value=""></option>
                            @foreach ($penduduk as $row)
                                <option value="{{ $row->id_penduduk }}">{{ $row->nik_penduduk }} || {{ $row->nama_penduduk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat</label>
                        <textarea name="alamat_keluarga" rows="3" class="form-control">{{ old('alamat_keluarga') }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save fa-pulse"> </i> Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
