<?php 
    $konf = DB::table('setting')->first();
?>
<html>
<head>
    <title> Surat Keterangan </title>
</head>

<body bgcolor="white" onload="print();">
    {{-- <img src="{{ asset('logo/'.$konf->logo_setting) }}" alt="" style="width: 80px; margin-top: 200px;" > --}}
    <font face="Arial" color="">
        <p align="center"> PEMERINTAH KOTA AMBON </p>
    </font>
    <font face="Arial" color="">
        <p align="center"> KECAMATAN TELUK AMBON BAGUALA </p>
    </font>
    <font face="Arial" color="">
        <p align="center"> DESA NANIA </p>
    </font>
    <font face="Arial" color="black" size="3">
        <p align="center"> {{ $konf->alamat_setting }} </p>
    </font>
    <hr>

    <font face="Arial" color="" size="6">
        <p align="center"> <u> <b> SURAT KETERANGAN PENDATANG </b></u>
    </font><br>
    <font face="Arial" color="" size="4"> Nomor:
        {{ $pendatang->id_pendatang }}/PDTG/{{ Carbon\Carbon::parse($pendatang->tanggal_kedatangan)->isoFormat('Y') }}
        </p>
    </font>

    <p align="">
        Yang bertanda tangan dibawah ini Kepala Desa Nania, Kec. Teluk Ambon Baguala, Kota Ambon, dengan ini menerangkan
        bahwa:
    </p>
        <table style="margin-left: 40px;">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $pendatang->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $pendatang->nik_pendatang }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $pendatang->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Tanggal Kedatangan</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::parse($pendatang->tanggal_kedatangan)->isoFormat('dddd, D MMMM Y')  }}</td>
            </tr>
            <tr>
                <td>Tujuan Kedatangan</td>
                <td>:</td>
                <td>{{ $pendatang->keterangan_kedatangan }}</td>
            </tr>
        </table>

    <p align="">
        <font face="Arial">
            Dengan ini menerangkan bahwa yang bersangkutan telah melapor ke kantor desa untuk datang dan berkunjung ke desa nania. 
            <br><br>Demikian surat keterangan ini dibuat sebagaimana mestinya.
        </font>
    </p>
</body>

</html>
