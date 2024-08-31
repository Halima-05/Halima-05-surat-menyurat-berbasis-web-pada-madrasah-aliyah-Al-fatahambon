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
                    <form action="{{ route('pendatang.update', $pendatang->id_pendatang) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">NIK Pendatang</label>
                        <input type="number" class="form-control" name="nik_pendatang" value="{{ $pendatang->nik_pendatang }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Pendatang</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ $pendatang->nama_lengkap }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="dropdown" class="form-control">
                            <option value=""></option>
                            <option @if ($pendatang->jenis_kelamin == 'Laki-laki')
                                selected
                            @endif value="Laki-laki">Laki-laki</option>
                            <option  @if ($pendatang->jenis_kelamin == 'Perempuan')
                                selected
                            @endif value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tanggal Kedatangan</label>
                        <input type="date" class="form-control" name="tanggal_kedatangan" value="{{ $pendatang->tanggal_kedatangan }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Keterangan Kedatangan</label>
                        <textarea name="keterangan_kedatangan" rows="3" class="form-control">{{ $pendatang->keterangan_kedatangan }}</textarea>
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
