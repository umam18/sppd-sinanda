@extends('pegawai.cetak.event.base')
@section('action-content')

<?php 
  setlocale(LC_ALL, 'IND');
  setlocale(LC_ALL, 'id_ID');
  date_default_timezone_set('Asia/Jakarta');
?>

<!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
  <div class="box-body">

                <button class="btn btn-danger" onclick="goBack()">Kembali</button><br></br> 

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Nama</th>
                <th width = "10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>NIP</th>
                <th width = "19%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Alat Transportasi</th>
                  <th width = "16%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tanggal Berangkat</th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tanggal Kembali</th>
                <th width = "13%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Rincian Biaya</center></th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1; ?>
            @foreach($event as $count => $e)
                <tr role="row" class="odd">
                  <td><?php echo $count+1 ?></td>
                  <td>{{ $e -> nama }}</td>
                  <td>{{ $e -> nip }}</td>
                  <td>{{ $e -> transportasi }}</td>
                  <td>{{strftime("%d %B %Y", strtotime($e->tanggal_berangkat))}}</td>
                  <td>{{strftime("%d %B %Y", strtotime($e->tanggal_kembali))}}</td>
                  <td><center>
                    @if ($e->status == '1')
                    <form class="row" method="POST" action="{{ route('cetak.event', ['id' => $e->id]) }}" onsubmit="return confirm('Apakah Anda Yakin?')">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button hidden type="submit" class="btn btn-danger btn-margin">
                      Cetak
                      </button>
                    </form>
                    @else
                      <button onclick="alerts()" class="btn btn-danger btn-warning">
                      Belum Divalidasi
                      </button>
                    @endif
                  </center></td>
              </tr>
              @endforeach
            </tbody>
            </table>
        </div>
        <div class="row">
<div class="col-sm-10">
<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
&nbsp;&nbsp;&nbsp;{{ $event->links() }}
</div>
</div>
</div>
      </div>
    </div>

<script>
function alerts() {
    alert("Data belum divaldiasi oleh Admin");
}
</script>

  <script>
  function goBack() 
  {
      window.history.back()
  }
</script>

    </section>
@endsection
