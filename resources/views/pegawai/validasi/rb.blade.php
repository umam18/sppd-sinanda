@extends('admin.validasi.base2')
@section('action-content')
    <!-- Main content -->
    <section class="content">

  <div class="box-header">
<head>

    <link rel="stylesheet" href="{{ asset('css/rincian.css') }}">

<style type="text/css">
.jsonSuggest { font-size:0.8em; }
</style>

<script src="{{ asset('js/myscript.js') }}"></script>
</head>

<form method="POST" id="myForm" name="vform" onsubmit="return Validate()" action="{{ route('rincian.update', ['id' => $spd->id]) }}">
                        {{ csrf_field() }}

              <input value="{{ $spd->pejabat }}"  hidden id="nama" name="pejabat" required>
              </input>

              <input hidden value="{{ $spd->posisi }}" type="text" size="35" name="posisi" required></input>

              <input  hidden id="nip" value="{{ $spd->nip_pejabat }}" name="nip_pejabat" required>
              </input>

              <input  hidden value="{{ $spd->bendahara }}" hidden id="bendahara" name="bendahara" required>
              </input>

              <input  hidden value="{{ $spd->nip_bendahara }}" hidden id="nip_bendahara" name="nip_bendahara" required>
              </input>

              <input hidden readonly value="{{ $spd->nama }}" size="35" name="nama" required></input>

            <input hidden value="{{ $spd->nip }}" name="nip" size="42" required></input>

            <input hidden value="{{$spd->pangkat}}" size="42" name="pangkat" required></input>

            <input hidden value="{{$spd->jabatan}}" size="42" name="jabatan" required></input>

            <input hidden value="{{$spd->biaya}}" size="1" name="biaya" required></input>


              <input hidden value="{{ $spd->maksud }}" name="maksud" type = "text area" placeholder = "Maksud Perjalanan Dinas" size="42" required></input>

              <input hidden readonly size="35" value="Kota Administrasi Jakarta Pusat" name="berangkat"></input>

              <input  value="{{ $spd->tujuan }}"  hidden name="tujuan"  required>
              </input>

              <input value="{{ $spd->transportasi }}"  hidden id="angkut" name="transportasi" required>
              </input>

                <input hidden value="{{ $spd->tanggal_berangkat }}"  type="date" name="tanggal_berangkat" required></input>


                <input hidden value="{{ $spd->tanggal_kembali }}" type="date" name="tanggal_kembali" required></input>

              <input hidden value="{{ $spd->lama }}" type="number" name="lama"></input>

              <input value="{{ $spd->keluaran }}"  hidden id="angkut" name="keluaran"  required>
              </input>

              <input value="{{ $spd->komponen }}"  hidden id="angkut" name="komponen"  required>
              </input>

              <input value="{{ $spd->sub }}"  hidden id="angkut" name="sub"  required>
              </input>

              <input value="{{ $spd->akun }}"  hidden id="angkut" name="akun" required>
              </input>

              <input hidden value="{{ $spd->ket }}" name="ket" type="text" placeholder = "Keterangan Lain-Lain" size="42" required>
              <input hidden name="status" value="0"></input>

        <center>

        <h2 class="title"><b>Rincian Bisaya</b></h2>
        <hr style="border-width: 2px; border-color: black;"></hr>


                <h3><center>UANG TRANSPORT</center></h3>
                <div class="form-group">
                    <label>Transport</label>
                    <input value="{{ $spd->h_ku }}" id="trspt-ht" type="text" name="h_ku" placeholder=" Harga Transportasi" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                    <input value="{{ $spd->t_ku }}" id="trspt-tht" type="text" name="t_ku" placeholder=" Total" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                </div>
                <div class="form-group">
                    <label>Tiket</label>
                    <input value="{{ $spd->no_berangkat }}" type="text" name="no_berangkat" placeholder="No Tiket Berangkat" class="form-control"/>
                    <input value="{{ $spd->no_kembali }}" type="text" name="no_kembali" placeholder="No Tiket Pulang" class="form-control"/>
                    <input value="{{ $spd->h_tiket }}" id="tkt-ht" type="number" name="h_tiket" placeholder="Harga Tiket" class="form-control"/>
                    <input value="{{ $spd->t_transport }}" id="tkt-tht" type="number" name="t_transport" placeholder="Total" class="form-control prc"/>
                </div>

                <h3><center>UANG PENGINAPAN</center></h3>
                <div class="form-group">
                    <label>Penginapan</label>
                    <input value="{{ $spd->n_penginapan }}" type="text" name="n_penginapan" placeholder="Nama Penginapan" class="form-control"/>
                    <input value="{{ $spd->j_penginapan }}" id="pgp-jml" type="number" name="j_penginapan" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                    <input value="{{ $spd->h_penginapan }}" id="pgp-ht" type="number" name="h_penginapan" placeholder="Harga Tetap" class="form-control"/>
                    <input value="{{ $spd->t_penginapan }}" id="pgp-st" type="text" name="t_penginapan" placeholder="Total" class="form-control prc"/>
                </div>

                <h3><center>UANG HARIAN</center></h3>
                <div class="form-group">
                    <label>Harian Normal</label>
                    <input value="{{ $spd->j_hn }}" min="0" id="hn-jml" name="j_hn" type="number" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                    <input value="{{ $spd->h_hn }}" id="hn-ht" type="number" name="h_hn" placeholder="Harga Tetap" class="form-control"/>
                    <input value="{{ $spd->t_hn }}" id="hn-st" type="number" name="t_hn" placeholder="Total" class="form-control prc"/>
                </div>

                <div class="form-group">
                    <label>Full Day</label>
                    <input value="{{ $spd->j_fd }}" id="fd-jml" type="number" name="j_fd" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                    <input value="{{ $spd->h_fd }}" id="fd-ht" type="number" name="h_fd" placeholder="Harga Tetap" class="form-control"/>
                    <input value="{{ $spd->t_fd }}" id="fd-st" type="number" name="t_fd" placeholder="Total" class="form-control prc"/>
                </div>

                <div class="form-group">
                    <label>Full Board</label>
                    <input value="{{ $spd->j_fb }}" id="fb-jml" type="number" name="j_fb" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                    <input value="{{ $spd->h_fb }}" id="fb-ht" type="number" name="h_fb" placeholder="Harga Tetap" class="form-control"/>
                    <input value="{{ $spd->t_fb }}" id="fb-st" type="number" name="t_fb" placeholder="Total" class="form-control prc"/>
                </div>

                <div class="form-group">
                    <label>Diklat</label>
                    <input value="{{ $spd->j_diklat }}" id="dkl-jml" type="number" name="j_diklat" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                    <input value="{{ $spd->h_diklat }}" id="dkl-ht" type="number" name="h_diklat" placeholder="Harga Tetap" class="form-control"/>
                    <input value="{{ $spd->t_diklat }}" id="dkl-st" type="number" name="t_diklat" placeholder="Total" class="form-control prc"/>
                </div>

                <div class="form-group">
                    <label>Total Uang Harian</label></br>
                    <input value="{{ $spd->t_uh }}" readonly class="form-control" name="t_uh" id="result"/>
                </div>

                <div class="form-group">
                    <label>Total Uang Keseluruhan</label></br>
                    <input value="{{ $spd->t_all }}" readonly class="form-control" name="t_all" id="t_keseluruhan"/>
                </div>

                <div class="form-group">
                    <label>Terbilang</label></br>
                    <input value="{{ $spd->terbilang }}" readonly size="150" id="terbilang" name="terbilang"/>
                </div>

                <input hidden name="status" value="0">

        <center></br><input class="submit_btn" type="submit" value="Submit"></center>
  </form>

  <script type="text/javascript">
      $(".livesearch").chosen();
  </script>

  <script language="javascript" src="{{ asset('js/jquery.min.js') }}"></script>

          <script>
            $(document).ready(function () {
                $("#nama").change(function () {
                    var val = $(this).val();
                    if (val == "NURUL HUDA SE, M.SI") {
                        $("#nip").html("<option value='196804101991032003' selected>196804101991032003</option>");
                        $("#bendahara").html("<option value='ANKA RAHARJA' selected>ANKA RAHARJA</option>");
                        $("#nip_bendahara").html("<option value='198402122009121002' selected>198402122009121002</option>");
                    } else if (val == "MARYADI") {
                        $("#nip").html("<option value='196008281982031006' selected>196008281982031006</option>");
                         $("#bendahara").html("<option value='WINIH' selected>WINIH</option>");
                        $("#nip_bendahara").html("<option value='196610031986032001' selected>196610031986032001</option>");
                    }
                });
            });
        </script>

  <script language="javascript" src="{{ asset('js/operasi.js') }}"></script>
  <script language="javascript" src="{{ asset('js/terbilang.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/jquery-1.4.4.min.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/jquery.jsonSuggest-2.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/testData.js') }}"></script>

        </div>
        <div class="box-body">
      </div>
</section>
@endsection
