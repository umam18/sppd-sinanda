@extends('admin.validasi.base')
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

    <form method="POST" action="{{ route('validasi.search2') }}">
       {{ csrf_field() }}
      @component('layouts.admin.search', ['title' => 'Pencarian'])
        @component('layouts.admin.two-cols-search-row', ['items' => ['Nama'],
        'oldVals' => [isset($searchingVals) ? $searchingVals['nama'] : '']])
        @endcomponent
      @endcomponent
    </form>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Pejabat (PPK)</center></th>
                <th width = "18%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Nama Pegawai</center></th>
                <th width = "18%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>NIP Pegawai</center></th>
                <th width = "18%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Maksud Kegiatan</center></th>
                <th width = "21%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tujuan</center></th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1; ?>
            @foreach($spd as $s)
            @if ($s->status == '1')
                <tr role="row" class="odd">
                  <td><?php echo $no++ ?></td>
                  <td>{{ $s -> pejabat }}</td>
                  <td>{{ $s -> nama }}</td>
                  <td>{{ $s -> nip }}</td>
                  <td>{{ $s -> maksud }}</td>
                  <td>{{ $s -> tujuan}}</td>
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
      {{ $spd->links() }}
    </div>
  </div>
</div>

    </div>
    </section>
@endsection
