@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('data_kepsek.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ $data->nip }}" id="nip">
                        @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
                    </div> 
                    <div class="form-group mb-2">
                        <label for="nama">Nama Kepsek</label>
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" id="nama">
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="golongan">Pangkat / Golongan</label>
                        <input type="text" class="form-control" name="golongan" value="{{ $data->golongan }}" id="golongan">
                        @error('golongan') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" value="{{ $data->jabatan }}" id="jabatan">
                        @error('jabatan') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Save</button>
                    <a href="{{route('data_kepsek.index')}}" class="btn btn-danger" onclick="return confirm('Batalkan penginputan data ?')"><i class="fas fa-times"></i> Batal</a>
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
