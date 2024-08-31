@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tahun_ajaran.update', $data->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-2">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" placeholder="contoh : 2022/2023" class="form-control" value="{{ $data->tahun_ajaran }}" id="tahun_ajaran">
                            @error('tahun_ajaran') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Save</button>
                    <a href="{{ route('tahun_ajaran.index') }}" onclick="return confirm('Batal input?')" class="btn btn-danger"><i class="fas fa-times"> </i> Batal</a>
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
