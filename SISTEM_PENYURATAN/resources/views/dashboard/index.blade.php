@extends('layouts.index')
@section('content')
    <?php
    $konf = DB::table('setting')->first();
    ?>
    <?php
    $title = 'Home';
    ?>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @if (Auth::user()->role == 'Admin')
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Undangan</h3>
                            <p>Buat Surat Undangan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="{{ route('undangan.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Data Kepsek<sup style="font-size: 20px"></sup></h3>
                            <p>Input Data Kepsek</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <a href="{{ route('data_kepsek.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Data Admin<sup style="font-size: 20px"></sup></h3>
                            <p>Ubah | Tambah | Hapus Data</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-child"></i>
                        </div>
                        <a href="{{ route('data_admin.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
               
            </div>
        @endif
    </div>
@endsection
