@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('panggilan.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Perihal</th>
                                <th>Tanggal Pembuatan Surat</th>
                                <th>Hari / Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $data as $row )                                
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama_siswa }}</td>
                                <td>{{ $row->perihal }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>
                                    <a href="{{ route('panggilan.show', $row->id) }}" class="btn btn-success btn-xs" style="display: inline-block" target="_blank"><i class="fas fa-print"> Cetak</i></a>
                                    <a href="{{ route('panggilan.edit', $row->id) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit"> Ubah</i></a>
                                    <form action="{{ route('panggilan.destroy', $row->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash"> Hapus</i></button>
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

