@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('detail_keluarga.create', $keluarga->id_keluarga) }}" class="btn btn-dark btn-sm ml-2" style="float: right; display:inline-block"><i class="fas fa-plus">Tambah</i></a>
                    <a href="{{ route('keluarga.index') }}" class="btn btn-warning btn-sm" style="float: right; display: inline-block";><i class="fas fa-backward">Kembali</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Hubungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_keluarga as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->no_keluarga }}</td>
                                    <td>{{ $row->nama_penduduk }} <br>{{ $row->nik_penduduk }}</td>
                                    <td>{{ $row->hubungan_keluarga }}</td>
                                    <td>
                                        <a href="{{ route('detail_keluarga.edit', $row->id_detail_keluarga) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                                        <form action="{{ route('detail_keluarga.destroy', $row->id_detail_keluarga) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash"> Delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection