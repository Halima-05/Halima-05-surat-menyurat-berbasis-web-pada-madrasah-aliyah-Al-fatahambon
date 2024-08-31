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
                    <form action="{{ route('wisata.update', $wisata->id_wisata) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-2">
                        <label for="">Nama Wisata</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Wisata disini..." name="nama_wisata" value="{{ $wisata->nama_wisata}}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Pengelola Wisata</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pengelola Wisata disini..." name="nama_pengelola" value="{{ $wisata->nama_pengelola }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">No Hp Pengelola</label>
                        <input type="number" class="form-control" placeholder="Masukkan No Hp Pengelola Wisata disini..." name="no_hp" value="{{ $wisata->no_hp }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="editor" cols="30" rows="10">{{ $wisata->deskripsi }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Foto Wisata <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" accept="image/*" name="foto_wisata" class="form-control">
                        <img class="d-none w-25 h-25 my-2" id="previewImg" src="{{ asset('file/wisata/', $wisata->foto_wisata) }}" alt="Preview image">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Maps</label>
                        <div id="map">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Long</label>
                        <input type="text" name="long_lokasi" class="form-control" id="longitude" value="{{ $wisata->long_lokasi }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Latitude</label>
                        <input type="text" name="lat_lokasi" id="latitude" class="form-control" value="{{ $wisata->lat_lokasi }}">
                    </div>   
                </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@section('script')
<script>
    document.getElementById('inputImg').addEventListener('change', function() {
        // Get the file input value and create a URL for the selected image
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').setAttribute('src', e.target.result);
                document.getElementById('previewImg').classList.add("d-block");
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
  <script>
      CKEDITOR.replace( 'editor', {
          filebrowserUploadMethod: 'form'
      });
  </script>

{{-- leaflet --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>

<script>
    // titik Lokasi Maps
    var map = L.map('map').setView([-3.7074373005302976, 128.10225898114956], 17);

    // menampilkan maps
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // membuat mark pada maps
    // var marker = L.marker([-3.6988652520988445, 128.17786254762765]).addTo(map);
    // marker.bindPopup("<br>Hello ini mark pertama</br><br>ini popup</br>")

    let marker = null;
    map.on('click', (event)=> {

    if(marker !== null){
        map.removeLayer(marker);
    }

    marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);
    document.getElementById('latitude').value = event.latlng.lat;
    document.getElementById('longitude').value = event.latlng.lng;
    
})
</script>
{{-- leaflet --}}
@endsection
@endsection