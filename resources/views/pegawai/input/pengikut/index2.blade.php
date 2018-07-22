@extends('pegawai.input.pengikut.base')
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

<form method="POST" id="myForm" name="vform" onsubmit="return Validate()" action="{{ route('pengikut2.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}

        <h2><b><center>Rincian Biaya Event</center></b></h2>
        <hr style="border-width: 2px; border-color: black;"></hr>

            <div id="event">
              <div class="pejabat">
              <h4>Nama Pegawai</h4>
              <select name="nama" id="pegawai" class="livesearch" style="width: 180px;" required>
              <option></option>
                   @foreach ($pegawai as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
              </select>
              </div>

              <div class="pejabat">
                <div id="nip_pegawai" class="pjt"></div>
              </div>
              <div class="pejabat">
                <div id="pangkat" class="pjt"></div>
              </div>
              <div class="pejabat">
                <div id="jabatan" class="pjt"></div>
              </div>
              <div class="pejabat">
                <div id="tingkat" class="pjt"></div>
              </div>
              </center>
            </div>

              <select hidden id="nama" name="pejabat" required>
              <input hidden id="nips" name="nip_pejabat" value="{{$id->nip_pejabat}}" required></input>
              <select hidden  id="bendahara" name="bendahara" required></select>
              <select hidden id="nip_bendahara" name="nip_bendahara" required></select>
              <input hidden value="PESERTA" size="35" name="posisi" required></input> 

            <div class="event">
              <div class="mbt">
                  <input hidden name="maksud" type="text area" value="{{ $id->maksud }}" placeholder="Maksud Perjalanan Dinas" size="36" required></input>
              </div>

              <div class="mbt">
                  <input hidden size="35" value="Kota Administrasi Jakarta Pusat" name="berangkat"></input>
              </div>

              <!-- Tujuan -->
              <div class="mbt">
                  <select hidden name="tujuan" id="tujuan" required>
                  <option hidden value="{{ $id->tujuan }}"></option>
                </select>
              </div>
            </div>

            <div class="event">
              <div id="angkutan" class="transportasi">
              
              </div>

              <div class="transportasi">
                <input hidden value="{{$id->tanggal_berangkat}}" hidden type="date" name="tanggal_berangkat" required></input>
              </div>

              <div class="transportasi">
                <input hidden type="date" name="tanggal_kembali" value="{{$id->tanggal_kembali}}" hidden required></input>
              </div>

              <div class="transportasi">
                <input id="lama" hidden required type="number" min="1" name="lama" value="{{$id->lama}}"></input>
                <input value="{{$id->transportasi}}" id="trans" hidden name="transportasi" required></input>
              </div>
            </div>

            <div class="event">
              <div class="coba">
              <select hidden id="angkut" name="keluaran" style="width: 200px;" required>
                  <option hidden value="{{$id->keluaran}}"></option>
                </select>
              </div>

              <div class="coba">
              <select hidden id="angkut" name="komponen" style="width: 200px;" required>
                  <option hidden value="{{$id->komponen}}"></option>
                </select>
              </div>

              <div class="coba">
              <select hidden id="angkut" name="sub" style="width: 200px;" required>
                  <option hidden value="{{$id->sub}}"></option>
                </select>
              </div>

              <div class="coba">
              <select hidden id="angkut" name="akun" required>
                <option hidden value="{{$id->akun}}"></option>
              </select>
              </div>
            </div>

                @if ($id->transportasi != 'Angkutan Darat')
                <div id="TPK" class="form-group">
                  <input hidden value="{{$id->h_ku}}" name="h_ku"></input><input hidden value="{{$id->t_ku}}" name="t_ku"></input>
                  <label>Pesawat / KA</label><input required type="text" name="n_transport" placeholder="Nama Pesawat / KA" class="form-control"><input required type="text" name="no_berangkat" placeholder="No Tiket Berangkat" class="form-control"></input><input required id="tkt-ht" type="number" name="h_tiket" min="0" placeholder="Harga Tiket Berangkat" class="form-control"><input required type="text" name="no_kembali" placeholder="No Tiket Pulang" class="form-control"><input required id="tkt-htp" type="number" name="h_tiketp" placeholder="Harga Tiket Kembali" min="0" class="form-control"></input></input><input required id="tkt-tht" type="number" name="t_transport" placeholder="Total" class="form-control prc"></input>
                </div>
                @endif

                <div id="TKU" class="form-group">
                  <label>Kendaraan Umum</label><input readonly required value="{{$id->h_ku}}" id="trspt-ht" type="text" name="h_ku" placeholder=" Harga Transportasi" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="trspt-tht" type="text" hidden name="t_ku" placeholder="Total" required></input>
                </div>

                <div id="UP" class="form-group">
                  <label>Uang Penginapan</label><input type="text" name="n_penginapan" placeholder="Nama Penginapan" class="form-control"></input><input id="pgp-jml" max="{{$id->lama}}" min="0" type="number" name="j_penginapan" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="pgp-ht" type="number" min="0" name="h_penginapan" max="{{$id->h_penginapan}}" placeholder="Harga Tetap" class="form-control"></input><input id="pgp-st" type="text" name="t_penginapan" placeholder="Total" class="form-control prc"></input>
                </div>

                <div id="HN" class="form-group">
                  <label>Uang Harian</label>
                  <input min="0" id="hn-jml" name="j_hn" type="number" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                  <input id="hn-ht" readonly value="{{$id->h_hn}}" name="h_hn" placeholder="Harga Tetap" class="form-control"></input>
                  <input id="hn-st" type="number" name="t_hn" placeholder="Total" class="form-control prc"></input>
                </div>

                <div id="FD" class="form-group">
                  <label>Full Day</label><input id="fd-jml" min="0" type="number" name="j_fd" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="fd-ht" readonly value="{{$id->h_fd}}" type="number" name="h_fd" placeholder="Harga Tetap" class="form-control"></input><input id="fd-st" type="number" name="t_fd" placeholder="Total" class="form-control prc"></input>
                </div>

                <div id="FB" class="form-group">
                  <label>Full Board</label><input min="0" id="fb-jml" type="number" name="j_fb" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="fb-ht" readonly value="{{$id->h_fb}}" type="number" name="h_fb" placeholder="Harga Tetap" class="form-control"></input><input id="fb-st" type="number" name="t_fb" placeholder="Total" class="form-control prc"></input>
                </div>

                <div id="diklat" class="form-group">
                  <label>Diklat</label><input id="dkl-jml" min="0" type="number" name="j_diklat" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="dkl-ht" readonly value="{{$id->h_diklat}}" type="number" name="h_diklat" placeholder="Harga Tetap" class="form-control"></input><input id="dkl-st" type="number" name="t_diklat" placeholder="Total" class="form-control prc"></input>
                </div>

                <div class="form-group">
                <label>Representatif</label><input id="rpr-jml" min="0" type="number" name="j_rpr" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><select id="rpr-ht" type="number" name="h_rpr"><option hidden value="">- Eselon 1 / 2 -</option><option value="150000">150000</option><option value="200000">200000</option></select><input id="rpr-st" type="text" name="t_rpr" placeholder="Total" class="form-control prc"></input>
                </div>

                <div class="form-group">
                    <input hidden name="t_uh" id="result"></input>
                </div>

                <div class="form-group">
                    <input hidden name="t_all" id="t_keseluruhan"></input>
                </div>

                <div class="form-group">
                    <input hidden size="150" id="terbilang" name="terbilang"></input>
                </div>

                <input type="hidden" name="id_event" value="{{ $id->id }}">
                <input hidden name="status" value="0"></input>

                <div class="form-group">
                    <div class="col-md-1 col-md-offset-5">
        <center>
          <button type="submit">Submit</button>
        </center>
      </div>
    </div>
  </form>

  <script type="text/javascript">
      $(".livesearch").chosen();
  </script>

          <script>
                $("#pegawai").change(function () {
                        $("#nama").html("<option value='{{$id -> pejabat}}' selected>{{$id -> pejabat}}</option>");
                        $("#bendahara").html("<option value='{{$id -> bendahara}}' selected>{{$id -> bendahara}}</option>");
                        $("#nip_bendahara").html("<option value='{{$id -> nip_bendahara}}' selected>{{$id -> nip_bendahara}}</option>");
                });

        </script>

    <script type="text/javascript">
    $('#pegawai').change(function(){
    var tujuanID = $(this).val();    
    if(tujuanID){
          $.ajax({
             type:"GET",
             url:"{{url('admin/get-nip')}}?id="+tujuanID,
             success:function(res){               
              if(res){
                  $("#nip_pegawai").empty();
                  $.each(res,function(key,value){
                      $("#nip_pegawai").append('<h4>NIP</h4><input readonly required name="nip" value="'+key+'"></input>');
                  });
             
              }else{
                 $("#nip_pegawai").empty();
              }
             }
          });
        }  
      });
    </script>

      <script type="text/javascript">
    $('#pegawai').change(function(){
    var tujuanID = $(this).val();    
    if(tujuanID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-jabatan')}}?id="+tujuanID,
           success:function(res){               
            if(res){
                $("#jabatan").empty();
                $.each(res,function(key,value){
                    $("#jabatan").append('<h4>Jabatan</h4><input readonly name="jabatan" value="'+key+'"></input>');
                });
           
            }else{
               $("#jabatan").empty();
            }
           }
        });
    }  
   });
  </script>

    <script type="text/javascript">
    $('#pegawai').change(function(){
    var tujuanID = $(this).val();    
    if(tujuanID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-pangkat')}}?id="+tujuanID,
           success:function(res){               
            if(res){
                $("#pangkat").empty();
                $.each(res,function(key,value){
                    $("#pangkat").append('<h4>Pangkat</h4><input readonly name="pangkat" value="'+key+'"></input>');
                });
           
            }else{
               $("#pangkat").empty();
            }
           }
        });
    }  
   });
  </script>

    <script type="text/javascript">
    $('#pegawai').change(function(){
    var tujuanID = $(this).val();    
    if(tujuanID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-tingkat')}}?id="+tujuanID,
           success:function(res){               
            if(res){
                $("#tingkat").empty();
                $.each(res,function(key,value){
                    $("#tingkat").append('<h4>Tingkat</h4><input readonly name="biaya" value="'+key+'"></input>');
                });
           
            }else{
               $("#tingkat").empty();
            }
           }
        });
    }  
   });
  </script>

<script>
  // update when the page loads
  (function(d) {
  // get all the fields by their ids
  var fieldA = d.getElementById('hn-jml');
  var fieldB = d.getElementById('fd-jml');
  var fieldC = d.getElementById('fb-jml');
  var fieldD = d.getElementById('dkl-jml');
  var fieldE = d.getElementById('rpr-jml');
  var lama =  $("#lama").val();

  // save them into an array to facilitate the iterations
  var arr = [fieldA, fieldB, fieldC, fieldD, fieldE];
  
  // declare the aux variables
  var totalMax = lama, currentTotal, rest;

  // update when the page loads
  updateMaxValues();
  
  // add the event handlers to call the update when some value has changed
  arr.forEach(function(field, index) {
    field.addEventListener('input', updateMaxValues);
  });

  // function that will be called when the page loads, and after any of the textboxes are changed
  function updateMaxValues() {
    // calculates the current total values
    currentTotal = Number(fieldA.value) + Number(fieldB.value) + Number(fieldC.value) + Number(fieldD.value) + Number(fieldE.value);
    // calculates the rest
    rest = totalMax - currentTotal;

    for (var i = 0; i < arr.length; i++) {
      // changes all the max attributes to its current value + the rest available
      arr[i].setAttribute('max', Number(arr[i].value) + rest);
    }
    
    // that's only something to show how many values are left
    d.querySelector('p').innerHTML = 'Total: ' + currentTotal + '/' + totalMax;
  }
})(document);
</script>
  
  <script>
    function goBack() 
    {
        window.history.back()
    }
  </script>


  <script language="javascript" src="{{ asset('js/operasi.js') }}"></script>
  <script language="javascript" src="{{ asset('js/terbilang.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/jquery-1.4.4.min.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/jquery.jsonSuggest-2.js') }}"></script>

        </div>
    <div class="box-body">
  </div>
</section>
@endsection
