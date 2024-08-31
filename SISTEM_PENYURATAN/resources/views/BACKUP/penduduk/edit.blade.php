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
                    <form action="{{ route('penduduk.update', $penduduk->id_penduduk) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">NIK</label>
                        <input type="number" class="form-control" name="nik_penduduk" value="{{ $penduduk->nik_penduduk }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama</label>
                        <input type="text" name="nama_penduduk" class="form-control" value="{{ $penduduk->nama_penduduk }}">
                    </div> 
                    <div class="form-group mb-2">
                        <label for="">Email Akun</label>
                        <input type="email" name="email" class="form-control" value="{{ $penduduk->email }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_penduduk" class="form-control" value="{{ $penduduk->tempat_lahir_penduduk }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_penduduk" class="form-control" value="{{ $penduduk->tanggal_lahir_penduduk }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Status</label>
                        <select name="status_penduduk" id="dropdown" class="form-control">
                            <option value="">Pilih Status</option>
                            <option @if ($penduduk->status_penduduk == 'Menikah')
                                selected
                            @endif value="Menikah">Menikah</option>
                            <option @if ($penduduk->status_penduduk == 'Belum Menikah')
                                selected
                            @endif value="Belum Menikah">Belum Menikah</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Agama</label>
                        <select name="agama_penduduk" id="dropdown2" class="form-control">
                            <option value="">Pilih Agama</option>
                            <option @if ($penduduk->agama_penduduk == 'Islam')
                                selected
                            @endif value="Islam">Islam</option>
                            <option @if ($penduduk->agama_penduduk == 'Kristen')
                                selected
                            @endif value="Kristen">Kristen</option>
                            <option @if ($penduduk->agama_penduduk == 'Katolik')
                                selected
                            @endif value="Katolik">Katolik</option>
                            <option @if ($penduduk->agama_penduduk == 'Hindu')
                                selected
                            @endif value="Hindu">Hindu</option>
                            <option @if ($penduduk->agama_penduduk == 'Budha')
                                selected
                            @endif value="Budha">Budha</option>
                            <option @if ($penduduk->agama_penduduk == 'Konghucu')
                                selected
                            @endif value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Pekerjaan</label>
                        <select name="pekerjaan_penduduk" id="dropdown3" class="form-control">
                            <option value="">Pilih Pekerjaan</option>
                            <option @if ($penduduk->pekerjaan_penduduk == 'Pelajar/Mahasiswa')
                                selected
                            @endif value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                            <option @if ($penduduk->pekerjaan_penduduk == 'PNS')
                                selected
                            @endif value="PNS">PNS</option>
                            <option  @if ($penduduk->pekerjaan_penduduk == 'Polri')
                                selected
                            @endif value="Polri">Polri</option>
                            <option @if ($penduduk->pekerjaan_penduduk == 'TNI')
                                selected
                            @endif value="TNI">TNI</option>
                            <option  @if ($penduduk->pekerjaan_penduduk == 'Wiraswasta')
                                selected
                            @endif value="Wiraswasta">Wiraswasta</option>
                            <option  @if ($penduduk->pekerjaan_penduduk == 'BUMN')
                                selected
                            @endif value="BUMN">BUMN</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat</label>
                        <textarea name="alamat_penduduk" class="form-control" rows="3">{{ $penduduk->alamat_penduduk }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Kewarganegaraan</label>
                        <select name="kewarganegaraan_penduduk" id="dropdown4" class="form-control">
                            <option value="">Pilih Kewarganegaraan</option>
                            <option @if ($penduduk->kewarganegaraan_penduduk == 'WNI')
                                selected
                            @endif value="WNI">WNI</option>
                            <option @if ($penduduk->kewarganegaraan_penduduk == 'WNA')
                                selected
                            @endif value="WNA">WNA</option>
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
