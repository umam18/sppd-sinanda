@extends('admin.users-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user-management.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('namauser') ? ' has-error' : '' }}">
                            <label for="namauser" class="col-md-4 control-label">Nama User</label>

                            <div class="col-md-6">
                                <input id="namauser" type="text" class="form-control" name="namauser" value="{{ old('namauser') }}" required autofocus>

                                @if ($errors->has('namauser'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namauser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('namalengkap') ? ' has-error' : '' }}">
                            <label for="namalengkap" class="col-md-4 control-label">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="namalengkap" type="text" class="form-control" name="namalengkap" value="{{ old('namalengkap') }}" required>

                                @if ($errors->has('namalengkap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namalengkap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role">
                                    <option>Choose Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Petugas</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Buat
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
