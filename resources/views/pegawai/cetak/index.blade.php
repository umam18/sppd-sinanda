@extends('pegawai.cetak.base')
@section('action-content')

<?php 
  setlocale(LC_ALL, 'IND');
?>

<!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
  <div class="box-body">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
            <form method="POST" action="{{ route('cetak.search') }}">
               {{ csrf_field() }}
               @component('layouts.pegawai.search', ['title' => 'Pencarian'])
                @component('layouts.pegawai.two-cols-date-search-row', ['items' => ['Dari', 'Sampai'],
                'oldVals' => [isset($searchingVals) ? $searchingVals['dari'] : '', isset($searchingVals) ? $searchingVals['sampai'] : '']])
                @endcomponent
               @endcomponent
            </form>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>No</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Nama</th>
                <th width = "22%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Maksud Kegiatan</th>
                <th width = "18%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tujuan</th>
                <th width = "16%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Tanggal Berangkat</th>
                <th width = "10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SPD</center></th>
                <th width = "13%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><center>Rincian Biaya</center></th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1; ?>
            @foreach($tampil as $s)
                <tr role="row" class="odd">
                  <td><?php echo $no++ ?></td>
                  <td>{{ $s -> nama }}</td>
                  <td>{{ $s -> maksud }}</td>
                  <td>{{ $s -> tujuan }}</td>
                  <td>{{strftime("%d %B %Y", strtotime($s->tanggal_berangkat))}}</td>

                  <td><center>
                    @if ($s->status == '1')
                    <form class="row" method="POST" action="{{ route('cetak.spd', ['id' => $s->id]) }}" onsubmit="return confirm('Are you sure?')">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button hidden type="submit" class="btn btn-danger btn-margin">
                          Cetak
                      </button>
                    </form>
                    @else
                      <button onclick="alerts()" class="btn btn-danger btn-warning" >
                      Belum Divalidasi
                      </button>
                    @endif
                  </center></td>

                  <td><center>
                    @if ($s->status == '1')
                    <form class="row" method="POST" action="{{ route('cetak.rbiaya', ['id' => $s->id]) }}" onsubmit="return confirm('Are you sure?')">
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
&nbsp;&nbsp;&nbsp;{{ $tampil->links() }}
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

    </section>
@endsection
