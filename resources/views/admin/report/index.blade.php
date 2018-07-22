@extends('admin.report.base')
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
    <div class="row">
        <div class="col-sm-4">
        <div class="col-sm-4">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.excel') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['dari']}}" name="dari" />
                <input type="hidden" value="{{$searchingVals['sampai']}}" name="sampai" />
                <button type="submit" class="btn btn-primary">
                  TAHUNAN
                </button>
            </form>
          </div>

          <div class="col-sm-4">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.excel2') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['dari']}}" name="dari" />
                <input type="hidden" value="{{$searchingVals['sampai']}}" name="sampai" />
                <button type="submit" class="btn btn-info">
                  NURUL HUDA
                </button>
            </form>
          </div>

          <div class="col-sm-4">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.excel3') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['dari']}}" name="dari" />
                <input type="hidden" value="{{$searchingVals['sampai']}}" name="sampai" />
                <button type="submit" class="btn btn-warning">
                  MARYADI
                </button>
            </form>
        </div>

    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
        <form method="POST" action="{{ route('report.search') }}">
           {{ csrf_field() }}
           @component('layouts.admin.search', ['title' => 'Pencarian'])
            @component('layouts.admin.two-cols-date-search-row', ['items' => ['Dari', 'Sampai'],
            'oldVals' => [isset($searchingVals) ? $searchingVals['dari'] : '', isset($searchingVals) ? $searchingVals['sampai'] : '']])
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
                <th width = "5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">No</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Pejabat (PPK)</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Nama Pegawai</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Tempat Tujuan</th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Tanggal Berangkat</th>
                <th width = "15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Tanggal Kembali</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($spd as $count => $s)
            @if ($s->status == '1')
                <tr role="row" class="odd">
                  <td><?php echo $count+1 ?></td>
                  <td>{{ $s->pejabat }}</td>
                  <td>{{ $s->nama }}</td>
                  <td>{{ $s->tujuan }}</td>
                  <td>{{strftime("%d %B %Y", strtotime($s->tanggal_berangkat))}}</td>
                  <td>{{strftime("%d %B %Y", strtotime($s->tanggal_kembali))}}</td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">

      </div>
    </div>
  </div>
    </section>
@endsection
