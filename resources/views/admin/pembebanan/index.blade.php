@extends('admin.pembebanan.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <a class="btn btn-primary" href="{{ route('pembebanan.create') }}">Add Kode Pembebanan</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <form method="POST" action="{{ route('pembebanan.search') }}">
         {{ csrf_field() }}
        @component('layouts.admin.search', ['title' => 'Search'])
          @component('layouts.admin.two-cols-search-row', ['items' => ['Kode', 'Keterangan'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['kode'] : '', isset($searchingVals) ? $searchingVals['keterangan'] : '']])
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
                <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><center>Kode</center></th>
                <th width="45%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><center>Keterangan</center></th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>

            <?php
            $no = 1; ?>
            @foreach ($pembebanan as $p)
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $no++ ?></td>
                  <td class="hidden-xs">{{ $p->kode }}</td>
                  <td class="hidden-xs">{{ $p->keterangan }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('pembebanan.destroy', ['id' => $p->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden"  name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin" style="margin-left: 115px;">
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
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($pembebanan)}} of {{count($pembebanan)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $pembebanan->links() }}
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