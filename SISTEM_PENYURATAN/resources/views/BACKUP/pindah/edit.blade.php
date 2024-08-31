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
                    <form action="{{ route('pindah.update', $pindah->id_pindah) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Data Penduduk Pindah</label>
                        <select name="id_penduduk" id="dropdown" class="form-control">
                            <option value=""></option>
                            @foreach ($penduduk as $row)
                                <option @if ($pindah->id_penduduk == $row->id_penduduk)
                                    selected
                                @endif value="{{ $row->id_penduduk }}">{{ $row->nik_penduduk }}  || {{ $row->nama_penduduk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tanggal Pindah</label>
                        <input type="date" class="form-control" name="tanggal_pindah" value="{{ $pindah->tanggal_pindah }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alasan Pindah</label>
                        <textarea name="alasan_pindah" rows="3" class="form-control">{{ $pindah->alasan_pindah }}</textarea>
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
