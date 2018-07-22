@extends('pegawai.validasi.event.base')
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

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">

<form action="{{ route('lihat-event_belum.event') }}">
    <input type="submit" value="Kembali" />
</form><br>

          <a href="{{ route('add-pengikut.show', ['id' => $add->id]) }}" class="btn btn-warning">Tambah Pengikut</a>

          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</center></th>
                <th width = "22%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Nama Pegawai</center></th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>NIP Pegawai</center></th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Posisi</center></th>
                <th width = "13%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Uang Harian</center></th>
                <th width = "17%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Uang Fullday</center></th>
                <th width = "14%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
            @foreach($event as $count => $e)
                <tr role="row" class="odd">
                  <td><?php echo $count+1 ?></td>
                  <td>{{ $e -> nama }}</td>
                  <td>{{ $e -> nip }}</td>
                  <td>{{ $e -> posisi }}</td>
                  <td>{{ $e -> t_hn }}</td>
                  <td>{{ $e-> t_fd }}</td>
                  <td>
                  <form method="post" action="{{ route('validasi-event.destroy', ['id' => $e->id]) }}" onsubmit="return confirm('Are you sure?')">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{ route('espd-event.edit', ['id' => $e->id]) }}" class="btn btn-info col-sm-5 btn-info">
                  Edit
                  </a>
                  <button type="submit" class="btn btn-danger col-sm-6 btn-danger" style="margin-left: 10px;">
                  Delete
                  </button>
                  </form>
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
      {{ $event->links() }}
    </div>
  </div>
</div>

    </div>
    </div>
      <script>
    function goBack() 
    {
        window.history.back()
    }
  </script>
    </section>
@endsection
