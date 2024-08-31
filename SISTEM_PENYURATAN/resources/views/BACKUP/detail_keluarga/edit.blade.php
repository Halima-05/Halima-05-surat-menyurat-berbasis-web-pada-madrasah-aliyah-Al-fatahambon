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
                    <form action="{{ route('detail_keluarga.update', $detail_keluarga->id_detail_keluarga) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_keluarga" value="{{ $detail_keluarga->id_keluarga }}">
                    <div class="form-group mb-2">
                        <label for="">No. Kartu Keluarga</label>
                        <select name="no_keluarga" id="" class="form-control">
                            <option value="{{ $detail_keluarga->no_keluarga }}">{{ $detail_keluarga->no_keluarga }}</option>
                        </select>
                    </div> 
                   <div class="form-group mb-2">
                        <label for="">Anggota Keluarga</label>
                        <select name="id_penduduk" id="dropdown2" class="form-control">
                            <option value=""></option>
                            @foreach ($penduduk as $row)
                                <option @if ($detail_keluarga->id_penduduk == $row->id_penduduk)
                                    selected
                                @endif value="{{ $row->id_penduduk }}">{{ $row->nik_penduduk }} || {{ $row->nama_penduduk }}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group mb-2">
                        <label for="">Hubungan Dalam Keluarga</label>
                        <select name="hubungan_keluarga" id="dropdown3" class="form-control">
                            <option value=""></option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Suami')
                                selected
                            @endif value="Suami">Suami</option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Istri')
                                selected
                            @endif value="Istri">Istri</option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Anak')
                                selected
                            @endif value="Anak">Anak</option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Menantu')
                                selected
                            @endif value="Menantu">Menantu</option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Cucu')
                                selected
                            @endif value="Cucu">Cucu</option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Orang Tua')
                                selected
                            @endif value="Orang Tua">Orang Tua</option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Mertua')
                                selected
                            @endif value="Mertua">Mertua</option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Famili Lain')
                                selected
                            @endif value="Famili Lain">Famili Lain</option>
                            <option @if ($detail_keluarga->hubungan_keluarga == 'Pembantu')
                                selected
                            @endif value="Pembantu">Pembantu</option>
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
