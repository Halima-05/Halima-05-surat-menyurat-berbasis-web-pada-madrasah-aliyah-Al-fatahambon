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
                    <form action="{{ route('kelahiran.update', $kelahiran->id_kelahiran) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Keluarga</label>
                        <select name="id_keluarga" id="dropdown" class="form-control">
                            <option value=""></option>
                            @foreach ($keluarga as $row)
                                <option @if ($kelahiran->id_keluarga == $row->id_keluarga)
                                    selected
                                @endif value="{{ $row->id_keluarga }}">KK: {{ $row->no_keluarga }} || Nama KK: {{ $row->nama_penduduk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama</label>
                        <input type="text" name="nama_lahir" class="form-control" value="{{ $kelahiran->nama_lahir }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $kelahiran->tempat_lahir }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $kelahiran->tanggal_lahir }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="dropdown2" class="form-control">
                            <option value=""></option>
                            <option @if ($kelahiran->jenis_kelamin == 'Laki-laki')
                                selected
                            @endif value="Laki-laki">Laki-laki</option>
                            <option @if ($kelahiran->jenis_kelamin == 'Perempuan')
                                selected
                            @endif value="Perempuan">Perempuan</option>
                        </select>
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
