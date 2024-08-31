<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>{{ $title }}</title>

    <style>
        @media print {
        /* All your print styles go here */
        #header,
        #footer,
        #nav {
            display: none !important;
        }
        }
    </style>
    
  </head>
  <body>

    <div class="container mt-5">
        <div class="col-md-8">
            <img src="{{ asset('logo/logo madrasah aliyah alfatah.jpeg') }}" alt="logo MAN Alfatah" width="80px" style="margin-bottom: -200px; margin-right:100%"> 
            <img src="{{ asset('logo/logo-alfatah.png') }}" alt="logo Alfatah" width="80px" style="margin-bottom: -145px; margin-left: 90%">               
            <h5 class="text-center" style="margin-bottom: -1px">YAYASAN AL-FATAH AMBON</h5>
            <h6 class="text-center" style="margin-bottom: -2px">MADRASAH ALIYAH AL-FATAH AMBON</h6>
            <p class="text-center" style="margin-bottom: -5px">Jl. Sultan Babullah No 2 - Telp (0911) 347662</p>
            <p class="text-center" style="margin-bottom: -5px">NPSN : 60105601 – NSM : 131281710001</p>
            <p class="text-center">TERAKREDITASI A</p>
            <hr style="border: 1px solid black; margin-bottom: -15px">
            <hr style="border-bottom: 3px solid black;">
        </div>
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="col-md-7 mb-4">
                    <table>
                        <tr>
                            <td><h6 style="border-bottom: 1px solid black;">SURAT KETERANGAN MENERIMA SISWA PINDAHAN</h6>
                                <p style="margin-top: -10px">Nomor : {{ $data->no_surat }}</p></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="">
            <table>
                <tr>
                    <td>Yang bertanda tangan dibawah ini :</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td class="pl-4 pr-4">:</td>
                    <td>{{ $kepsek->nama }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td class="pl-4 pr-4">:</td>
                    <td> {{ $kepsek->nip }} </td>
                </tr>
                <tr>
                    <td>Pangkat/Gol Ruang</td>
                    <td class="pl-4 pr-4">:</td>
                    <td>{{ $kepsek->golongan }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="pl-4 pr-4">:</td>
                    <td>{{ $kepsek->jabatan }}</td>
                </tr>
                <tr>
                    <td class="pt-3 pb-3">Dengan ini siap menerima siswa pindahan :</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td class="pl-4 pr-4">:</td>
                    <td>{{ $data->nama_siswa }}</td>
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td class="pl-4 pr-4">:</td>
                    <td>{{ $data->tempat_lahir . ', ' . Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td class="pl-4 pr-4">:</td>
                    <td>{{ $data->nisn }}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td class="pl-4 pr-4">:</td>
                    <td>{{ $data->kelas }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td class="pl-4 pr-4">:</td>
                    <td>{{ $data->asal_sekolah }}</td>
                </tr>
                <tr>
                    <td class="pt-3">Dengan persyaratan :</td>
                </tr>
                <tr>
                    <td class="pl-5">1. Membawa Surat Pindah dari Sekolah Asal</td>
                </tr>
                <tr>
                    <td class="pl-5">2. Membawa Surat Pelepasan siswa dari Dapodik/EMIS</td>
                </tr>
                <tr>
                    <td class="pl-5">3. Membawa Laporan Pendidikan dari Sekolah Asal</td>
                </tr>
                <tr>
                    <td class="pt-3">Demikian Surat Keterangan ini dibuat dan dipergunakan sebagaimana mestinya.</td>
                </tr>
            </table>
        </div>
        <div class="mt-2 mb-5">
            <p class="text-right">Ambon, {{ Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM Y') }}</p>
            <p class="text-right" style="margin-bottom: 100px">Kepala Sekolah</p>
            <h6 class="text-right"><u>{{ $kepsek->nama }}</u></h6>
            <h6 class="text-right">NIP.{{ $kepsek->nip }}</h6>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <script>
        window.print()
    </script>
  </body>
</html>