@extends('admin.input.base')
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

<style type="text/css">
.jsonSuggest { font-size:0.8em; }
</style>

<script src="{{ asset('js/myscript.js') }}"></script>
</head>

<form method="POST" id="myForm" name="vform" onsubmit="return Validate()" action="{{ route('input-data.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}

        <h2 class="title"><b><center>Surat Perintah Perjalanan Dinas (SPPD)</center></b></h2>
        <hr style="border-width: 2px; border-color: black;"></hr>
        <center><table>

            <tr style="font-size: 16px">
              <td>Pejabat Berwenang
              <br><select id="nama" name="pejabat" required>
                <option hidden> - Pejabat Berwenang - </option>
                <option value="NURUL HUDA SE, M.SI">NURUL HUDA SE, M.SI</option>
                <option value="MARYADI">MARYADI</option>
              </select></td>

              <td></br><input hidden value="PESERTA" size="35" name="posisi" required></input></td>

              <br><select hidden id="nip" name="nip_pejabat" required>
              </select>

              <br><select hidden id="bendahara" name="bendahara" required>
              </select>

              <br><select hidden id="nip_bendahara" name="nip_bendahara" required>
              </select>
            </tr>

            <tr style="font-size: 16px">
              <td></br>Nama Pegawai
              </br><input readonly value="{{$pegawai->nama}}" size="35" name="nama" required></input></td>



            <input hidden value="{{$pegawai->nip}}" name="nip" size="42" required></input>

            <input hidden value="{{$pegawai->pangkat}}" size="42" name="pangkat" required></input>

            <input hidden value="{{$pegawai->jabatan}}" size="42" name="jabatan" required></input>

            <input hidden value="{{$pegawai->tingkat}}" size="1" name="biaya" required></input>


              <td></br>Maksud Perjalanan Dinas
              <br><input name="maksud" type = "text area" placeholder = "Maksud Perjalanan Dinas" size="42" required></td>
            </tr>

            <tr style="font-size: 16px">
              <td><br>Tempat Berangkat
              </br><input readonly size="35" value="Kota Administrasi Jakarta Pusat" name="berangkat"></input></td>

              <td><br>Tempat Tujuan
              <br>
                <select name="tujuan" id="tujuan" size="" class="livesearch" required>
                <option></option>
                  @foreach($data as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
              </select></td>

            </tr>

            <tr style="font-size: 16px">
              <td><br>Alat Angkut yang Digunakan
              <br><select id="angkut" name="transportasi" required>
                <option hidden=""> - Alat Angkut - </option>
                <option value="Pesawat">Pesawat</option>
                <option value="Kapal Laut">Kapal Laut</option>
                <option value="Darat">Angkutan Darat</option>
                <option value="Kereta">Angkutan Darat (Kereta Api)</option>
              </select></td>

              <td><br>Tanggal Berangkat
              <br>
                <input type="date" name="tanggal_berangkat" required></input>
              </td>
            </tr>

            <tr style="font-size: 16px">
              <td><br>Tanggal Kembali
              <br>
                <input type="date" name="tanggal_kembali" required></input>
              </td>

              <td><br>Lama Perjalanan
              </br><input type="number" name="lama"></input></td>
            </tr>
<!--             <tr style="font-size: 16px">
              <td><br>Kode Pembebanan Anggaran</td>
              <td><br>
              <select name="pembebanan" class="livesearch" required>
                <option></option>
                  @foreach($kode as $k)
                    <option value="{{$k->kode}}">{{$k->keterangan}}</option>
                  @endforeach
              </select></td>
            </tr> -->

            <tr style="font-size: 16px">
              <td><br>Keluaran
              </br><select id="angkut" name="keluaran" class="livesearch" required>
                <option></option>
                @foreach($keluaran as $ke)
                  <option value="{{ $ke -> Kode}}">{{ $ke -> Keterangan }}</option>
                @endforeach
              </select></td>
            </tr>

            <tr style="font-size: 16px">
              <td><br>Komponen
              </br><select id="angkut" name="komponen" class="livesearch" required>
                <option></option>
                @foreach($komponen as $ko)
                  <option value="{{ $ko -> Kode}}">{{ $ko -> Keterangan }}</option>
                @endforeach
              </select></td>
            </tr>

            <tr style="font-size: 16px">
              <td><br>Sub Komponen
              </br><select id="angkut" name="sub" class="livesearch" required>
                <option></option>
                @foreach($subkomponen as $sk)
                  <option value="{{ $sk -> Kode}}">{{ $sk -> Keterangan }}</option>
                @endforeach
              </select></td>
            </tr>

            <tr style="font-size: 16px">
              <td><br>Akun
              </br><select id="angkut" name="akun" required>
                <option hidden=""> - Akun - </option>
                <option value="524114">524114</option>
                <option value="524119">524119</option>
              </select></td>
            </tr>

            <tr style="font-size: 16px">
              <td><br>Keterangan Lain-Lain
              <br><input name="ket" type="text" placeholder = "Keterangan Lain-Lain" size="42" required>
              <input hidden name="status" value="0"></input>
            </tr>


          </table><center></br></br>

        <h2 class="title"><b>Rincian Biaya</b></h2>
        <hr style="border-width: 2px; border-color: black;"></hr>


                <h3><center>UANG TRANSPORT</center></h3>
                <div class="form-group">
                    <label>Transport</label>
                    <input id="trspt-ht" type="text" name="h_ku" placeholder=" Harga Transportasi" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                    <input id="trspt-tht" type="text" name="t_ku" placeholder=" Total" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                </div>
                <div class="form-group">
                    <label>Tiket</label>
                    <input type="text" name="no_berangkat" placeholder="No Tiket Berangkat" class="form-control"></input>
                    <input type="text" name="no_kembali" placeholder="No Tiket Pulang" class="form-control"></input>
                    <input id="tkt-ht" type="number" name="h_tiket" placeholder="Harga Tiket" class="form-control"></input>
                    <input id="tkt-tht" type="number" name="t_transport" placeholder="Total" class="form-control prc"></input>
                </div>

                <h3><center>UANG PENGINAPAN</center></h3>
                <div class="form-group">
                    <label>Penginapan</label>
                    <input type="text" name="n_penginapan" placeholder="Nama Penginapan" class="form-control"></input>
                    <input id="pgp-jml" type="number" name="j_penginapan" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                    <input id="pgp-ht" type="number" name="h_penginapan" placeholder="Harga Tetap" class="form-control"></input>
                    <input id="pgp-st" type="text" name="t_penginapan" placeholder="Total" class="form-control prc"></input>
                </div>

                <h3><center>UANG HARIAN</center></h3>
                <div class="form-group">
                    <label>Harian Normal</label>
                    <input min="0" id="hn-jml" name="j_hn" type="number" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                    <select id="hn-ht" name="h_hn" placeholder="Harga Tetap" class="form-control"></select>
                    <input id="hn-st" type="number" name="t_hn" placeholder="Total" class="form-control prc">
                    </input>
                </div>

                <div class="form-group">
                    <label>Full Day</label>
                    <input id="fd-jml" type="number" name="j_fd" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                    <input id="fd-ht" type="number" name="h_fd" placeholder="Harga Tetap" class="form-control"></input>
                    <input id="fd-st" type="number" name="t_fd" placeholder="Total" class="form-control prc"></input>
                </div>

                <div class="form-group">
                    <label>Full Board</label>
                    <input id="fb-jml" type="number" name="j_fb" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                    <input id="fb-ht" type="number" name="h_fb" placeholder="Harga Tetap" class="form-control"></input>
                    <input id="fb-st" type="number" name="t_fb" placeholder="Total" class="form-control prc"></input>
                </div>

                <div class="form-group">
                    <label>Diklat</label>
                    <input id="dkl-jml" type="number" name="j_diklat" placeholder="Jumlah" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></input>
                    <input id="dkl-ht" type="number" name="h_diklat" placeholder="Harga Tetap" class="form-control"></input>
                    <input id="dkl-st" type="number" name="t_diklat" placeholder="Total" class="form-control prc"></input>
                </div>

                <div class="form-group">
                    <label>Total Uang Harian</label></br>
                    <input readonly class="form-control" name="t_uh" id="result"></input>
                </div>

                <div class="form-group">
                    <label>Total Uang Keseluruhan</label></br>
                    <input readonly class="form-control" name="t_all" id="t_keseluruhan"></input>
                </div>

                <div class="form-group">
                    <label>Terbilang</label></br>
                    <input readonly size="150" id="terbilang" name="terbilang"></input>
                </div>

                <input hidden name="status" value="0"></input>

                <div class="form-group">
                    <div class="col-md-2 col-md-offset-5">
        <center><button type="submit" class="btn btn-primary">Submit</button></center>
      </div>
    </div>
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

    <script type="text/javascript">
    $('#tujuan').change(function(){
    var tujuanID = $(this).val();    
    if(tujuanID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/input-data/{id}/edit/getHN')}}?id="+tujuanID,
           success:function(res){               
            if(res){
                $("#hn-ht").empty();
                $.each(res,function(key,value){
                    $("#hn-ht").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#hn-ht").empty();
            }
           }
        });
    }  
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
