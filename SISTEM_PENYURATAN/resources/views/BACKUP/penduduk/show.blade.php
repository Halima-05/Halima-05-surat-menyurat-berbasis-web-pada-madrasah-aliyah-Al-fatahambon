@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('penduduk.index') }}" class="btn btn-warning btn-sm" style="float: right"><i class="fas fa-backward"> </i> Kembali</a>
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body table table-responsive">
                  <table class="table table bordered">
                    <tr>
                        <th>NIK</th>
                        <td>:</td>
                        <td>{{ $penduduk->nik_penduduk }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $penduduk->nama_penduduk }}</td>
                    </tr>
                    <tr>
                        <th>Tempat & Tanggal Lahir</th>
                        <td>:</td>
                        <td>{{ $penduduk->tempat_lahir_penduduk }}, {{ Carbon\Carbon::parse($penduduk->tanggal_lahir_penduduk)->isoFormat('dddd, D MMMM Y')  }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td>{{ $penduduk->status_penduduk }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>:</td>
                        <td>{{ $penduduk->agama_penduduk }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>:</td>
                        <td>{{ $penduduk->pekerjaan_penduduk }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{ $penduduk->alamat_penduduk }}</td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td>:</td>
                        <td>{{ $penduduk->kewarganegaraan_penduduk }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>{{ $penduduk->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Akun</th>
                        <td>:</td>
                        <td>{{ $penduduk->email }}, Password Default NIK</td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection
