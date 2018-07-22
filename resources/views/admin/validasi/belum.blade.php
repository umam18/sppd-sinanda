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
    @if(session()->has('validasi_spd'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('validasi_spd')}}</strong> <!-- validasi event -->
          </div>
        </div>
        @endif

        @if(session()->has('update_spd'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('update_spd')}} </strong> <!-- update event -->
          </div>
        </div>
        @endif

        @if(session()->has('delete_spd'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('delete_spd')}} </strong> <!-- update event -->
          </div>
        </div>
        @endif
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-sm-12"></div>
    </div>

    <form method="POST" action="{{ route('validasi.search') }}">
       {{ csrf_field() }}
      @component('layouts.admin.search', ['title' => 'Search'])
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
                <th width = "5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Pejabat (PPK)</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Nama Pegawai</center></th>
                <th width = "13%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>NIP</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Maksud Kegiatan</center></th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>
            @foreach($spd as $count => $s)
            <?php $no=1; ?>
            @if ($s->status == '0')
                <tr role="row" class="odd">
                  <td><?php echo $no++ ?></td>
                  <td>{{ $s -> pejabat }}</td>
                  <td>{{ $s -> nama }}</td>
                  <td>{{ $s -> nip }}</td>
                  <td>{{ $s -> maksud }}</td>

                  <td>
                  <form method="post" action="{{ route('eventpengikut.destroy', ['id' => $s->id]) }}" onsubmit="return confirm('Apakah Anda Yakin?')">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{ route('spd.edit', ['id' => $s->id]) }}" class="btn btn-info col-sm-5 btn-info">
                  Edit
                  </a>
                  <button type="submit" class="btn btn-danger col-sm-6 btn-danger" style="margin-left: 10px;">
                  Delete
                  </button>
                  </form>
                  @endif
                  </td>
              </tr>
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
