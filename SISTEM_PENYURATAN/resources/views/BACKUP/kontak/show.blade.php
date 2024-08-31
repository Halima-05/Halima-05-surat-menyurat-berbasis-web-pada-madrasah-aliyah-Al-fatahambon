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
                    <a href="{{ url('kontak') }}" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <table class="table table-bordered" id="no">
                            <tr>
                                <th>No</th>
                                <td>1</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Hp</th>
                                <td>{{ $data->nomor_hp }}</td>
                            </tr>
                            <tr>
                                <th>Subjek</th>
                                <td>{{ $data->subjek }}</td>
                            </tr>
                            <tr>
                                <th>Pesan</th>
                                <td>{{ $data->pesan }}</td>
                            </tr>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

