@extends('admin.permenkeu.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
  <!-- /.box-header -->
  <div class="box">
    <div class="box-header">
    <!-- alert create permenkeu -->
        @if(session()->has('create_permenkeu'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('create_permenkeu')}}</strong>
          </div>
        </div>
        @endif

        <!-- alert create permenkeu -->
        @if(session()->has('update_permenkeu'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('update_permenkeu')}}</strong>
          </div>
        </div>
        @endif

        <!-- alert create permenkeu -->
        @if(session()->has('delete_permenkeu'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('delete_permenkeu')}}</strong>
          </div>
        </div>
        @endif
  </div>

  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <form method="POST" action="{{ route('permenkeu.search') }}">
         {{ csrf_field() }}
        @component('layouts.admin.search', ['title' => 'Pencarian'])
          @component('layouts.admin.two-cols-search-row', ['items' => ['Provinsi'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['provinsi'] : '']])
          @endcomponent
        @endcomponent
      </form>
      
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="3%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending"><center>ID</center></th>
                <th width="25%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"><center>Nama Provinsi</center></th>
                 <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"><Center>Uang Harian</Center></th>
                 <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"><center>Uang Full Day</center></th>
                 <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"><center>Uang Full Boad</center></th>
                 <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"><center>Uang Diklat</center></th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($permenkeu as $p)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $p->id }}</td>
                  <td>{{ $p->provinsi }}</td>
                  <td>{{ $p->Harian_Normal }}</td>
                  <td>{{ $p->Fullboard_Dalam }}</td>
                  <td>{{ $p->Harian_Fullday }}</td>
                  <td>{{ $p->Diklat }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('permenkeu.destroy', ['id' => $p->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('permenkeu.edit', ['id' => $p->id]) }}" class="btn btn-warning col-sm-10 col-xs-5 btn-margin" style="margin-left: 10px;">
                        Edit
                        </a>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
<!--             <tfoot>
              <tr>
                <th width="10%" rowspan="1" colspan="1">User Name</th>
                <th width="20%" rowspan="1" colspan="1">Email</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">Full Name</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">Role</th>
                <th rowspan="1" colspan="2">Action</th>
              </tr>
            </tfoot> -->
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($permenkeu)}} of {{count($permenkeu)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $permenkeu->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
@endsection
