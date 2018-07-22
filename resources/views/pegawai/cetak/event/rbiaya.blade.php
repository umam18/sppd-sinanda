<?php
  setlocale(LC_TIME, 'IND');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rincian Biaya Perjalanan Dinas</title>
    <style>
      .page-break {
      page-break-after: always;
      }
    </style>
  </head>
  <body>
    @foreach($event as $e)
    <table align="center" border="0" cellpadding="1" style="width: 595px;">
      <tbody>
        <tr>
          <td>
            <table>
              <tbody>
                <tr>
                  <td width="52%"></td>
                  <td colspan="2" style="text-align:justify;">
                    <span style="font-family: Verdana; font-size: x-small;"><b>LAMPIRAN II</b></span>
                    <br>
                    <span style="font-family: Verdana; font-size: x-small;">
                      PERATURAN MENTERI KEUANGAN, NOMOR: 113/PMK.05/2012 TENTANG PERJALANAN DINAS JABATAN DALAM NEGERI BAGI PEJABAT NEGARA, PEGAWAI NEGERI, DAN PEGAWAI TIDAK TETAP.
                      <br>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td >
            <div align="center">
              <span style="font-family: Verdana; font-size:small;"><b>RENCANA BIAYA PERJALANAN DINAS</b></span>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <table>
              <tbody>
                <tr>
                  <td>
                    <div align="left">
                      <span style="font-size: x-small;">Lampiran SPPD Nomor</span>
                      <br>
                      <span style="font-size: x-small;">Tanggal</span>
                    </div>
                  </td>
                  <td>
                    <div align="left">
                      <span style="font-size: x-small;">: &nbsp;&nbsp;&nbsp;/SPD/SJ.2/&nbsp;&nbsp;&nbsp;/2018</span>
                      <br>
                      <span style="font-size: x-small;">: {{strftime("%d %B %Y", strtotime($e->created_at))}}</span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <table border="1" align="center" style="border-collapse: collapse;">
              <tbody>
                <tr>
                  <td width="30" align="center"><span style="font-size: x-small;"><b>NO.</b></span></td>
                  <td width="250" align="center"><span style="font-size: x-small;"><b>PERINCIAN BIAYA</b></span></td>
                  <td width="120" align="center"><span style="font-size: x-small;"><b>JUMLAH</b></span></td>
                  <td width="25%" align="center"><span style="font-size: x-small;"><b>KETERANGAN</b></span></td>
                </tr>
                <?php
                $no = 1; ?>
                <tr>
                  <td width="" valign="top" align="center"><span style="font-size: x-small;"><?php echo $no++ ?></span></td>
                  <td width="" align="left">
                    <span style="font-size: x-small;">
                      Transport : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$e->berangkat}} - {{$e->tujuan}} pp <br>
                      @if ($e->j_hn != null)
                        Uang Harian : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$e->j_hn}} hari x @ Rp. {{number_format( $e->h_hn, 0 , '' , '.')}} <br>
                      @endif
                      @if ($e->j_fd != null)
                        Uang Full Day : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$e->j_fd}} hari x @ Rp. Rp. {{number_format( $e->h_fd, 0 , '' , '.')}} <br>
                      @endif
                      @if ($e->j_fb != null)
                        Uang Full Board : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$e->j_fb}} hari x @ Rp. {{number_format( $e->h_fb, 0 , '' , '.')}} <br>
                      @endif
                      @if ($e->j_diklat != null)
                        Uang Diklat : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$e->j_diklat}} hari x @ Rp. {{number_format( $e->h_diklat, 0 , '' , '.')}} <br>
                      @endif
                      @if ($e->j_penginapan != null)
                        Uang Penginapan : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$e->j_penginapan}} hari x @ Rp. {{number_format( $e->h_penginapan, 0 , '' , '.')}} <br>
                      @endif
                    </span>
                  </td>
                  <td width="" align="right"><span style="font-size: x-small;">
                    @if ($e->h_ku == '0') Rp. {{number_format( $e->t_transport, 0 , '' , '.')}}<br><br> @else Rp. {{number_format( $e->t_ku, 0 , '' , '.')}}<br><br> @endif
                    @if ($e->t_hn != '0') Rp. {{number_format( $e->t_hn, 0 , '' , '.')}}<br><br> @endif
                    @if ($e->t_fd != '0') Rp. {{number_format( $e->t_hn, 0 , '' , '.')}}<br><br> @endif
                    @if ($e->t_fb != '0') Rp. {{number_format( $e->t_fb, 0 , '' , '.')}}<br><br> @endif
                    @if ($e->t_diklat != '0') Rp. {{number_format( $e->t_diklat, 0 , '' , '.')}}<br><br> @endif
                    @if ($e->t_penginapan != '0')  Rp. {{number_format( $e->t_penginapan, 0 , '' , '.')}} @endif </span></td>
                  <td width="" align="left"><span style="font-size: x-small;"></span></td>
                </tr>
                <tr>
                  <td colspan="2" width="" align="center"><span style="font-size: x-small;"><b>JUMLAH</b></span></td>
                  <td width="" align="right"><span style="font-size: x-small;"><b>Rp. {{number_format( $e->t_all, 0 , '' , '.')}}</b></span></td>
                  <td width="" align="left"><span style="font-size: x-small;"></span></td>
                </tr>
                <tr>
                  <td colspan="4"align="center"><span style="font-size: x-small;"><b>Terbilang : {{$e->terbilang}} rupiah</b></span></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <table border="0" align="center">
              <tbody>
                <tr>
                  <td width="297.5px" align="center"><span style="font-size: x-small;"><br></span></td>
                  <td width="297.5px" align="center"><span style="font-size: x-small;">Jakarta, {{strftime("%d %B %Y", strtotime($e->created_at))}}<br></span></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><span style="font-size: x-small;"><br></span></td>
                </tr>
                <tr>
                  <td align="left"><span style="font-size: x-small;">Telah dibayar sejumlah<br></span></td>
                  <td align="left"><span style="font-size: x-small;">Telah menerima jumlah uang sebesar<br></span></td>
                </tr>
                <tr>
                  <td align="left"><span style="font-size: x-small;">Rp. {{number_format( $e->t_all, 0 , '' , '.')}}</span></td>
                  <td align="left"><span style="font-size: x-small;">Rp. {{number_format( $e->t_all, 0 , '' , '.')}}</span></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><span style="font-size: x-small;"><br></span></td>
                </tr>
                <tr>
                  <td align="center"><span style="font-size: x-small;">Bendahara Pengeluaran Pembantu</span></td>
                  <td align="center"><span style="font-size: x-small;">Yang Menerima</span></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><span style="font-size: x-small;"><br><br><br></span></td>
                </tr>
                <tr>
                  <td align="center"><span style="font-size: x-small;"><b>{{$e->bendahara}}<b></span></td>
                  <td align="center"><span style="font-size: x-small;"><b>{{$e->nama}}<b></span></td>
                </tr>
                <tr>
                  <td align="center"><span style="font-size: x-small;">NIP. {{$e->nip_bendahara}}</span></td>
                  <td align="center"><span style="font-size: x-small;">NIP. {{$e->nip}}</span></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <hr>
            <table border="0" align="center">
              <tbody>
                <tr>
                  <td>
                    <table align="center">
                      <tbody>
                        <tr align="center">
                          <td><span style="font-size: x-small;"><b>PERHITUNGAN SPPD RAMPUNG<b></span></td>
                        </tr>
                        <tr align="center">
                          <table align="center">
                            <tbody>
                              <tr>
                                <td><span style="font-size: x-small;">Ditetapkan sejumlah</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;">Rp.</span></td>
                                <td><span style="font-size: x-small; align: right">{{number_format( $e->t_all, 0 , '' , '.')}}</span></td>
                              </tr>
                              <tr>
                                <td><span style="font-size: x-small;">Yang telah dibayar semula</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;">Rp.</span></td>
                                <td><span style="font-size: x-small; align: right">{{number_format( $e->t_all, 0 , '' , '.')}}</span></td>
                              </tr>
                              <tr>
                                <td><span style="font-size: x-small;">Sisa kurang/lebih</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;">Rp.</span></td>
                                <td><span style="font-size: x-small; align: right">-</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </tr>

                        <!-- <tr align="center">
                          <td><span style="font-size: x-small;">Pejabat Pembuat Komitmen</span></td>
                        </tr>
                        <tr align="center">
                          <td><span style="font-size: x-small;">Biro Kepegawaian dan Organisasi</span></td>
                        </tr>
                        <tr align="center">
                          <td><span style="font-size: x-small;"><br><br><br></span></td>
                        </tr>
                        <tr align="center">
                          <td><span style="font-size: x-small;"><b>ISNALDI, S.Kom</b></span></td>
                        </tr>
                        <tr align="center">
                          <td><span style="font-size: x-small;"><b>NIP. 19750730 200604 1 000</b></span></td>
                        </tr> -->
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <table align="center">
              <tbody>
                <tr>
                  <td align="center">
                    <span style="font-size: x-small;">Pejabat Pembuat Komitmen</span> <br>
                    <span style="font-size: x-small;">Biro Kepegawaian dan Organisasi</span> <br>
                    <span style="font-size: x-small;"><br><br><br></span> <br>
                    <span style="font-size: x-small;"><b>{{$e->pejabat}}</b></span> <br>
                    <span style="font-size: x-small;"><b>NIP. {{$e->nip_pejabat}}</b></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    @endforeach

    <div class="page-break"></div>

    @foreach($event as $e)
  <table align="center" border="0" cellpadding="1" style="width: 595px;">
    <tbody>
      <tr>
        <td>
          <div align="center">
            <span style="font-family: Verdana; font-size:small;"><b>DAFTAR PENGELUARAN RIIL</b></span>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <table border="0" align="justify">
            <tbody>
              <tr>
                <td colspan="2">
                  <span style="font-size: x-small;">Yang bertandatangan dibawah:</span>
                </td>
              </tr>
              <tr>
                <td width="70" align="left"><span style="font-size: x-small;">Nama</span></td>
                <td width="" align="left"><span style="font-size: x-small;">: {{$e->nama}}</span></td>
              </tr>
              <tr>
                <td align="left"><span style="font-size: x-small;">N I P</span></td>
                <td align="left"><span style="font-size: x-small;">: {{$e->nip}}</span></td>
              </tr>
              <tr>
                <td align="left"><span style="font-size: x-small;">Jabatan</span></td>
                <td align="left"><span style="font-size: x-small;">: {{$e->jabatan}}</span></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td style="text-align: justify;">
          <table>
            <tbody>
              <tr>
                <td colspan="3">
                  <span style="font-size: x-small; text-align: justify;">
                      Berdasarkan Surat Perjalanan Dinas (SPD) Nomor: &nbsp;&nbsp;&nbsp;/SPD/SJ.2/ &nbsp;&nbsp;&nbsp;/2018 Tanggal {{strftime("%d %B %Y", strtotime($e->created_at))}} dengan ini kami menyatakan dengan sesungguhnya bahwa:
                    </span>
                </td>
              </tr>
              <tr>
                <td width="" valign="top">
                  <span style="font-size: x-small; text-align: justify;">1.</span>
                </td>
                <td width="500" colspan="2">
                  <span style="font-size: x-small; text-align: justify;">Biaya transport pegawai dan/atau biaya penginapan dibawah ini yang tidak dapat diperoleh bukti-bukti pengeluarannya, meliputi:</span>
                </td>
              </tr>
              <tr>
                <td></td>
                <td width="500" colspan="2">
                  <table border="1" align="justify" style="border-collapse: collapse;">
                    <tbody>
                      <tr>
                        <td align="center"><span style="font-size: x-small;"><b>NO.<b></span></td>
                        <td align="center"><span style="font-size: x-small;"><b>PERINCIAN BIAYA<b></span></td>
                        <td colspan="2" align="center"><span style="font-size: x-small;"><b>JUMLAH<b></span></td>
                      </tr>
                      <tr>
                        <td width="30px" align="center"><span style="font-size: x-small;">1.</span></td>
                        <td width="150px" align="left"><span style="font-size: x-small;">Transport : <br>{{$e->berangkat}} - {{$e->tujuan}} pp</span></td>
                        <td width="150px" align="center" style="border-right:0;"><span style="font-size: x-small;">Rp </span></td>
                        <td width="10px" align="right" style="border-left:0;"><span style="font-size: x-small;">@if ($e->h_ku == '0') {{number_format( $e->t_transport, 0 , '' , '.')}} @else {{number_format( $e->t_ku, 0 , '' , '.')}} @endif</span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center"><span style="font-size: x-small;"><b>JUMLAH<b></span></td>
                        <td align="center" style="border-right:0;"><span style="font-size: x-small;">Rp. </span></td>
                        <td align="right" style="border-left:0;"><span style="font-size: x-small;">@if ($e->h_ku == '0') {{number_format( $e->t_transport, 0 , '' , '.')}} @else {{number_format( $e->t_ku, 0 , '' , '.')}} @endif</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td width="" valign="top">
                  <span style="font-size: x-small;">2.</span>
                </td>
                <td colspan="2">
                  <span style="font-size: x-small; text-align: justify;">Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk pelaksanaan perjalanan dinas dimaksud dan apabila di kemudian hari terdapat kelebihan atas pembayaran kami bersedia untuk menyetorkan kelebihan tersebut ke Kas Negara.</span>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <span style="font-size: x-small;">Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</span>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table border="0" align="center">
            <tbody>
              <tr>
                <td width="297.5px" align="center"><span style="font-size: x-small;"></span></td>
                <td width="297.5px" align="center"><span style="font-size: x-small;">Jakarta, {{strftime("%d %B %Y", strtotime($e->created_at))}}</span></td>
              </tr>
              <tr>
                <td align="center"><span style="font-size: x-small;">Mengetahui/Menyetujui,</span></td>
                <td align="center"><span style="font-size: x-small;"></span></td>
              </tr>
              <tr>
                <td align="center"><span style="font-size: x-small;">Pejabat Pembuat Komitmen</span></td>
                <td align="center"><span style="font-size: x-small;">Pejabat Negara/Pegawai Negeri</span></td>
              </tr>
              <tr>
                <td align="center"><span style="font-size: x-small;">Biro Kepegawaian dan Organisasi</span></td>
                <td align="center"><span style="font-size: x-small;">yang melakukan Perjalanan Dinas</span></td>
              </tr>
              <tr>
                <td align="center"><span style="font-size: x-small;"><br><br><br></span></td>
              </tr>
              <tr>
                <td align="center"><span style="font-size: x-small;"><b>{{$e->pejabat}}</b></span></td>
                <td align="center"><span style="font-size: x-small;"><b>{{$e->nama}}</b></span></td>
              </tr>
              <tr>
                <td align="center"><span style="font-size: x-small;">NIP. {{$e->nip_pejabat}}</span></td>
                <td align="center"><span style="font-size: x-small;">NIP. {{$e->nip}}</span></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  @endforeach

  <div class="page-break"></div>

  @foreach($event as $e)
    <table   align="center" border="1" cellpadding="1" style="width: 595px; border-collapse: collapse; border-width:5px; border-style: double;">
      <tbody>
        <tr>
          <td >
            <div align="center">
              <span style="font-family: Verdana; font-size:small;"><b>KEMENTERIAN KOMUNIKASI DAN INFORMATIKA</b></span>
              <br>
              <span style="font-family: Verdana; font-size:small;"><b>SEKRETARIAT JENDERAL BIRO KEPEGAWAIAN DAN ORGANISASI</b></span>
              <br>
              <span style="font-family: Verdana; font-size:small;"><b>SURAT PERINTAH PEMBAYARAN</b></span>
              <br>
              <span style="font-family: Verdana; font-size:small;"><b>Nomor : </b></span>
            </div>
          </td>
        </tr>
        <tr>
          <td style="text-align:justify; padding: 0 10px 10px 10px;">
            <span style="font-family: Verdana; font-size:x-small;">Saya yang bertanda tangan dibawah ini selaku Pejabat Pembuat Komitmen memerintahkan Bendahara Pengeluaran/Bendahara Pengeluaran Pembantu agar melakukan pembayaran sejumlah</span>
          </td>
        </tr>
        <tr>
          <td style="text-align:justify; padding: 0 10px 10px 10px;">
            <span style="font-family: Verdana; font-size:x-small;"><b>Rp. {{number_format( $e->t_all, 0 , '' , '.')}}<b></span>
          </td>
        </tr>
        <tr>
          <td style="text-align:justify; padding: 0 10px 10px 10px;">
            <span style="font-family: Verdana; font-size:x-small;"><b>Terbilang: {{$e->terbilang}} rupiah<b></span>
          </td>
        </tr>
        <tr>
          <td>
            <table>
              <tbody>
                <tr>
                  <td style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;">Kepada</span></td>
                  <td width="5px" style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;">:</span></td>
                  <td style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;">{{$e->nama}}</span></td>
                </tr>
                <tr>
                  <td width="25%" style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;">Untuk Pembayaran</span></td>
                  <td style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;">:</span></td>
                  <td style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;">Biaya Perjalanan Dinas a.n. {{$e->nama}} dalam rangka:</span></td>
                </tr>
                <tr>
                  <td width="25%" style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;"></span></td>
                  <td style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;">:</span></td>
                  <td style="text-align:justify; padding: 0 10px 10px 10px;"><span style="font-family: Verdana; font-size:x-small;">{{$e->maksud}} {{strftime("%d %B %Y", strtotime($e->tanggal_berangkat))}} - {{strftime("%d %B %Y", strtotime($e->tanggal_kembali))}} {{$e->berangkat}} - {{$e->tujuan}} pp</span></td>
                </tr>
                <tr>
                  <td width="25%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Atas Dasar</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"></span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"></span></td>
                </tr>
                <tr>
                  <td width="25%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">1. Kuitansi/bukti</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">:</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Terlampir</span></td>
                </tr>
                <tr>
                  <td width="25%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">2. Nota/bukti</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">:</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">-</span></td>
                </tr>
                <tr>
                  <td width="25%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Dibebankan pada</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"></span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"></span></td>
                </tr>
                <tr>
                  <td width="25%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Kegiatan, Out, MAK</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">:</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">{{$e->keluaran}}.{{$e->komponen}}.{{$e->sub}}.{{$e->akun}}</span></td>
                </tr>
                <tr>
                  <td width="25%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Kode</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">:</span></td>
                  <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"></span></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td>
          <table align="center">
            <tbody>
              <tr>
                <td width="33%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"></span></td>
                <td width="33%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"></span></td>
                <td width="33%" style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Jakarta, {{strftime("%d %B %Y", strtotime($e->created_at))}}</span></td>
              </tr>
              <tr>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Setuju/Lunas dibayar</span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Diterima</span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">a.n. Kuasa Pengguna Anggaran</span></td>
              </tr>
              <tr>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Jakarta, {{strftime("%d %B %Y", strtotime($e->created_at))}}</span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Jakarta, {{strftime("%d %B %Y", strtotime($e->created_at))}}</span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Pejabat Pembuat Komitmen</span></td>
              </tr>
              <tr>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Bendahara</span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Penerima Uang</span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">Biro Kepegawaian dan Organisasi</span></td>
              </tr>
              <tr>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"><br><br><br></span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"><br><br><br></span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"><br><br><br></span></td>
              </tr>
              <tr>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"><u>{{$e->bendahara}}<u></span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"><u>{{$e->nama}}<u></span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;"><u>{{$e->pejabat}}<u></span></td>
              </tr>
              <tr>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">NIP. {{$e->nip_bendahara}}</span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">NIP. {{$e->nip}}</span></td>
                <td style="text-align:justify; padding: 0 0px 0px 10px;"><span style="font-family: Verdana; font-size:x-small;">NIP. {{$e->nip_pejabat}}</span></td>
              </tr>
            </tbody>
          </table>
        </tr>
        </td>
      </tbody>
    </table>
    @endforeach

  </body>
</html>
