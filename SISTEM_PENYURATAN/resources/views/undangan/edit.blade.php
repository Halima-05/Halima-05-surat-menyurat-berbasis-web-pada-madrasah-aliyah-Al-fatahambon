@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('undangan.update', $data->id) }}" method="POST">
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
                        <label for="acara">Nama Acara</label>
                        <input type="text" class="form-control" name="acara" value="{{ $data->acara }}">
                        @error('acara') <small class="text-danger">{{ $message }}</small> @enderror
                        
                    </div>
                    <div class="form-group mb-2">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <select name="tahun_ajaran" id="dropdown" class="form-control">
                            @foreach( $ta as $row )
                            <option value=""></option>
                            <option @if( $data->tahun_ajaran == $row->tahun_ajaran ) selected @endif value="{{ $row->tahun_ajaran }}">{{ $row->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                        @error('tahun_ajaran') <small class="text-danger">{{ $message }}</small> @enderror
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
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" value="{{ $data->lokasi }}">
                        @error('lokasi') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Save</button>
                    <a href="{{route('undangan.index')}}" class="btn btn-danger" onclick="return confirm('Batalkan penginputan data ?')"><i class="fas fa-times"></i> Batal</a>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
