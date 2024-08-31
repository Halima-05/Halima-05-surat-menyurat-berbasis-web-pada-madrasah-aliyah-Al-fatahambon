@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('wisata.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
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
                                <th>Nama Wisata</th>
                                <th>Nama Pengelola</th>
                                <th>No Hp Pengelola</th>
                                <th>Deskripsi</th>
                                <th>Foto Wisata</th>
                                <th>Long dan Lat Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wisata as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_wisata }}</td>
                                    <td>{{ $row->nama_pengelola }}</td>
                                    <td>{{ $row->no_hp }}</td>
                                    <td>{!! Str::limit($row->deskripsi, 100, '...') !!}</td>
                                    <td><img src="{{ asset('file/wisata/'.$row->foto_wisata) }}" alt="" class="img-fluid" style="width:200px; height:200px; max-width:100%;"></td>
                                    <td>{{ $row->long_lokasi }}, {{ $row->lat_lokasi }}</td>
                                    <td>
                                        <a href="{{ route('wisata.edit', $row->id_wisata) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                                        {{-- <a href="{{ route('wisata.show', $row->id_wisata) }}" class="btn btn-warning btn-xs" style="display: inline-block;" target="_blank"><i class="fas fa-print">Print</i></a> --}}
                                        <form action="{{ route('wisata.destroy', $row->id_wisata) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash"> Delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3" id="map"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>

<script>
    // titik Lokasi Maps
    var map = L.map('map').setView([-3.7074373005302976, 128.10225898114956], 15);

    // menampilkan maps
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // membuat mark pada maps
    @foreach($wisata as $row)
    var marker = L.marker([{{$row->lat_lokasi}}, {{$row->long_lokasi}}]).addTo(map);
    marker.bindPopup("<br>{{$row->nama_wisata}}</br> <br>{{$row->no_hp}}</br>")
    @endforeach
</script>
@endsection