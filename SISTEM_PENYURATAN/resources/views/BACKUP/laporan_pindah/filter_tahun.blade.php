@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan_pindah.filter') }}" method="GET">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <select name="tahun" id="filter-tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                @foreach ($tahun as $row)
                                    <option value="{{ $row->tahun }}">{{ $row->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-dark">Submit</button>
                            <a href="{{ route('laporan_pindah.index') }}" class="btn btn-warning">Reset</a>
                        </div>
                    </div>
                </form>
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table class="table table-stripped" id="table">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Laki-laki</th>
                                <th>Perempuan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $year }}</td>
                                <td>{{ $laki }}</td>
                                <td>{{ $perempuan }}</td>
                                <td>{{ $laki + $perempuan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true },
            { extend: 'print', footer: true}
        ]
    } );
} );
  </script>
@endsection