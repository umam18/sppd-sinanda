@extends('admin.validasi.event.base')
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
    <div class="row">
      <div class="col-sm-12"></div>
    </div>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</center></th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Pejabat (PPK)</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Nama Pegawai</center></th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>NIP</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Pangkat</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tanggal Berangkat</center></th>
                <th width = "10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Posisi</center></th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1; ?>
            @foreach($event as $e)
            @if ($e->status == '1')
                <tr role="row" class="odd">
                  <td><?php echo $no++ ?></td>
                  <td>{{ $e -> pejabat }}</td>
                  <td>{{ $e -> nama }}</td>
                  <td>{{ $e -> nip }}</td>
                  <td>{{ $e -> pangkat }}</td>
                  <td>{{strftime("%d %B %Y", strtotime($e->tanggal_berangkat))}}</td>
                  <td>{{ $e -> posisi }}</td>
              </tr>
              @endif
              @endforeach
            </tbody>
            </table>
        </div>
      </div>

  <div class="row">

  <div class="col-sm-7">
    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
      {{ $event->links() }}
    </div>
  </div>
</div>

    </div>
    </section>
@endsection
