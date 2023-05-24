<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
        <style>
        @page { size: A4 }
        #title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            font-weight: bold;
        }
        .tabeldatakaryawan{
            margin-top: 40px;
        }

        .tabeldatakaryawan tr td{
            padding: 5px;
        }

        .tabelpresensi{
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .tabelpresensi tr th{
            border: 1px solid #242323;
            padding: 8px;
            background-color: #d1cece;
        }

        .tabelpresensi tr td{
            border: 1px solid #242323;
            padding: 5px;
            font-size: 12px;
        }

        .foto{
            width: 40px;
            height: 30px;
        }
        </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
    <?php
    function selisih($jam_masuk, $jam_keluar)
    {
        list($h, $m, $s) = explode(":", $jam_masuk);
        $dtAwal = mktime($h, $m, $s, "1", "1", "1");
        list($h, $m, $s) = explode(":", $jam_keluar);
        $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode(".", $totalmenit / 60);
        $sisamenit = ($totalmenit / 60) - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam . ":" . round($sisamenit2);
    }
    ?>

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

        <table style="width: 100%">
                <tr>
                    <td style="width: 60px">
                        <img src="{{ asset('assets/img/smpnu.png') }}" width="70" height="70" alt="">
                    </td>
                    <td>
                        <span id="title"><br> LAPORAN PRESENSI KARYAWAN <br> 
                                PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }} <br> 
                                SMP NU PAJOMBLANGAN <br>
                        </span>
                        <span><i>Jl. Desa Pajomblangan, Kec. Kedungwuni, Kab. Pekalongan (Kode Pos 51173)</i></span>
                
                    </td>            
                </tr>
        </table>
        <table class="tabeldatakaryawan">
            <tr>
                <td rowspan="6">
                    @php
                        $path = Storage::url('uploads/karyawan/'. $karyawan->foto);
                    @endphp
                    <img src="{{ url($path ) }}" alt="" width="120px" height="150">
                </td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $karyawan->nik }}</td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td>:</td>
                <td>{{ $karyawan->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>{{ $karyawan->jabatan }}</td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>:</td>
                <td>{{ $karyawan->nama_dept }}</td>
            </tr>
            <tr>
                <td>No. Hp</td>
                <td>:</td>
                <td>{{ $karyawan->no_hp }}</td>
            </tr>
        </table>
        <table class="tabelpresensi">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Foto</th>
                <th>Jam Pulang</th>
                <th>Foto</th>
                <th>Keterangan</th> 
                <th>Jumlah Jam</th>               
            </tr>
            @foreach ($presensi as $d)
                @php
                    $path_in = Storage::url('uploads/absensi/'. $d->foto_in);
                    $path_out = Storage::url('uploads/absensi/'. $d->foto_out);
                    $jamterlambat = selisih('07:00:00',$d->jam_in);
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date("d-m-Y",strtotime($d->tgl_presensi)) }}</td>
                    <td>{{ $d->jam_in}}</td>
                    <td><img src="{{ url($path_in) }}" alt="" class="foto"></td>
                    <td>{{ $d->jam_out != null ? $d->jam_out : 'Belum Absen'}}</td>
                    <td>
                        @if ($d->jam_out != null)
                        <img src="{{ url($path_out) }}" alt="" class="foto"> 
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M15 8h.01"></path>
                            <path d="M7 3h11a3 3 0 0 1 3 3v11m-.856 3.099a2.991 2.991 0 0 1 -2.144 .901h-12a3 3 0 0 1 -3 -3v-12c0 -.845 .349 -1.608 .91 -2.153"></path>
                            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                            <path d="M16.33 12.338c.574 -.054 1.155 .166 1.67 .662l3 3"></path>
                            <path d="M3 3l18 18"></path>
                         </svg>
                        @endif
                    </td>    
                    <td>
                        @if ($d->jam_in >= '07:00')
                            Terlambat {{ $jamterlambat }}
                        @else
                            Tepat waktu
                        @endif
                    </td>
                    <td>
                        @if ($d->jam_out != null)
                        @php
                            $jmljamkerja = selisih($d->jam_in,$d->jam_out);
                        @endphp
                        @else
                        @php                            
                            $jmljamkerja = 0;
                        @endphp
                        @endif
                        {{ $jmljamkerja }}
                    </td>
                </tr>
            @endforeach
        </table>
        <table width="100%" style="margin-top:100px"> 
            <tr>
                <td colspan="2" style="text-align: right">Pekalongan, {{ date('d-m-Y') }}</td>
            </tr>
            <tr>
                <td style="text-align: center; vertical-align:bottom; height:100px">
                    <u>K.H Adib Karomi</u><br>
                    <i><b>Kepala Sekolah</b></i>
                </td>
                <td style="text-align: center; vertical-align:bottom">
                    <u>Didi Madhari</u><br>
                    <i><b>Administrasi</b></i>
                </td>
            </tr>
        </table>
  </section>

</body>

</html>