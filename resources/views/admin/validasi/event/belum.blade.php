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
        @if(session()->has('update_event'))
        <div class="row" style="width: 1070px; margin-left: 10px;">
          <div class="alert alert-info">
              Data <strong>{{$event->nama}}</strong>{{ session()->get('update_event')}} <!-- update event -->
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
        <form action="{{ route('lihat_belum.event') }}">
    <input type="submit" value="Kembali" />
</form>
      </div>

  <div class="box-body">
    <div class="row">
      <div class="col-sm-12"></div>
    </div>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">

        @if ($add->status == '0' && count($event) > '0')
        <form method="post" action="{{ route('eventpengikut.update', ['id' => $add->id]) }}" onsubmit="return confirm('Are you sure?')">
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input hidden name="status" value="{{ $add -> status}}">
          <button type="submit" class="btn btn-info">Validasi Nominatif</button>
        </form>
        @else
        <button class="btn btn-danger" onclick="cek()">Validasi Nominatif</button>
        @endif

          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</center></th>
                <th width = "22%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Nama Pegawai</center></th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>NIP Pegawai</center></th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Posisi</center></th>
                <th width = "13%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Uang Harian</center></th>
                <th width = "17%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Uang Fullday</center></th>
                <th width = "14%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>
            @foreach($event as $count => $e)
            @if ($e -> status == '0')
                <tr role="row" class="odd">
                  <td><?php echo $count+1 ?></td>
                  <td>{{ $e -> nama }}</td>
                  <td>{{ $e -> nip }}</td>
                  <td>{{ $e -> posisi }}</td>
                  <td>{{ $e -> t_hn }}</td>
                  <td>{{ $e-> t_fd }}</td>
                  <td>
                  <form method="post" action="{{ route('eventpengikut.destroy', ['id' => $e->id]) }}" onsubmit="return confirm('Apakah Anda Yakin?')">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{ route('espd.edit', ['id' => $e->id]) }}" class="btn btn-info col-sm-5 btn-info">
                  Edit
                  </a>
                  <button type="submit" class="btn btn-danger col-sm-6 btn-danger" style="margin-left: 10px;">
                  Delete
                  </button>
                  </form>
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
    </div>

  <script type="text/javascript">
    function goBack() 
    {
        window.history.back()
    }
  </script>

  <script type="text/javascript">
    function cek()
    {
      alert("Jumlah Orang Minimal 2! Harap Hubungi Petugas Untuk Memperbaiki!");
    }
  </script>

    </section>
@endsection
