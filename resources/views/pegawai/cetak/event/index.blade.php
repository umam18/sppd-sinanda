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
    <div class="row">
      <div class="col-sm-12"></div>
      <form method="POST" action="{{ route('cetakevent.search') }}">
               {{ csrf_field() }}
               @component('layouts.pegawai.search', ['title' => 'Pencarian'])
                @component('layouts.pegawai.two-cols-search-row', ['items' => ['Maksud'],
                'oldVals' => [isset($searchingVals) ? $searchingVals['maksud'] : '']])
                @endcomponent
               @endcomponent
            </form>
    </div>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</center></th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Pejabat (PPK)</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tujuan</center></th>
                <th width = "30%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Maksud Kegiatan</center></th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tanggal Berangkat</center></th>
                <th width = "10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Cetak</center></th>
                <th width = "5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1; ?>
            @foreach($event as $count => $e)
                <tr role="row" class="odd">
                  <td><?php echo $count+1 ?></td>
                  <td>{{ $e -> pejabat }}</td>
                  <td>{{ $e -> tujuan }}</td>
                  <td>{{ $e -> maksud }}</td>
                  <td>{{strftime("%d %B %Y", strtotime($e->tanggal_berangkat))}}</td>
                  <td>
                  	 @if ($e->status == '1')
                  	<form class="row" method="POST" action="{{ route('espd.nominatif', ['id' => $e->id]) }}" onsubmit="return confirm('Apakah Anda Yakin?')">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button style="margin-left: 15px;" hidden type="submit" class="btn btn-warning btn-margin">
                      Nominatif
                      </button>
                    </form>
                    @else
                      <button onclick="alerts()" class="btn btn-danger btn-warning">
                      Belum Divalidasi
                      </button>
                    @endif
                  </td>
                  <td><a href="{{ route('lihat_cetak.events', ['id' => $e->id]) }}" class="btn btn-info col-sm-10 btn-info">Lihat</a></td>
              </tr>
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

<script>
function alerts() {
    alert("Data belum divaldiasi oleh Admin");
}
</script>

    </section>
@endsection
