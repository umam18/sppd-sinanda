<html>

<?php 
  setlocale(LC_TIME, 'IND');
  setlocale(LC_TIME, 'id_ID');
  date_default_timezone_set('Asia/Jakarta');
?>

<body>
  <table>
    <tr>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">DAFTAR NORMATIF PERJALANAN DINAS</td>
    </tr>
    <tr>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">KEGIATAN KOORDINASI PEMUTAKHIRAN DATA PEGAWAI PADA </td>
    </tr>
    <tr>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">SISTEM INFORMASI PEGAWAI KEMENTERIAN KOMUNIKASI DAN INFORMATIKA</td>
    </tr>
    <tr>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">{{ $akun->tujuan }}, {{strftime("%d", strtotime($akun->tanggal_berangkat))}} - {{strftime("%d %B %Y", strtotime($akun->tanggal_kembali))}}</td>
    </tr>
    
    <tr>
      <td colspan="2">NAMA SATKER</td>
      <td colspan="3">: SEKRETARIAT JENDERAL</td>
    </tr>

    <tr>
      <td colspan="2">PROGRAM</td>
      <td colspan="3">: 059.01.01 (PROG DUKUNGAN MANAGEMEN DAN PELAKS TUGAS TEHNIK LAINNYA KEMKOMINFO</td>
    </tr>

    <tr>
      <td colspan="2">NAMA KEGIATAN</td>
      <td colspan="3">: 3012 (KOORDINASI PEMBINAAN KEPEGAWAIAN DAN PENATAAN ORGANISASI KEMENTERIAN KOMUNIKASI DAN INFORMATIKA)</td>
    </tr>

    <tr>
      <td colspan="2">KELUARAN (OUTPUT)</td>
      <td>: {{$akun -> keluaran}} </td>
    </tr>

    <tr>
      <td colspan="2">KOMPONEN</td>
      <td>: {{$akun -> komponen}}</td>
    </tr>
 
    <tr>
      <td colspan="2">SUB KOMPONEN</td>
      <td>: {{$akun -> sub}}</td>
    </tr>

    <tr>
      <td colspan="2">AKUN</td>
      <td>: {{$akun -> akun}}</td>
    </tr>

    <tr>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">NO. </td>
      <td style="text-align: center; vertical-align: middle;">N A M A/NIP</td>
      <td></td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">GOL</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">JABATAN</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">TUJUAN</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">TANGGAL</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">LAMA</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">TIKET</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">HOTEL</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">UANG</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">Uang</td>
      <td style=" font-weight: bold; text-align: center; vertical-align: middle;">Trans</td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">PERJALANAN</td>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">Perjalanan</td>
      <td></td>
      <td></td>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">HARIAN</td>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">Representatif</td>
      <td style="font-weight: bold; text-align: center; vertical-align: middle;">riil</td>
    </tr>

    @foreach ($event as $count => $e)
    <tr>
      <td style="text-align: center;"><?php echo $count+1 ?></td>
      <td colspan="2" style="text-align: left;">{{ $e->nama }}/{{ $e->nip }}</td>
      <td style="text-align: center;">{{ $e->pangkat }}</td>
      <td style="text-align: center;">{{ $e->posisi }}</td>
      <td style="text-align: center;">{{ $e->berangkat }} - {{ $e->tujuan }} pp</td>
      <td style="text-align: center;">{{strftime("%d", strtotime($e->tanggal_berangkat))}} - {{strftime("%d %B %Y", strtotime($e->tanggal_kembali))}}</td>
      <td style="text-align: center;">{{ $e->lama }} hari</td>
      <td style="text-align: center;">{{ $e->t_transport }}</td>
      <td style="text-align: center;">{{ $e->t_penginapan }}</td>
      <td style="text-align: center;">{{ $e->t_hn }}</td>
      <td style="text-align: center;">{{ $e->t_rpr }}</td>
      <td style="text-align: center;">{{ $e->t_ku }}</td>
    </tr>
    @endforeach
    <?php $x = count($event); ?>
    <tr></tr>
    <tr>
      <td></td>
      <td>JUMLAH</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td></td>
      <td>Terbilang</td>
      <td>: </td>
    </tr>

    <tr>
      <td></td>
      <td>Kepada</td>
      <td>: Bendahara Pengeluaran Setjen Kemkominfo</td>
    </tr>

    <tr>
      <td></td>
      <td>Bank/Pos</td>
      <td>: Bank BRI Kantor Kas Dep. Kominfo</td>
    </tr>

    <tr>
      <td></td>
      <td>No. Rekening</td>
      <td>: AC. 1215-01-000007-30-5</td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td style="text-align: center;" colspan="3">Jakarta, {{strftime("%d %B %Y", strtotime($akun->created_at))}}</td>
    </tr>

    <tr>
      <td></td>
      <td style="text-align: center;" colspan="2">a.n. KEPALA KPPN JAKARTA I</td>
      <td></td>
      <td style="text-align: center;" colspan="2">Pejabat Pembuat Komitmen</td>
      <td style="text-align: center;">Bendahara</td>
      <td></td>
      <td></td>
      <td></td>
      <td colspan="3">Bendahara Pengeluaran Pembantu</td>
    </tr>

    <tr>
      <td></td>
      <td style="text-align: center;" colspan="2">Kepala Seksi Pencairan Dana I</td>
      <td></td>
      <td style="text-align: center;" colspan="2">Biro Kepegawaian dan Organisasi</td>
      <td style="text-align: center;">Pengeluaran</td>
    </tr>

    <tr></tr>
    <tr></tr>
    <tr></tr>

    <tr>
      <td></td>
      <td colspan="2" style="font-weight: bold">TIYOK SUBEKTI</td>
      <td></td>
      <td colspan="2" style="font-weight: bold">MARYADI</td>
      <td style="font-weight: bold">SONY JOHANES</td>
      <td></td>
      <td></td>
      <td></td>
      <td colspan="3" style="font-weight: bold">ANKA RAHARJA</td>
    </tr>

    <tr>
      <td></td>
      <td colspan="2" style="font-weight: bold">NIP. 19741003 199511 1 001</td>
      <td></td>
      <td colspan="2" style="font-weight: bold">NIP. 196804101991032003</td>
      <td style="font-weight: bold">NIP. 196109111991031003</td>
      <td></td>
      <td></td>
      <td></td>
      <td colspan="3" style="font-weight: bold">NIP. 198402122009121002</td>
    </tr>


  </table>
</body>
</html>
