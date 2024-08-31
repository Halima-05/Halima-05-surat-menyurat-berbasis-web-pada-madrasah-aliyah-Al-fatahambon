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
            <div class="">
                <table>
                    <div>
                        <h6 class="float-right">{{ Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM Y'); }}</h6>
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td>{{ $data->no_surat }}</td>
                            <td></td> 
                        </tr>
                    </div>
                    <tr>
                        <td>Lampiran</td>
                        <td>:</td>
                        <td> - </td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td><h6>{{ $data->perihal }}</h6></td>
                    </tr>
                </table>
            </div>

            <div class="mt-5 ml-5">
                <p><strong>Kepada</strong></p>
                <p><strong>Yth.</strong> Bapak/IbuOrang tua/wali Peserta didik</p>
                <p>Dari : <strong>{{ $data->nama_siswa }}</strong></p>
                <p>di - </p>
                <p>tempat -</p>

                <h6>Assalamu'alaykum Warahmatullahi Wabarakatuh</h6>
                <p>Sehubungan  dengan   amanah  yang  diberikan  kami  untuk   membina  dan   mendidik  siswa/siswi  yang  cerdas  dan   berakhlakul  karimah  serta   kelancaran  proses  belajar bagi   peserta   didik,   maka   kami  mengundang  Bapak/ Ibu Orang Tua / Peserta  Didik  untuk hadir di Madrasah pada  : </p>
                <table>
                    <tr>
                        <td>Hari / Tanggal</td>
                        <td class="pl-4 pr-4">:</td>
                        <td>{{ Carbon\Carbon::parse($data->tanggal)->isoFormat('dddd, D MMMM Y'); }}</td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td class="pl-4 pr-4">:</td>
                        <td>{{ $data->waktu }}</td>
                    </tr>
                    <tr>
                        <td>Tempat</td>
                        <td class="pl-4 pr-4">:</td>
                        <td>{{ $data->tempat }}</td>
                    </tr>
                    <tr>
                        <td>Bertemu dengan</td>
                        <td class="pl-4 pr-4">:</td>
                        <td>{{ $data->nama_guru }}</td>
                    </tr>
                </table>
                <p class="mt-3">Demikian  surat   panggilan ini dibuat,  atas perhatian  dan  kerjasama yang baik kami ucapkan  terima  kasih.</p>
                <h6>Wassalamu'alaykum Warahmatullahi Wabarakatuh</h6>
            </div>
            <div class="mt-2 mb-5">
                <p class="text-right">Mengetahui</p>
                <p class="text-right" style=" margin-top:-15px;margin-bottom: 100px">Kepala Sekolah</p>
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