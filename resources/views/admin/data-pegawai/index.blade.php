@extends('admin.data-pegawai.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <!-- alert create pegawai -->
        @if(session()->has('create_pegawai'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('create_pegawai')}}</strong>
          </div>
        </div>
        @endif

        <!-- alert create pegawai -->
        @if(session()->has('update_pegawai'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('update_pegawai')}}</strong>
          </div>
        </div>
        @endif

        <!-- alert create pegawai -->
        @if(session()->has('delete_pegawai'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('delete_pegawai')}}</strong>
          </div>
        </div>
        @endif
    <div class="row">
        <div class="col-sm-8">
          <a class="btn btn-primary" href="{{ route('data-pegawai.create') }}">Tambah Pegawai</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <form method="POST" action="{{ route('admin.search') }}">
         {{ csrf_field() }}
        @component('layouts.admin.search', ['title' => 'Pencarian'])
          @component('layouts.admin.two-cols-search-row', ['items' => ['Nama', 'Jabatan'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['nama'] : '', isset($searchingVals) ? $searchingVals['pangkat'] : '']])
          @endcomponent
        @endcomponent
      </form>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="2%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><center>No</center></th>
                <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><center>Nama Pegawai</center></th>
                <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><center>NIP</center></th>
                <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><center>Pangkat</center></th>
                <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><center>Jabatan</center></th>
                <th width="3%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><center>Tingkat</center></th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2"><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>

            <?php
            $no = 1; ?>
            @foreach ($pegawai as $p)
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $no++ ?></td>
                  <td class="hidden-xs">{{ $p->nama }}</td>
                  <td class="hidden-xs">{{ $p->nip }}</td>
                  <td class="hidden-xs">{{ $p->pangkat }}</td>
                  <td class="hidden-xs">{{ $p->jabatan }}</td>
                  <td class="hidden-xs">{{ $p->tingkat }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('data-pegawai.destroy', ['id' => $p->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden"  name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('data-pegawai.edit', ['id' => $p->id]) }}" class="btn btn-warning col-sm-5 col-xs-5 btn-margin" style="margin-left: 10px;">
                        Edit
                        </a>
                        <button type="submit" class="btn btn-danger col-sm-5 col-xs-5 btn-margin" style="margin-left: 5px;">
                        Hapus
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
            {{ $pegawai->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
@endsection
