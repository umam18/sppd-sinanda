@extends('pegawai.input.base')
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

<form method="POST" id="myForm" name="vform" onsubmit="return Validate()" action="{{ route('input.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}

        <h2><b><center>SURAT PERINTAH PERJALANAN DINAS (SPPD) </center></b></h2>
        <hr style="border-width: 2px; border-color: black;"></hr>

            <div class="event">
              <div class="pejabat">
              <h4>Nama Pejabat</h4>
              <select id="nama" name="pejabat" required>
                <option hidden value="">- Pejabat -</option>
                <option value="NURUL HUDA SE, M.SI">NURUL HUDA SE, M.SI</option>
                <option value="MARYADI">MARYADI</option>
              </select>
              </div>

              <div class="pejabat">
              <h4>NIP Pejabat</h4>
                <select id="nip" name="nip_pejabat" required></select>
              </div>

              <div class="pejabat">
              <h4>Nama Bendahara</h4>
                <select id="bendahara" name="bendahara" required></select>
              </div>

              <div class="pejabat">
              <h4>NIP Bendahara</h4>
                <select id="nip_bendahara" name="nip_bendahara" required></select>
              </div>
            </div>

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

            <div class="event">
              <div class="pejabat">
              <h4>Dalam Rangka</h4>
                  <input name="maksud" type="text area" placeholder="Maksud Perjalanan Dinas" style="width: 200px;" required></input>
              </div>

                  <input hidden size="35" value="Kota Administrasi Jakarta Pusat" name="berangkat"></input>


              <div class="pejabat">
              <h4>Pilih Provinsi</h4>
                  <select id="tujuan" class="livesearch" required>
                  <option value=""></option>
                    @foreach ($permenkeu as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
              </div>

              <div class="pejabat">
              <h4>Tempat Tujuan</h4>
              <select id="tempat" name="tujuan" required>
                  <option value=""></option>  
              </select> 
              </div>
            </div>

            <div class="event">
              <div id="angkutan" class="pejabat">
              
              </div>

              <div class="pejabat">
              <h4>Tanggal Berangkat</h4>
                <input type="date" id="date-input" name="tanggal_berangkat" required></input>
              </div>

              <div class="pejabat">
              <h4>Tanggal Kembali</h4>
                <input type="date" id="date-input2" name="tanggal_kembali" required></input>
              </div>

              <div class="pejabat">
              <h4>Lama Perjalanan</h4>
                <input readonly required type="number" id="lama" min="1" name="lama" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
              </div>

              <div class="pejabat">
              <h4>Keterangan</h4>
                <input type="text" name="ket" placeholder="Keterangan Lain-Lain"></input>
              </div>
            </div>

            <div class="event">
              <div class="coba">
              <h4>Keluaran</h4>
              <select id="angkut" name="keluaran" class="livesearch" style="width: 200px;" required>
                  <option></option>
                  @foreach($keluaran as $kel)
                    <option value="{{ $kel -> Kode}}">{{ $kel -> Keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="coba">
              <h4>Komponen</h4>
              <select id="angkut" name="komponen" class="livesearch" style="width: 200px;" required>
                  <option></option>
                  @foreach($komponen as $kom)
                    <option value="{{ $kom -> Kode}}">{{ $kom -> Keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="coba">
              <h4>Sub Komponen</h4>
              <select id="angkut" name="sub" class="livesearch" style="width: 200px;" required>
                  <option></option>
                  @foreach($subkomponen as $sub)
                    <option value="{{ $sub -> Kode}}">{{ $sub -> Keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="coba">
              <h4>Akun</h4>
              <select id="angkut" name="akun" required>
                <option  value=""> - Akun - </option>
                <option value="524114">524114</option>
                <option value="524119">524119</option>
              </select>
              </div>
            </div>

        </br></br><h2><b><center>RINCIAN BIAYA</center></b></h2>
        <hr style="border-width: 2px; border-color: black;"></hr>

            <div id="TKU" class="form-group">
                </div>

                <div id="TPK" class="form-group">
                </div>

                <div id="UP" class="form-group">
                </div>

                <div id="HN" class="form-group">
                </div>

                <div id="FD" class="form-group">
                </div>

                <div id="FB" class="form-group">
                </div>

                <div id="diklat" class="form-group">
                </div>

                <div id="representatif" class="form-group">
                </div>


                <input hidden name="posisi" value="PESERTA">
                <input hidden name="status" value="0">

                <div class="form-group">
                    <input hidden name="t_uh" id="result"></input>
                </div>

                <div class="form-group">
                    <input hidden name="t_all" id="t_keseluruhan"></input>
                </div>

                <div class="form-group">
                    <input hidden= size="150" id="terbilang" name="terbilang"></input>
                </div>

                <div class="form-group">
                    <div class="col-md-1 col-md-offset-5">
        <center><button type="submit">Submit</button></center>
      </div>
    </div>
  </form>

  <button onclick="goBack()">Kembali</button>

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


  <script type="text/javascript">
      $(".livesearch").chosen();
  </script>

          <script>
                $("#nama").change(function () {
                    var val = $(this).val();
                    if (val != "MARYADI") {
                        $("#nip").html("<option value='196804101991032003' selected>196804101991032003</option>");
                        $("#bendahara").html("<option value='ANKA RAHARJA' selected>ANKA RAHARJA</option>");
                        $("#nip_bendahara").html("<option value='198402122009121002' selected>198402122009121002</option>");
                    } else{
                        $("#nip").html("<option value='196008281982031006' selected>196008281982031006</option>");
                         $("#bendahara").html("<option value='WINIH' selected>WINIH</option>");
                        $("#nip_bendahara").html("<option value='196610031986032001' selected>196610031986032001</option>");
                    }
                });
        </script>

 <!-- TRANSPORT KU -->
  <script type="text/javascript">
  $('#tujuan').change(function(){
  $('#angkutan').empty();  
  $('#angkutan').append('<h4>Transportasi</h4><select id="trans" name="transportasi" required><option hidden value="">- Transportasi -</option><option value="Pesawat">Pesawat</option><option value="Angkutan Darat">Angkutan Darat</option><option value="Angkutan Darat (Kereta Api)">Angkutan Darat (Kereta Api)</option></select>')
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-tku')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#TKU").empty();
                $("#TPK").empty();
                $.each(res,function(key,value){
                      $("#trans").change(function () {
                      var val = $(this).val();
                      if (val == "Angkutan Darat") { 
                              $("#TKU").empty();
                              $("#TPK").empty();  
                              $("#TKU").append('<label>Kendaraan Umum</label><input readonly value="'+key+'" id="trspt-ht" type="text" name="h_ku" placeholder=" Harga Transportasi" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="trspt-tht" type="text"  name="t_ku" placeholder=" Total" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>');
                                
                      }else{
                      $("#TPK").empty();
                      $("#TKU").empty();
                      $("#TKU").append('<label>Kendaraan Umum</label><input required readonly value="'+key+'" id="trspt-ht" type="text" name="h_ku" placeholder=" Harga Transportasi" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="trspt-tht" type="text"  name="t_ku" placeholder=" Total" class="form-control" required onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>');
                      $("#TPK").append('<label>Pesawast / KA</label><input style="width:130px;" required type="text" name="n_transport" placeholder="Nama Pesawat / KA" class="form-control"></input><input style="width:130px;" required type="text" name="no_berangkat" placeholder="No Tiket Berangkat" class="form-control"></input><input style="width:120px;" required id="tkt-ht" min="0" placeholder="Harga Tiket Berangkat" type="number" name="h_tiket" class="form-control"></input><input style="width:130px;" required type="text" name="nk_transport" placeholder="Nama Pesawat / KA" class="form-control"></input><input style="width:130px;" type="text" required name="no_kembali" placeholder="No Tiket Pulang"  class="form-control"></input><input style="width:120px;" id="tkt-htp" required min="0" placeholder="Harga Tiket Kembali" type="number" name="h_tiketp" class="form-control"></input><input style="width:120px;" required id="tkt-tht" type="number" name="t_transport" placeholder="Total" min="2" required class="form-control prc"></input><input value="'+key+'" hidden type="text" name="h_ku" placeholder=" Harga Transportasi"></input><input value="'+key+'" name="t_ku" placeholder=" Total"  hidden onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>');
                      }
                    });
                });
            }
          }  
       });
      }
    });
  </script>

  <!-- HARIAN NORMAL -->
  <script type="text/javascript">
  $('#tujuan').change(function(){
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-hn')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#HN").empty();
                $.each(res,function(key,value){
                    $("#HN").append('<label>Uang Harian</label><input placeholder="Jumlah" min="0" id="hn-jml" name="j_hn" type="number" name="j_hn" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="hn-ht" readonly value="'+key+'" name="h_hn" placeholder="Harga Tetap" class="form-control"></input><input id="hn-st" name="t_hn" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#HN").empty();
            }
           }
        });
    }  
   });
  </script>

  <!-- FULLD DAY -->
  <script type="text/javascript">
  $('#tujuan').change(function(){
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-fd')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#FD").empty();
                $.each(res,function(key,value){
                    $("#FD").append('<label>Full Day</label><input placeholder="Jumlah" id="fd-jml" type="number" name="j_fd" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="fd-ht" readonly value="'+key+'" type="number" name="h_fd" placeholder="Harga Tetap" class="form-control"></input><input id="fd-st"  name="t_fd" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#FD").empty();
            }
           }
        });
    }  
   });
  </script>

  <!-- FULL BOARD-->
  <script type="text/javascript">
  $('#tujuan').change(function(){
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-fb')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#FB").empty();
                $.each(res,function(key,value){
                    $("#FB").append('<label>Full Board</label><input placeholder="Jumlah" id="fb-jml" type="number" name="j_fb"  class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="fb-ht" readonly value="'+key+'" type="number" name="h_fb" placeholder="Harga Tetap" class="form-control"></input><input id="fb-st" name="t_fb" class="form-control prc" placeholder="Total"></input>');
                });
           
            }else{
               $("#FB").empty();
            }
           }
        });
    }  
   });
  </script>

<!-- DIKLAT-->
  <script type="text/javascript">
  $('#tujuan').change(function(){
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-diklat')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#diklat").empty();
                $.each(res,function(key,value){
                    $("#diklat").append('<label>Diklat</label><input placeholder="Jumlah" id="dkl-jml" type="number" name="j_diklat" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="dkl-ht" readonly value="'+key+'" type="number" name="h_diklat" placeholder="Harga Tetap" class="form-control"></input><input id="dkl-st" name="t_diklat" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#diklat").empty();
            }
           }
        });
    }  
   });
  </script>

  <!-- PENGINAPAN-->
  <script type="text/javascript">
  $('#tujuan').change(function(){
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-penginapan')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#UP").empty();
                $.each(res,function(key,value){
                   $("#UP").append('<label>Uang Penginapan</label><input type="text" name="n_penginapan" placeholder="Nama Penginapan" class="form-control"></input><input id="pgp-jml" type="number" name="j_penginapan" placeholder="Lama Penginapan" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="pgp-ht" type="number" name="h_penginapan" placeholder="Harga Penginapan" max="'+key+'" class="form-control"></input><input id="pgp-st" type="text" name="t_penginapan" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#UP").empty();
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

    <script type="text/javascript">
    $('#tujuan').change(function(){
                $("#representatif").empty();
                    $("#representatif").append('<label>Representatif</label><input min="0" id="rpr-jml" type="number" name="j_rpr" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><select id="rpr-ht" type="number" name="h_rpr"><option hidden value="">- Eselon 1 / 2 -</option><option value="150000">150000</option><option value="200000">200000</option></select><input id="rpr-st" type="text" name="t_rpr" placeholder="Total" class="form-control prc"></input>');
      
   });
  </script>

  <!-- TUJUAN -->
  <script type="text/javascript">
  $('#tujuan').change(function(){
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-tujuan')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#tempat").empty();
                $.each(res,function(key,value){
                    $("#tempat").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#tempat").empty();
            }
           }
        });
    }  
   });
  </script>

    <script type="text/javascript">
    $('#date-input2').on('change', function(){
      var date = new Date($('#date-input').val());
      day = date.getDate();
      month = date.getMonth() + 1;
      year = date.getFullYear();
      var date2 = new Date($('#date-input2').val());
      day2 = date2.getDate();
      month2 = date2.getMonth() + 1;
      year2 = date2.getFullYear();
      
      if(day <= day2 && month <= month2 && year <= year2){
       var m = (day2-day)+1;
      $("#lama").val(m);
      }else{
      alert("Tanggal Tidak Valid!");
      $("#date-input2").val("") 
      $("#lama").val("")       
      }
    });
  </script>


  <!-- <script language="javascript" src="{{ asset('js/storage.js') }}"></script> -->
  <script language="javascript" src="{{ asset('js/operasi.js') }}"></script>
  <script language="javascript" src="{{ asset('js/terbilang.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/jquery-1.4.4.min.js') }}"></script>
  <script language="JavaScript" src="{{ asset('js/jquery.jsonSuggest-2.js') }}"></script>

        </div>
    <div class="box-body">
  </div>
</section>
@endsection
