<?php 
    $konf = DB::table('setting')->first();
?>
<html>
<head>
    <title> Surat Keterangan </title>
</head>

<body bgcolor="white" onload="print();">
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
        <p align="center"> <u> <b> SURAT KETERANGAN KELAHIRAN </b></u>
    </font><br>
    <font face="Arial" color="" size="4"> Nomor:
        {{ $kelahiran->id_lahir }}/LHR/{{ Carbon\Carbon::parse($kelahiran->tanggal_lahir)->isoFormat('Y') }}
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
                <td>{{ $kelahiran->nama_lahir }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $kelahiran->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::parse($kelahiran->tanggal_lahir)->isoFormat('dddd, D MMMM Y')  }}</td>
            </tr>
            <tr>
                <td>Nomor Keluarga</td>
                <td>:</td>
                <td>{{ $kelahiran->no_keluarga }}</td>
            </tr>
        </table>

    <p align="">
        <font face="Arial">
            Dengan ini menerangkan bahwa yang bersangkutan telah lahir dari keluarga {{ $kelahiran->nama_penduduk }}. 
            <br><br>Demikian surat keterangan ini dibuat sebagaimana mestinya.
        </font>
    </p>
</body>

</html>
