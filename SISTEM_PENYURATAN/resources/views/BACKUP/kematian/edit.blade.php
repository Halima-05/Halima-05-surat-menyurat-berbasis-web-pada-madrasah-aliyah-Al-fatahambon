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
                    <form action="{{ route('kematian.update', $kematian->id_kematian) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Penduduk Meninggal</label>
                        <select name="id_penduduk" id="dropdown" class="form-control">
                            <option value=""></option>
                            @foreach ($penduduk as $row)
                                <option @if ($kematian->id_penduduk == $row->id_penduduk)
                                    selected
                                @endif value="{{ $row->id_penduduk }}">{{ $row->nik_penduduk }} || {{ $row->nama_penduduk }}</option>
                            @endforeach
                        </select>
                    </div>
                  <div class="form-group mb-2">
                    <label for="">Tanggal Kematian</label>
                    <input type="date" class="form-control" name="tanggal_kematian" value="{{ $kematian->tanggal_kematian }}">
                  </div>
                  <div class="form-group mb-2">
                    <label for="">Sebab Kematian</label>
                    <textarea name="sebab_kematian" rows="3" class="form-control">{{ $kematian->sebab_kematian }}</textarea>
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
