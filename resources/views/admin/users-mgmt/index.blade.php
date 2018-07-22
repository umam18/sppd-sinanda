@extends('admin.users-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
        <!-- alert create user -->
        @if(session()->has('create_user'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('create_user')}}</strong>
          </div>
        </div>
        @endif

        <!-- alert create user -->
        @if(session()->has('update_user'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('update_user')}}</strong>
          </div>
        </div>
        @endif

        <!-- alert create user -->
        @if(session()->has('delete_user'))
        <div class="row" style="width: 1070px; margin-left: 5px;">
          <div class="alert alert-info">
              <strong>{{ session()->get('delete_user')}}</strong>
          </div>
        </div>
        @endif

    <div class="row">
        <div class="col-sm-8">
          <a class="btn btn-primary" href="{{ route('user-management.create') }}">Tambah User</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('user-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.admin.search', ['title' => 'Pencarian'])
          @component('layouts.admin.two-cols-search-row', ['items' => ['Nama User', 'Nama Lengkap'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['namauser'] : '', isset($searchingVals) ? $searchingVals['namalengkap'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama User</th>
                <th width="25%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                <th width="30%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Nama Lengkap</th>
                <th width="10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Role</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $user->namauser }}</td>
                  <td>{{ $user->email }}</td>
                  <td class="hidden-xs">{{ $user->namalengkap }}</td>
                  <td class="hidden-xs">{{ $user->role }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('user-management.edit', ['id' => $user->id]) }}" class="btn btn-warning col-sm-5 col-xs-5 btn-margin" style="margin-left: 10px;">
                        Edit
                        </a>
                        @if ($user->namauser != Auth::user()->namauser)
                        <button type="submit" class="btn btn-danger col-sm-5 col-xs-5 btn-margin" style="margin-left: 5px;">
                          Hapus
                        </button>
                        @endif
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
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
@endsection
