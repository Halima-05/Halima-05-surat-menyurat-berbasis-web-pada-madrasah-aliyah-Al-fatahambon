@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pindah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="no_surat">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{ old('no_surat') }}" id="no_surat">
                        @error('no_surat') <small class="text-danger">{{ $message }}</small> @enderror
                    </div> 
                    <div class="form-group mb-2">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                    <div class="form-group mb-2">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" name="nisn" value="{{ old('nisn') }}">
                        @error('nisn') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="dropdown" class="form-control">
                            <option value=""></option>
                            @foreach( $kelas as $row )
                            <option value="{{ $row->kelas }}">{{ $row->kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <select name="tahun_ajaran" id="dropdown2" class="form-control">
                            <option value=""></option>
                            @foreach( $ta as $row )
                            <option value="{{ $row->tahun_ajaran }}">{{ $row->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                        @error('tahun_ajaran') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tanggal_surat" value="{{ old('tanggal_surat') }}">
                        @error('tanggal_surat') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Save</button>
                    <a href="{{route('pindah.index')}}" class="btn btn-danger" onclick="return confirm('Batalkan penginputan data ?')"><i class="fas fa-times"></i> Batal</a>
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
