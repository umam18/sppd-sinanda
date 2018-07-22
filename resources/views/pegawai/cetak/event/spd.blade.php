<?php 
  setlocale(LC_ALL, 'IND');
  setlocale(LC_ALL, 'id_ID');
  date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE>
<html>

<head>
  <meta charset="utf-8">
  <title>Surat Perintah Perjalanan Dinas</title>
</head>

<body>
  @foreach($spd as $s)
  <table align="center" border="0" cellpadding="1" style="width: 	595px;">
    <tbody>
      <tr>
        <td>
          <table>
            <tbody>
              <tr>
                <td width="52%"></td>
                <td colspan="2" style="text-align:justify;">
                  <span style="font-family: Verdana; font-size: x-small;"><b>LAMPIRAN I</b></span>
                    <br>
                  <span style="font-family: Verdana; font-size: x-small;">
                    PERATURAN MENTERI KEUANGAN, NOMOR: 113/PMK.05/2012 TENTANG PERJALANAN DINAS JABATAN DALAM NEGERI BAGI PEJABAT NEGARA, PEGAWAI NEGERI, DAN PEGAWAI TIDAK TETAP.
                    <br>
                  </span>
                </td>
              </tr>
              <tr>
                <td style="text-align: left;">
                  <span style="font-size: x-small;">
                    <b>
                      <br>
                      KEMENTERIAN NEGARA/LEMBAGA: <br>
                      KEMENTERIAN KOMUNIKASI DAN INFORMATIKA
                      <br>
                    </b>
                  </span>
                </td>
              </tr>
              <tr>
                <td width="55%"> </td>
                <td width="10%" style="text-align:justify;">
                  <span style="font-family: Verdana; font-size: x-small;">Lembar Ke</span>
                  <br>
                  <span style="font-family: Verdana; font-size: x-small;">Kode No</span>
                  <br>
                  <span style="font-family: Verdana; font-size: x-small;">Nomor</span>
                  <br>
                </td>
                <td style="text-align:justify;">
                  <span style="font-family: Verdana; font-size: x-small;">: Lembar ke 1</span>
                  <br>
                  <span style="font-family: Verdana; font-size: x-small;">: -</span>
                  <br>
                  <span style="font-family: Verdana; font-size: x-small;">:&nbsp; &nbsp;&nbsp;/SPD/SJ.2/&nbsp;&nbsp;&nbsp;/2018</span>
                  <br>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <div align="center">
            <br>
            <span style="font-family: Verdana; font-size: x-small;"><b>SURAT PERJALANAN DINAS (SPD)</b></span>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <span>
            <br>
          </span>
        </td>
      </tr>
      <tr>
        <td>
          <table border="1" align="center" style="border-collapse: collapse;">
            <tbody>
              <tr>
                <td width="4%"><span style="font-size: x-small;">1.</span></td>
                <td width="42%"><span style="font-size: x-small;">Pejabat Berwenang Yang Memberi Perintah</span></td>
                <td width="54%" colspan="2"><span style="font-size: x-small;"><b>{{$s->pejabat}}<b></span></td>
              </tr>
              <tr>
                <td ><span style="font-size: x-small;">2.</span></td>
                <td>
                  <table>
                    <tbody>
                      <tr>
                        <td ><span style="font-size: x-small;">Nama/NIP Pegawai yang melaksanakan perjalanan dinas</span></td>
                      </tr>
                      <tr>
                        <td ><span style="font-size: x-small;"></span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td colspan="2">
                  <table>
                    <tbody>
                      <tr>
                        <td ><span style="font-size: x-small;"><b>{{$s->nama}}<b></span></td>
                      </tr>
                      <tr>
                        <td ><span style="font-size: x-small;"><b>NIP. {{$s->nip}}<b></span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td><span style="font-size: x-small;">3.</span></td>
                <td>
                  <table>
                    <tbody>
                      <tr>
                        <td><span style="font-size: x-small;">a. Pangkat dan Golongan</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">b. Jabatan/Instansi</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">c. Tingkat Biaya Perjalanan Dinas</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td colspan="2">
                  <table>
                    <tbody>
                      <tr>
                        <td><span style="font-size: x-small;">a. {{$s->pangkat}} </span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">b. {{$s->jabatan}} </span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">c. {{$s->biaya}}</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td><span style="font-size: x-small;">4.</span></td>
                <td><span style="font-size: x-small;">Maksud Perjalanan Dinas</span></td>
                <td colspan="2"><span style="font-size: x-small;">{{$s->maksud}}</span></td>
              </tr>
              <tr>
                <td><span style="font-size: x-small;">5.</span></td>
                <td><span style="font-size: x-small;">Alat Angkut yang Dipergunakan</span></td>
                <td colspan="2"><span style="font-size: x-small;">{{$s->transportasi}}</span></td>
              </tr>
              <tr>
                <td><span style="font-size: x-small;">6.</span></td>
                <td>
                  <table>
                    <tbody>
                      <tr>
                        <td><span style="font-size: x-small;">a. Tempat Berangkat</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">b. Tempat Tujuan</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td colspan="2">
                  <table>
                    <tbody>
                      <tr>
                        <td><span style="font-size: x-small;">a. {{$s->berangkat}}</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">b. {{$s->tujuan}}</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td><span style="font-size: x-small;">7.</span></td>
                <td>
                  <table>
                    <tbody>
                      <tr>
                        <td><span style="font-size: x-small;">a. Lama Perjalanan Dinas</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">b. Tanggal Berangkat</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">c. Tanggal Harus Kembali</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td colspan="2">
                  <table>
                    <tbody>
                      <tr>
                        <td><span style="font-size: x-small;">a. {{$s->lama}} </span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">b. {{strftime("%d %B %Y", strtotime($s->tanggal_berangkat))}}</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">c. {{strftime("%d %B %Y", strtotime($s->tanggal_kembali))}}</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td><span style="font-size: x-small;">8.</span></td>
                <td>
                  <table>
                    <tbody>
                      <tr>
                        <td><span style="font-size: x-small;">Pembebanan Anggaran</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">a. Instansi</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">b. Mata Anggaran</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td colspan="2">
                  <table>
                    <tbody>
                      <tr>
                        <td><span style="font-size: x-small;"></span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">a. Sekretariat Jendral Kementerian Komunikasi dan Informatika</span></td>
                      </tr>
                      <tr>
                        <td><span style="font-size: x-small;">b. {{$s->keluaran}}.{{$s->komponen}}.{{$s->sub}}.{{$s->akun}} </span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td><span style="font-size: x-small;">9.</span></td>
                <td><span style="font-size: x-small;">Keterangan Lain</span></td>
                <td colspan="2"><span style="font-size: x-small;">{{$s->ket}}</span></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table border="0" align="right">
            <tbody>
              <tr>
                <td width="60%">
                  <span style="font-size: x-small;"></span>
                </td>
                <td>
                  <table>
                    <tbody>
                      <tr align="left">
                        <td><span style="font-size: x-small;"><br><br>Dikeluarkan di</span></td>
                        <td><span style="font-size: x-small;"><br><br>: <b>J a k a r t a<b></span></td>
                      </tr>
                      <tr align="left">
                        <td><span style="font-size: x-small;">Pada Tanggal</span></td>
                        <td><span style="font-size: x-small;">: {{strftime("%d %B %Y", strtotime($s->created_at))}}</span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><hr></td>
                      </tr>
                      <tr align="center">
                        <td colspan="2"><span style="font-size: x-small;">Pejabat Pembuat Komitmen</span></td>
                      </tr>
                      <tr align="center">
                        <td colspan="2"><span style="font-size: x-small;">Biro Kepegawaian dan Organisasi</span></td>
                      </tr>
                      <tr align="center">
                        <td colspan="2"><span style="font-size: x-small;"><br><br><br></span></td>
                      </tr>
                      <tr align="center">
                        <td colspan="2"><span style="font-size: x-small;"><b>{{$s->pejabat}}<b></span></td>
                      </tr>
                      <tr align="center">
                        <td colspan="2"><span style="font-size: x-small;"><b>NIP. {{$s->nip_pejabat}}<b></span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  @endforeach
</body>
</html>
