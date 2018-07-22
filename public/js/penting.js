    
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
                      $("#nip_pegawai").append('<h4>NIP Pegawai</h4><input hidden required name="nip" value="'+key+'"></input>');
                  });
             
              }else{
                 $("#nip_pegawai").empty();
              }
             }
          });
        }  
      });
    

      
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
                    $("#jabatan").append('<h4>Jabatan Pegawai</h4><input name="jabatan" hidden value="'+key+'"></input>');
                });
           
            }else{
               $("#jabatan").empty();
            }
           }
        });
    }  
   });
  

    
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
                    $("#pangkat").append('<h4>Pangkat Pegawai</h4><input name="pangkat" hidden value="'+key+'"></input>');
                });
           
            }else{
               $("#pangkat").empty();
            }
           }
        });
    }  
   });
  

    
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
                    $("#tingkat").append('<h4>Tingkat Pegawai</h4><input hidden name="tingkat" value="'+key+'"></input>');
                });
           
            }else{
               $("#tingkat").empty();
            }
           }
        });
    }  
   });
  

  <!-- TRANSPORT KU -->
  
  $('#tujuan').change(function(){
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-up')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#TKU").empty();
                $("#TPK").empty();
                $.each(res,function(key,value){
                      $("#trans").change(function () {
                          var val = $(this).val();
                          if (val == "Angkutan Darat") {
                              $("#TKU").append('<label>Kendaraan Umum</label><input readonly value="'+key+'" id="trspt-ht" type="text" name="h_ku" placeholder=" Harga Transportasi" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="trspt-tht" type="text" hidden name="t_ku" placeholder=" Total" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>');
                                $("#TPK").empty();
                          } else if (val == "Pesawat" || val== "Angkutan Darat (Kereta Api)") {
                                  $("#TPK").append('<label>Pesawat / KA</label><input type="text" name="no_berangkat" placeholder="No Tiket Berangkat" class="form-control"></input><input type="text" name="no_kembali" placeholder="No Tiket Pulang" class="form-control"></input><input id="tkt-ht" type="number" name="h_tiket" placeholder="Harga Tiket" class="form-control"></input><input id="tkt-tht" type="number" name="t_transport" placeholder="Total" class="form-control prc"></input>');
                                    $("#TKU").empty();
                                  }
                      });
                });
            }
          }  
       });
      }
    });
  

  <!-- UANG PENGINAPAN -->
  
  $('#tujuan').change(function(){
  var kabupatenID = $(this).val();    
  if(kabupatenID){
      $.ajax({
          type:"GET",
          url:"{{url('admin/get-up')}}?id="+kabupatenID,
          success:function(res){               
            if(res){
                $("#UP").empty();
                $.each(res,function(key,value){
                    $("#UP").append('<label>Uang Penginapan</label><input type="text" name="n_penginapan" placeholder="Nama Penginapan" class="form-control"></input><input id="pgp-jml" type="number" name="j_penginapan" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="pgp-ht" readonly value="'+key+'" type="number" name="h_penginapan" placeholder="Harga Tetap" class="form-control"></input><input id="pgp-st" type="text" name="t_penginapan" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#UP").empty();
            }
           }
        });
    }  
   });
  


  <!-- HARIAN NORMAL -->
  
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
                    $("#HN").append('<label>Uang Harian</label><input min="0" id="hn-jml" name="j_hn" type="number" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="hn-ht" readonly value="'+key+'" name="h_hn" placeholder="Harga Tetap" class="form-control"></input><input id="hn-st" type="number" name="t_hn" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#HN").empty();
            }
           }
        });
    }  
   });
  

  <!-- FULLD DAY -->
  
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
                    $("#FD").append('<label>Full Day</label><input id="fd-jml" type="number" name="j_fd" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="fd-ht" readonly value="'+key+'" type="number" name="h_fd" placeholder="Harga Tetap" class="form-control"></input><input id="fd-st" type="number" name="t_fd" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#FD").empty();
            }
           }
        });
    }  
   });
  

  <!-- FULL BOARD-->
  
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
                    $("#FB").append('<label>Full Board</label><input id="fb-jml" type="number" name="j_fb" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="fb-ht" readonly value="'+key+'" type="number" name="h_fb" placeholder="Harga Tetap" class="form-control"></input><input id="fb-st" type="number" name="t_fb" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#FB").empty();
            }
           }
        });
    }  
   });
  

<!-- DIKLAT-->
  
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
                    $("#diklat").append('<label>Diklat</label><input id="dkl-jml" type="number" name="j_diklat" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input><input id="dkl-ht" readonly value="'+key+'" type="number" name="h_diklat" placeholder="Harga Tetap" class="form-control"></input><input id="dkl-st" type="number" name="t_diklat" placeholder="Total" class="form-control prc"></input>');
                });
           
            }else{
               $("#diklat").empty();
            }
           }
        });
    }  
   });
  