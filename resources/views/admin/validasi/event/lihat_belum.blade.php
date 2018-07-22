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
        @if(session()->has('validasi_event'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('validasi_event')}}</strong> <!-- validasi event -->
          </div>
        </div>
        @endif

        @if(session()->has('update_event'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('update_event')}} </strong> <!-- update event -->
          </div>
        </div>
        @endif

        @if(session()->has('delete_event'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('delete_event')}} </strong> <!-- update event -->
          </div>
        </div>
        @endif
      </div>

    <div class="box-body">

    <div class="row">
      <div class="col-sm-12"></div>
    </div>

    <form method="POST" action="{{ route('v_event.search') }}">
       {{ csrf_field() }}
      @component('layouts.admin.search', ['title' => 'Pencarian'])
        @component('layouts.admin.two-cols-search-row', ['items' => ['Maksud'],
        'oldVals' => [isset($searchingVals) ? $searchingVals['maksud'] : '']])
        @endcomponent
      @endcomponent
    </form>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tujuan</center></th>
                <th width = "21%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Maksud Kegiatan</center></th>
                <th width = "16%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tanggal Berangkat</center></th>
                <th width = "16%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tanggal Kembali</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Transportasi</center></th>
                <th width = "14%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1; ?>
            @foreach($event as $count => $e)
            @if($e -> status == '0')
                <tr role="row" class="odd">
                  <td><?php echo $count+1 ?></td>
                  <td>{{ $e -> tujuan }}</td>
                  <td>{{ $e -> maksud }}</td>
                  <td>{{strftime("%d %B %Y", strtotime($e->tanggal_berangkat))}}</td>
                  <td>{{strftime("%d %B %Y", strtotime($e->tanggal_kembali))}}</td>
                  <td>{{ $e -> transportasi }}</td>
				          <td>
                    <a href="{{ route('belum_validasi.event', ['id' => $e->id]) }}" class="btn btn-info col-sm-12 btn-info">Tinjau</a>
                  </td>
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
