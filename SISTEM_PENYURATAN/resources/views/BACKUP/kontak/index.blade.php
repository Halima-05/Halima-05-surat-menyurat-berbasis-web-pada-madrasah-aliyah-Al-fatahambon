@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    @if (Auth::user()->role == 'Admin')
                    {{-- <a href="{{ route('keluarga.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
                    <a href="{{ url('keluarga.print') }}" target="_blank" class="btn btn-warning btn-sm mr-2" style="float: right"><i class="fas fa-print">Print</i></a> --}}
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
                                <th>Nama</th>
                                <th>Nomor Hp</th>
                                <th>Subjek</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->nomor_hp }}</td>
                                    <td>{{ $row->subjek }}</td>
                                    <td>{{ $row->pesan }}</td>
                                    <td>
                                        <a href="{{ route('kontak.show', $row->id) }}" class="btn btn-warning btn-xs" style="display: inline-block"><i class="fas fa-eye"> Detail</i></a>
                                        <form action="{{ route('kontak.destroy', $row->id) }}" method="POST" style="display: inline-block">
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
                                <th>No. KK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keluarga as $row)
                            @if (Auth::user()->id == $row->id)
                            <tr>
                                <td>{{ $row->no_keluarga }}</td>
                                <td>{{ $row->nama_penduduk }} <br>{{ $row->nik_penduduk }}</td>
                                <td>{{ $row->alamat_keluarga }}</td>
                                <td>
                                    {{-- <a href="{{ route('keluarga.edit', $row->id_keluarga) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a> --}}
                                    <a href="{{ route('detail_keluarga.index', $row->id_keluarga) }}" class="btn btn-warning btn-xs" style="display: inline-block"><i class="fas fa-users">Detail Keluarga</i></a>
                                    <form action="{{ route('keluarga.destroy', $row->id_keluarga) }}" method="POST" style="display: inline-block">
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

