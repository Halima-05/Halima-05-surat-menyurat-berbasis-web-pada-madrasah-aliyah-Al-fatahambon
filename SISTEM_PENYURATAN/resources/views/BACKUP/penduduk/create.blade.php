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
                    <form action="{{ route('penduduk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="">NIK</label>
                        <input type="number" class="form-control" name="nik_penduduk" value="{{ old('nik_penduduk') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama</label>
                        <input type="text" name="nama_penduduk" class="form-control" value="{{ old('nama_penduduk') }}">
                    </div> 
                    <div class="form-group mb-2">
                        <label for="">Email Akun</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_penduduk" class="form-control" value="{{ old('tempat_lahir_penduduk') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_penduduk" class="form-control" value="{{ old('tanggal_lahir_penduduk') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Status</label>
                        <select name="status_penduduk" id="dropdown" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Agama</label>
                        <select name="agama_penduduk" id="dropdown2">
                            <option value="">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Pekerjaan</label>
                        <select name="pekerjaan_penduduk" id="dropdown3" class="form-control">
                            <option value="">Pilih Pekerjaan</option>
                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                            <option value="PNS">PNS</option>
                            <option value="Polri">Polri</option>
                            <option value="TNI">TNI</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="BUMN">BUMN</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat</label>
                        <textarea name="alamat_penduduk" class="form-control" rows="3">{{ old('alamat_penduduk') }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Kewarganegaraan</label>
                        <select name="kewarganegaraan_penduduk" id="dropdown4" class="form-control">
                            <option value="">Pilih Kewarganegaraan</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="dropdown5" class="form-control">
                            <option value=""></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
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
