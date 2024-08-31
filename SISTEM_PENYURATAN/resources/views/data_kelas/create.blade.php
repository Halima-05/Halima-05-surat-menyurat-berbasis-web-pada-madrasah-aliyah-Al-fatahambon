@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('data_kelas.store') }}" method="POST" >
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" placeholder="contoh : 10 atau 10 IPA" class="form-control" value="{{ old('kelas') }}" id="kelas">
                        @error('kelas') <small class="text-danger">{{ $message }}</small> @enderror
                    </div> 
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Save</button>
                    <a href="{{ route('data_kelas.index') }}" class="btn btn-danger" onclick=" return confirm('Batal input')"><i class="fas fa-times"></i> Batal</a>
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
