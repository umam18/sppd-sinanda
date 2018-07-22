@extends('admin.users-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user-management.update', ['id' => $user->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('namauser') ? ' has-error' : '' }}">
                            <label for="namauser" class="col-md-4 control-label">Nama User</label>

                            <div class="col-md-6">
                                <input id="namauser" type="text" class="form-control" name="namauser" value="{{ $user->namauser }}" required autofocus>

                                @if ($errors->has('namauser'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namauser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('namalengkap') ? ' has-error' : '' }}">
                            <label for="namalengkap" class="col-md-4 control-label">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="namalengkap" type="text" class="form-control" name="namalengkap" value="{{ $user->namalengkap }}" required>

                                @if ($errors->has('namalengkap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namalengkap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                                <input type="hidden" id="Role" type="text" class="form-control" name="role" value="{{ $user->role }}" required>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password Baru</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
