//parameter berupa string " bulan,tanggal,tahun "
function hitungSelisihHari(tgl1, tgl2){
    // varibel miliday sebagai pembagi untuk menghasilkan hari
    var miliday = 24 * 60 * 60 * 1000;
    //buat object Date
    var tanggal1 = new Date(tgl1);
    var tanggal2 = new Date(tgl2);
    // Date.parse akan menghasilkan nilai bernilai integer dalam bentuk milisecond
    var tglPertama = Date.parse(tanggal1);
    var tglKedua = Date.parse(tanggal2);
    var selisih = (tglKedua - tglPertama) / miliday;
    return selisih;
    }
function buat_tahun(nama){
    //ambil tahun ini
    var tgl = new Date();
    var th_ini = tgl.getFullYear();
    var pilih = "";
    //berikan pilihan untuk 1 th kebelakang dan 1 th kedepan
    document.write("<select name="+nama+" class='combo' onchange='hitung_selisih()'>");
    for(var i = th_ini - 100; i <= th_ini + 100; i++){
    if( i == th_ini ) pilih = "selected";
    else pilih = "";
    document.write("<option "+pilih+" >"+i+"</option>");
    }
    document.write("</select>");
    }
function buat_bulan(nama){
    var nama_bulan=new Array("Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
    //ambil bulan ini
    var tgl = new Date();
    var bln_ini = tgl.getMonth();
    var pilih = "";
    document.write("<select name="+nama+" class='combo' onchange='hitung_selisih()'>");
    for(var i = 0; i < nama_bulan.length; i++ ){
    var j = i+1;
    if(i == bln_ini) pilih = "selected";
    else pilih="";
    document.write("<option "+pilih+" value="+j+">"+nama_bulan[i]+"</option>");
        }
    document.write("</select>");
    }
function buat_tanggal(nama){
    var batas = 31;
    //ambil tanggal sekarang
    var tgl = new Date();
    var tgl_ini = tgl.getDate();
    var pilih = "";
    document.write("<select name="+nama+" class='combo' onchange='hitung_selisih()'>");
    for(var i = 1; i <= batas; i++ ){
    if(i == tgl_ini) pilih = "selected";
    else pilih="";
    document.write("<option "+pilih+" >"+i+"</option>");
        }
    document.write("</select>");
    }
function hitung_selisih(){
    //ambil tanggal berangkat dan kembali
    var berangkat = document.getElementsByName("berangkat");
    var kembali = document.getElementsByName("kembali");
    // bangun string untuk tanggal "tahun bulan tanggal"
    var tgl_berangkat = tgl_kembali ="";
    for(var i = 0; i < berangkat.length; i++){
        tgl_berangkat += berangkat[i].value+" ";
        tgl_kembali += kembali[i].value+" ";
        }
    var selisih = hitungSelisihHari(tgl_berangkat,tgl_kembali);
    //isikan hasil pada input dengan id = hasil
    document.getElementById("hasil").value = selisih;
    }
