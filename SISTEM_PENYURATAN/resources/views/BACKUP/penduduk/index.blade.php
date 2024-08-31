@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    @if (Auth::user()->role == 'Admin')
                    <a href="{{ route('penduduk.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
                    <a href="{{ url('penduduk.print') }}" class="btn btn-warning btn-sm mr-2" style="float: right" target="_blank"><i class="fas fa-print">Print</i></a>
                    @endif
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    @if (Auth::user()->role == 'Admin')
                    <table class="table table-bordered" id="no">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Akun</th>
                                <th>Tempat & Tgl Lahir</th>
                                <th>Kewarganegaraan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penduduk as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nik_penduduk }}</td>
                                    <td>{{ $row->nama_penduduk }}</td>
                                    <td>{{ $row->jenis_kelamin }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->tempat_lahir_penduduk }}<br>{{ Carbon\Carbon::parse($row->tanggal_lahir_penduduk)->isoFormat('dddd, D MMMM Y')  }}</td>
                                    <td>{{ $row->kewarganegaraan_penduduk }}</td>
                                    <td>
                                        <a href="{{ route('penduduk.edit', $row->id_penduduk) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                                        <a href="{{ route('penduduk.show', $row->id_penduduk) }}" class="btn btn-warning btn-xs" style="display: inline-block"><i class="fas fa-info">Detail</i></a>
                                        <form action="{{ route('penduduk.destroy', $row->id_penduduk) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash"> Delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    @if (Auth::user()->role != 'Admin')
                    <table class="table table-bordered" id="no">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Akun</th>
                                <th>Tempat & Tgl Lahir</th>
                                <th>Kewarganegaraan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penduduk as $row)
                            @if (Auth::user()->id == $row->id_user)
                            <tr>
                                <td>{{ $row->nik_penduduk }}</td>
                                <td>{{ $row->nama_penduduk }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->tempat_lahir_penduduk }}<br>{{ Carbon\Carbon::parse($row->tanggal_lahir_penduduk)->isoFormat('dddd, D MMMM Y')  }}</td>
                                <td>{{ $row->kewarganegaraan_penduduk }}</td>
                                <td>
                                    <a href="{{ route('penduduk.edit', $row->id_penduduk) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                                    <a href="{{ route('penduduk.show', $row->id_penduduk) }}" class="btn btn-warning btn-xs" style="display: inline-block"><i class="fas fa-info">Detail</i></a>
                                    <form action="{{ route('penduduk.destroy', $row->id_penduduk) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash"> Delete</i></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection