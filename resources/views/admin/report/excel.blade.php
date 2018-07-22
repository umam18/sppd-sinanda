<html>

<?php 
  setlocale(LC_ALL, 'IND');
  setlocale(LC_ALL, 'id_ID');
  date_default_timezone_set('Asia/Jakarta');
?>

<body>
  <table>
    <tr>
      <td style=" font-weight: bold; font-family: Times New Roman; text-align: right; vertical-align: middle;">Lampiran 2</td>
    </tr>
    <tr>
      <td style=" font-weight: bold; font-family: Times New Roman; text-align: center; vertical-align: middle;">Rekap Biaya Perjalanan Dinas Luar Daerah  Tahun  2018</td>
    </tr>
    <tr>
      <td style=" font-weight: bold; font-family: Times New Roman; text-align: center; vertical-align: middle;"> Satuan Kerja Biro Kepegawaian dan Organisasi pada Unit Eselon 1 Sekretariat Jenderal</td>
    </tr>
    <tr>
    </tr>

    <tr style=" font-weight: bold; font-family: Times New Roman; text-align: center; vertical-align: middle;">
      <td>No</td>
      <td>No. SPM/ No Kuitansi</td>
      <td>Tanggal Bukti</td>
      <td>Nama Lengkap Tanpa Gelar</td>
      <td>NIP</td>
      <td>Keperluan Perjalanan Dinas</td>
      <td>Jumlah Dibayarkan</td>
      <td>Gol. Peg</td>
      <td>Tujuan</td>
      <td>SPPD</td>
      <td></td><td></td><td></td><td></td>
      <td>Rincian Biaya</td>
      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
      <td>Tiket/Akomodasi</td>
    </tr>

    <tr style=" font-weight: bold; font-family: Times New Roman; text-align: center; vertical-align: middle;">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Tanggal</td>
      <td>
      <td>Lama Hari</td>
      <td rowspan="2">Lama Hari Meeting</td>
      <td rowspan="2">Representatif</td>
      <td>Uang Harian</td>
      <td></td>
      <td>Uang Harian Fullboard</td>
      <td></td>
      <td>Representatif</td><td></td>
      <td rowspan="2">Biaya Akomodasi</td>
      <td rowspan="2">Biaya Lain/Kontribusi Bantuan Support</td>
      <td rowspan="2">Biaya Tiket PP</td>
      <td rowspan="2">Jumlah</td>
      <td rowspan="2">Penginapan</td>
      <td rowspan="2">Tujuan</td>
      <td>Berangkat</td>
      <td></td><td></td><td></td><td></td>
      <tdKembali</td>
    </tr>

    <tr style=" font-weight: bold; font-family: Times New Roman; text-align: center; vertical-align: middle;">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Berangkat</td>
      <td>Kembali</td>
      <td></td>
      <td></td>
      <td></td>
      <td>Per Hari</td>
      <td>Total</td>
      <td>Per Hari</td>
      <td>Total</td>
      <td>Per Hari</td>
      <td>Total</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Tanggal</td>
      <td>Pesawat/KA</td>
      <td>Nomor Tiket</td>
      <td>Harga</td>
      <td>Tanggal</td>
      <td>Pesawat/KA</td>
      <td>Nomor Tiket</td>
      <td>Harga</td>
    </tr>

    <tr  style=" font-weight: bold; font-family: Times New Roman; text-align: center; vertical-align: middle;">
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td>5</td>
      <td>6</td>
      <td>7</td>
      <td>8</td>
      <td>9</td>
      <td>10</td>
      <td>11</td>
      <td>12</td>
      <td>13</td>
      <td>14</td>
      <td>15</td>
      <td>16</td>
      <td>17</td>
      <td>18</td>
      <td>19</td>
      <td>20</td>
      <td>21</td>
      <td>22</td>
      <td>23</td>
      <td>24</td>
      <td>25</td>
      <td>26</td>
      <td>27</td>
      <td>28</td>
      <td>29</td>
      <td>30</td>
      <td>31</td>
      <td>32</td>
      <td>33</td>
      <td>34</td>
    </tr>

    @foreach($spd as $count => $s)
    <tr>
      <td><?php echo $count+1 ?></td>
      <td></td>
      <td></td>
      <td>{{ $s['nama'] }}</td>
      <td>{{ $s['nip'] }}</td>
      <td>{{ $s['maksud'] }}</td>
      <td>{{ $s['t_all'] }}</td>
      <td>{{ $s['pangkat'] }}</td>
      <td>{{ $s['tujuan'] }}</td>
      <td>{{strftime("%d %B %Y", strtotime($s['tanggal_berangkat']))}}</td>
      <td>{{strftime("%d %B %Y", strtotime($s['tanggal_kembali']))}}</td>
      <td>{{ $s['lama'] }}</td>
      <td>@if($s['j_fb'] == 0) @else{{ $s['j_fb'] }}@endif</td>
      <td>@if($s['j_rpr'] == 0) @else{{ $s['j_rpr'] }}@endif</td>
      <td>@if($s['h_hn'] == 0) @else{{ $s['h_hn'] }}@endif</td>
      <td>@if($s['t_hn'] == 0) @else{{ $s['t_hn'] }}@endif</td>
      <td>@if($s['h_fb'] == 0) @else{{ $s['h_fb'] }}@endif</td>
      <td>@if($s['t_fb']) @else{{ $s['t_fb'] }}@endif</td>
      <td>@if($s['h_rpr'] == 0) @else{{ $s['h_rpr'] }}@endif</td>
      <td>@if($s['t_rpr'] == 0) @else{{ $s['t_rpr'] }}@endif</td>
      <td>{{ $s['t_penginapan'] }}</td>
      <td>{{ $s['t_ku'] }}</td>
      <td>{{ $s['t_transport'] }}</td>
      <td>{{ $s['t_all'] }}</td>
      <td>{{ $s['n_penginapan'] }}</td>
      <td>{{ $s['tujuan'] }}</td>
      <td>@if ($s['n_transport'] != null){{strftime("%d %B %Y", strtotime($s['tanggal_berangkat']))}}@else @endif</td>
      <td>{{ $s['n_transport'] }}</td>
      <td>{{ $s['no_berangkat'] }}</td>
      <td>{{ $s['h_tiket'] }}</td>
      <td>@if ($s['n_transport'] == null) @else{{strftime("%d %B %Y", strtotime($s['tanggal_kembali']))}}@endif</td>
      <td>{{ $s['n_transport'] }}</td>
      <td>{{ $s['no_kembali'] }}</td>
      <td>{{ $s['h_tiketp'] }}</td>
    </tr>
    @endforeach

    <tr style=" font-weight: bold; font-family: Times New Roman; text-align: center; vertical-align: middle;">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Total Dibayarkan</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Total UH</td>
      <td></td>
      <td>Total FB</td>
      <td></td>
      <td>Total Representatif</td>
      <td>Total Penginapan</td>
      <td>Total Kendaraan Umum</td>
      <td>Total Biaya Tiket</td>
      <td>Total Keseluruhan</td>
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

  </table>
</body>
</html>
