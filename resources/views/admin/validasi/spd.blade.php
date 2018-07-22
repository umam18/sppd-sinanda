@extends('admin.validasi.base2')
@section('action-content')
    <!-- Main content -->
    <section class="content">

<div class="box-header">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/rincian.css') }}">
    <link rel="stylesheet" href="{{ asset('css/input.css') }}">
</head>
 
        @if(session()->has('update_spd'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('update_spd')}} </strong> <!-- update event -->
          </div>
        </div>
        @endif  

      <h2><b><center>EDIT SPD Individu</center></b></h2>
        <button onclick="myFunction()">Edit</button>
        <form method="post" action="{{ route('validasi.update', ['id' => $spd->id]) }}" onsubmit="return confirm('Are you sure to Vaidate?')">
              <input type="hidden" name="_method" value="PATCH">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input hidden name="status" value="{{ $spd -> status}}">
              <button id="valid" style="margin-top: 10px;" type="submit">Validasi</button>
        </form>
      <hr style="border-width: 2px; border-color: black;"></hr>

<form method="POST" id="myForm" name="vform" action="{{ route('spd.update', ['id' => $spd->id]) }}" enctype="multipart/form-data">
{{ csrf_field() }}

              <input hidden id="nama" name="pejabat" value="{{$spd->pejabat}}" required></input>
            
              <input hidden id="nip" name="nip_pejabat" value="{{$spd->nip_pejabat}}" required></input>

              <input hidden id="bendahara" name="bendahara" value="{{$spd->bendahara}}" required></input>

              <input hidden id="nip_bendahara" value="{{$spd->nip_bendahara}}" name="nip_bendahara" required></input>

            <input hidden value="{{$spd->nip}}" name="nip" size="42" required></input>

            <input hidden value="{{$spd->pangkat}}" size="42" name="pangkat" required></input>

            <input hidden value="{{$spd->jabatan}}" size="42" name="jabatan" required></input>

            <input hidden value="{{$spd->biaya}}" size="1" name="biaya" required></input>


            <input hidden value="{{$spd->maksud}}" name="maksud" type = "text area" placeholder = "Maksud Perjalanan Dinas" size="42" required>
            
            <input hidden size="35" value="{{$spd->berangkat}}" name="berangkat" required></input></td>

                <input hidden name="tujuan" value="{{$spd->tujuan}}" required></input>
                <input hidden name="keluaran" value="{{$spd->keluaran}}" required></input>
                <input hidden value="{{$spd->komponen}}" name="komponen" required></input>
                <input hidden value="{{$spd->sub}}" name="sub" required></input>
                <input hidden value="{{$spd->akun}}" name="akun" required></input>

            <div id="event">
              <div class="pejabat">
              <h4>Nama Pegawai</h4>
              <input disabled readonly value="{{$spd->nama}}" name="nama" id="1" required></input>
              </div>

              <div class="pejabat">
              <h4>Transportasi</h4>
                <select disabled id="alatangkut" name="transportasi" required>
                <option hidden value="{{$spd->transportasi}}">{{$spd->transportasi}}</option>
                <option value="Pesawat">Pesawat</option>
                <option value="Angkutan Darat">Angkutan Darat</option>
                <option value="Angkutan Darat (Kereta Api)">Angkutan Darat (Kereta Api)</option>
              </select>
              </div>

              <div class="pejabat">
              <h4 hidden>Tanggal Berangkat</h4>
              <input hidden value="{{$spd->tanggal_berangkat}}" type="date" name="tanggal_berangkat" required></input>  </div>

              <div class="pejabat">
              <h4>Sebagai</h4>
                <select disabled id="2" name="posisi" required>
                <option hidden value="{{$spd->posisi}}">{{$spd->posisi}}</option>
                <option value="PEMBICARA">PEMBICARA</option>
                <option value="MODERATOR">MODERATOR</option>
                <option value="PANITIA">PANITIA</option>
                <option value="PESERTA">PESERTA</option>
                <option value="SOPIR">SOPIR</option>
              </select>
              </div>


              <input hidden value="{{$spd->tanggal_kembali}}" type="date" name="tanggal_kembali" required></input>
              <input hidden value="{{$spd->lama}}" type="number" name="lama" required></input>  

            <div class="event">
              <div id="angkutan" class="transportasi">
              </div>
            </div>

            </div>

                <div id="TPK" class="form-group">
				          @if ($spd->transportasi != 'Angkutan Darat')
                  <label>Pesawat / KA</label><input style="width:130px;" required type="text" placeholder="Nama Pesawat Berangkat" name="n_transport" disabled value="{{$spd->n_transport}}" class="form-control"></input><input style="width:120px;" required type="text" name="no_berangkat" disabled value="{{$spd->no_berangkat}}" placeholder="No Tiket Berangkat" class="form-control"></input><input required id="tkt-ht" type="number" min="0" name="h_tiket" disabled value="{{$spd->h_tiket}}" placeholder="Harga Tiket Berangkat" class="form-control"></input><input style="width:130px;" placeholder="Nama Pesawat Kembali " required type="text" name="nk_transport" disabled value="{{$spd->nk_transport}}" class="form-control"></input><input required type="text" name="no_kembali" disabled value="{{$spd->no_kembali}}" style="width:120px;" placeholder="No Tiket Kembali" class="form-control"></input><input required placeholder="Harga Tiket Kembali" id="tkt-htp" type="number" name="h_tiketp" disabled value="{{$spd->h_tiketp}}" min="0" class="form-control"></input><input placeholder="Total Harga Tiket" required id="tkt-tht" name="t_transport" disabled value="{{$spd->t_transport}}" class="form-control prc" min="2"></input>
                @endif
                </div>

                <div id="TKU" class="form-group">
                  <label>Kendaraan Umum</label>
                  <input readonly required value="{{$spd->h_ku}}" id="trspt-ht" type="text" name="h_ku" placeholder=" Harga Transportasi" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                  <input id="trspt-tht" type="text" value="{{$spd->t_ku}}" hidden name="t_ku"></input>
                </div>

                <div id="UP" class="form-group">
                  <label>Uang Penginapan</label>
                  <input type="text" disabled value="{{$spd->n_penginapan}}" id="up1" name="n_penginapan" placeholder="Nama Penginapan" class="form-control"></input>
                  <input id="pgp-jml" type="number" placeholder="Jumlah" name="j_penginapan" disabled value="{{$spd->j_penginapan}}" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                  <input id="pgp-ht" disabled type="number"value="{{$spd -> h_penginapan}}" name="h_penginapan" placeholder="Harga Tetap" class="form-control"></input>
                  <input id="pgp-st" disabled value="{{$spd->t_penginapan}}" name="t_penginapan" placeholder="Total" class="form-control prc"></input>
                </div>

                <div id="HN" class="form-group">
                </div>
                  <label>Uang Harian</label>
                  <input min="0" id="hn-jml" disabled name="j_hn" type="number" name="j_hn" value="{{$spd->j_hn}}" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                  <input id="hn-ht" disabled readonly value="{{$spd->h_hn}}" name="h_hn" placeholder="Harga Tetap" class="form-control"></input>
                  <input id="hn-st" disabled value="{{$spd->t_hn}}" name="t_hn" value="t_hn" class="form-control prc"></input>

                <div id="FD" class="form-group">
                  <label>Full Day</label>
                  <input disabled id="fd-jml" type="number" name="j_fd" value="{{$spd->j_fd}}" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                  <input disabled id="fd-ht" readonly value="{{$spd->h_fd}}" type="number" name="h_fd" placeholder="Harga Tetap" class="form-control"></input>
                  <input disabled id="fd-st" value="{{$spd->t_fd}}" name="t_fd" placeholder="Total" class="form-control prc"></input>
                </div>

                <div id="FB" class="form-group">
                  <label>Full Board</label>
                  <input disabled min="0" id="fb-jml" type="number" name="j_fb" value="{{$spd->j_fb}}"  class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                  <input disabled id="fb-ht" readonly value="{{$spd->h_fb}}" type="number" name="h_fb" placeholder="Harga Tetap" class="form-control"></input>
                  <input disabled id="fb-st" name="t_fb" value="{{$spd->t_fb}}" class="form-control prc"></input>
                </div>

                <div id="diklat" class="form-group">
                  <label>Diklat</label>
                  <input disabled min="0" id="dkl-jml" type="number" name="j_diklat" value="{{$spd->j_diklat}}" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                  <input disabled id="dkl-ht" readonly value="{{$spd->h_diklat}}" type="number" name="h_diklat" placeholder="Harga Tetap" class="form-control"></input>
                  <input disabled id="dkl-st" value="{{$spd->t_diklat}}" name="t_diklat" placeholder="Total" class="form-control prc"></input>
                </div>

                <div class="form-group">
                  <label>Representatif</label>
                  <input disabled min="0" id="rpr-jml" type="number" name="j_rpr" value="{{$spd->j_rpr}}" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                  <select disabled id="rpr-ht" type="number" name="h_rpr">
                    <option hidden value="{{$spd->h_rpr}}">{{$spd->h_rpr}}</option>
                    <option value="150000">150000</option>
                    <option value="200000">200000</option>
                  </select>
                  <input disabled id="rpr-st" value="{{$spd->t_rpr}}" name="t_rpr" placeholder="Total" class="form-control prc"></input>
                </div>

                <div class="form-group">
                <label>Rincian Biaya (RB) = KU + UH + FD + FB + Dilat + Representatif</label>
                    <input name="t_uh" value="{{$spd->t_uh}}" id="result"></input>
                </div>

                <div class="form-group">
                <label>Total = Tiket + Penginapan + RB</label>
                    <input name="t_all" value="{{$spd->t_all}}" id="t_keseluruhan"></input>
                </div>

                <div class="form-group">
                    <input hidden size="150" value="{{$spd->terbilang}}" id="terbilang" name="terbilang"></input>
                </div>

                <input hidden name="status" value="0"></input>

                <div class="form-group">
                    <div class="col-md-1 col-md-offset-5">
        <center>
          <button disabled id="update" type="submit">Simpan</button>
        </center>
      </div>
    </div>
  </form>

          <button onclick="goBack()">Kembali</button>

  <script type="text/javascript">
      $(".livesearch").chosen();
  </script>

  <script>
	function goBack() 
	{
	    window.history.back()
	}
</script>

    <script type="text/javascript">
	$('#alatangkut').change(function(){
	    var val = $(this).val();
	    if (val != "Angkutan Darat") {
	       $("#TPK").empty();
	       $("#TPK").append('<label>Pesawat / KA</label><input style="width:130px;" required type="text" placeholder="Nama Pesawat Berangkat" name="n_transport" value="{{$spd->n_transport}}" class="form-control"></input><input style="width:120px;" required type="text" name="no_berangkat" value="{{$spd->no_berangkat}}" placeholder="No Tiket Berangkat" class="form-control"></input><input required id="tkt-ht" type="number" min="0" name="h_tiket" value="{{$spd->h_tiket}}" placeholder="Harga Tiket Berangkat" class="form-control"></input><input style="width:130px;" placeholder="Nama Pesawat Kembali " required type="text" name="nk_transport" value="{{$spd->nk_transport}}" class="form-control"></input><input required type="text" name="no_kembali" value="{{$spd->no_kembali}}" style="width:120px;" placeholder="No Tiket Kembali" class="form-control"></input><input required placeholder="Harga Tiket Kembali" id="tkt-htp" type="number" name="h_tiketp" value="{{$spd->h_tiketp}}" min="0" class="form-control"></input><input placeholder="Total Harga Tiket" required id="tkt-tht" name="t_transport" value="{{$spd->t_transport}}" class="form-control prc" min="2"></input>');          

	            }else{
	              $("#TPK").empty(); 
	            }
	           });
	      </script>

  <script language="javascript" src="{{ asset('js/operasi.js') }}"></script>
  <script language="javascript" src="{{ asset('js/terbilang.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/jquery-1.4.4.min.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/jquery.jsonSuggest-2.js') }}"></script>

<script>
function myFunction() {
    document.getElementById("1").disabled = false;
    document.getElementById("2").disabled = false;
    document.getElementById("update").disabled = false;
    document.getElementById("alatangkut").disabled = false;
    document.getElementById("up1").disabled = false;
    document.getElementById("pgp-st").disabled = false;
    document.getElementById("pgp-ht").disabled = false;
    document.getElementById("pgp-jml").disabled = false;
    document.getElementById("hn-jml").disabled = false;
    document.getElementById("hn-ht").disabled = false;
    document.getElementById("hn-st").disabled = false;
    document.getElementById("fd-jml").disabled = false;
    document.getElementById("fd-ht").disabled = false;
    document.getElementById("fd-st").disabled = false;
    document.getElementById("fb-jml").disabled = false;
    document.getElementById("fb-ht").disabled = false;
    document.getElementById("fb-st").disabled = false;
    document.getElementById("dkl-jml").disabled = false;
    document.getElementById("dkl-st").disabled = false;
    document.getElementById("dkl-ht").disabled = false;
    document.getElementById("rpr-jml").disabled = false;
    document.getElementById("rpr-st").disabled = false;
    document.getElementById("rpr-ht").disabled = false;
    document.getElementById("valid").disabled = true;
}
</script>

        </div>
    <div class="box-body">
  </div>
</section>
@endsection
