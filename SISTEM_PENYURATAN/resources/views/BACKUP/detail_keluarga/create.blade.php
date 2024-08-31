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
                    <form action="{{ route('detail_keluarga.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id_keluarga" value="{{ $keluarga->id_keluarga }}">
                    <div class="form-group mb-2">
                        <label for="">No. Kartu Keluarga</label>
                        <select name="no_keluarga" id="" class="form-control">
                            <option value="{{ $keluarga->no_keluarga }}">{{ $keluarga->no_keluarga }}</option>
                        </select>
                    </div> 
                   <div class="form-group mb-2">
                        <label for="">Anggota Keluarga</label>
                        <select name="id_penduduk" id="dropdown2" class="form-control">
                            <option value=""></option>
                            @foreach ($penduduk as $row)
                                <option value="{{ $row->id_penduduk }}">{{ $row->nik_penduduk }} || {{ $row->nama_penduduk }}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group mb-2">
                        <label for="">Hubungan Dalam Keluarga</label>
                        <select name="hubungan_keluarga" id="dropdown3" class="form-control">
                            <option value=""></option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Menantu">Menantu</option>
                            <option value="Cucu">Cucu</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Mertua">Mertua</option>
                            <option value="Famili Lain">Famili Lain</option>
                            <option value="Pembantu">Pembantu</option>
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
