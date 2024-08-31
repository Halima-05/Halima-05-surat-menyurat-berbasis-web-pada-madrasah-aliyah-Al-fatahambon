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
                    <form action="{{ route('panggilan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control" value="{{ $data->no_surat }}" id="no_surat">
                            @error('no_surat') <small class="text-danger">{{ $message }}</small> @enderror
                        </div> 
                        <div class="form-group mb-2">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" name="perihal" value="{{ $data->perihal }}">
                            @error('perihal') <small class="text-danger">{{ $message }}</small> @enderror
    
                        </div>
                        <div class="form-group mb-2">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" value="{{ $data->nama_siswa }}">
                            @error('nama_siswa') <small class="text-danger">{{ $message }}</small> @enderror
                            
                        </div>
                        <div class="form-group mb-2">
                            <label for="tangal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}">
                            @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="waktu">Waktu</label>
                            <input type="time" class="form-control" name="waktu" value="{{ $data->waktu }}">
                            @error('waktu') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="tempat">Tempat</label>
                            <input type="text" class="form-control" name="tempat" value="{{ $data->tempat }}">
                            @error('tempat') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" class="form-control" name="nama_guru" value="{{ $data->nama_guru }}">
                            @error('nama_guru') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Save</button>
                    <a href="{{route('panggilan.index')}}" class="btn btn-danger" onclick="return confirm('Batalkan penginputan data ?')"><i class="fas fa-times"></i> Batal</a>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
