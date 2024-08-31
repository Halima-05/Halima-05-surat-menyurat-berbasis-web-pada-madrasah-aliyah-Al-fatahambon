@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('undangan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="no_surat">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{ old('no_surat') }}" id="no_surat">
                        @error('no_surat') <small class="text-danger">{{ $message }}</small> @enderror
                    </div> 
                    <div class="form-group mb-2">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" value="{{ old('perihal') }}">
                        @error('perihal') <small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                    <div class="form-group mb-2">
                        <label for="acara">Nama Acara</label>
                        <input type="text" class="form-control" name="acara" value="{{ old('acara') }}">
                        @error('acara') <small class="text-danger">{{ $message }}</small> @enderror
                        
                    </div>
                    <div class="form-group mb-2">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <select name="tahun_ajaran" id="dropdown" class="form-control">
                            @foreach( $ta as $row )
                            <option value=""></option>
                            <option value="{{ $row->tahun_ajaran }}">{{ $row->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                        @error('tahun_ajaran') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tangal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                        @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" name="waktu" value="{{ old('waktu') }}">
                        @error('waktu') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" value="{{ old('lokasi') }}">
                        @error('lokasi') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Save</button>
                    <a href="{{ route('undangan.index') }}" class="btn btn-danger" onclick="return confirm('Batal input data?')"><i class="fas fa-times"></i> Batal</a>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    CKEDITOR.replace( 'editor', {
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
