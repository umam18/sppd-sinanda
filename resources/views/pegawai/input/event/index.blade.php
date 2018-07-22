@extends('pegawai.input.event.base')
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

        <h2><b><center>EVENT</center></b></h2>
        <hr style="border-width: 2px; border-color: black;"></hr>

<form method="POST" id="myForm" name="vform" onsubmit="return Validate()" action="{{ route('inputevent.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}

            <div class="event">
              <div class="pejabat">
              <h4>Nama Pejabat</h4>
              <input name="pejabat" readonly type="text" value="NURUL HUDA SE, M.SI" style="width: 200px;" required></input>
              </div>

              <div class="pejabat">
              <h4>NIP Pejabat</h4>
                <input name="nip_pejabat" readonly type="text" value="196804101991032003" style="width: 200px;" required></input>
              </div>

              <div class="pejabat">
              <h4>Nama Bendahara</h4>
                <input name="bendahara" readonly type="text" value="ANKA RAHARJA" style="width: 200px;" required></input>
              </div>

              <div class="pejabat">
              <h4>NIP Bendahara</h4>
                <input name="nip_bendahara" readonly type="text" value="198402122009121002" style="width: 200px;" required></input>
              </div>
            </div>

            <div class="event">
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
                  <option hidden value="">- Pilih Kabupaten / Kota -</option>  
              </select> 
              </div>

              <div class="pejabat">
              <h4 style="margin-left: 50px;">Dalam Rangka</h4>
                  <input hidden value="Kota Administrasi Jakarta Pusat" name="berangkat"></input>
                  <input name="maksud" type="text" style="margin-left: 50px; width: 300px;" placeholder="Maksud Perjalanan Dinas"  required></input>
              </div>
            </div>

            <div class="event">
              <div id="angkutan" class="transportasi">
              
              </div>

              <div class="transportasi">
              <h4>Tanggal Berangkat</h4>
                <input id="date-input" type="date" name="tanggal_berangkat" required></input>
              </div>

              <div class="transportasi">
              <h4>Tanggal Kembali</h4>
                <input id="date-input2" type="date" name="tanggal_kembali" required></input>
              </div>

              <div class="transportasi">
              <h4>Lama Perjalanan</h4>
                <input readonly="" required type="number" min="1" id="lama" name="lama" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
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
                <option hidden value=""> - Akun - </option>
                <option value="524114">524114</option>
                <option value="524119">524119</option>
              </select>
              </div>
            </div>

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

                <input required hidden value="0" name="status"></input>

                <div class="form-group">
                    <div class="col-md-1 col-md-offset-5">
        <center>
          <button id="submit" type="submit">Lanjut</button>
        </center>
      </div>
    </div>
  </form>

    <button onclick="goBack()">Kembali</button>
  
  <script type="text/javascript">
      $(".livesearch").chosen();
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
                              $("#TKU").empty();
                              $("#TPK").empty();  
                              $("#TKU").append('<input hidden required value="'+key+'" id="trspt-ht" name="h_ku"></input>');
                                
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
                    $("#HN").append('<input id="hn-ht" hidden value="'+key+'" name="h_hn"></input>');
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
                    $("#FD").append('<input id="fd-ht" hidden value="'+key+'" type="number" name="h_fd"></input>');
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
                    $("#FB").append('<input id="fb-ht" hidden value="'+key+'" type="number" name="h_fb"></input>');
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
                    $("#diklat").append('<input id="dkl-ht" hidden value="'+key+'" type="number" name="h_diklat" placeholder="Harga Tetap">');
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
                   $("#UP").append('<input type="number" name="h_penginapan" hidden placeholder="Harga Penginapan" value="'+key+'"></input>');
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
      $("#date-input2").val("");
      $("#lama").val("");      
      }
    });
  </script>

  <script>
    function goBack() 
    {
        window.history.back()
    }
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
