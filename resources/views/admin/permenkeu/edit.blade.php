@extends('admin.users-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Permenkeu</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('permenkeu.update', ['id' => $permenkeu->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('Harian_Normal') ? ' has-error' : '' }}">
                            <label for="Harian_Normal" class="col-md-4 control-label">Uang Harian</label>
                            <div class="col-md-6">
                                <input id="Harian_Normal" type="text" class="form-control" name="Harian_Normal" value="{{ $permenkeu->Harian_Normal }}" required autofocus>

                                @if ($errors->has('Harian_Normal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Harian_Normal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Harian_Fullday') ? ' has-error' : '' }}">
                            <label for="Harian_Fullday" class="col-md-4 control-label">Uang Fullday</label>

                            <div class="col-md-6">
                                <input id="Harian_Fullday" type="text" class="form-control" name="Harian_Fullday" value="{{ $permenkeu->Harian_Fullday }}" required>

                                @if ($errors->has('Harian_Fullday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Harian_Fullday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Fullboard_Dalam') ? ' has-error' : '' }}">
                            <label for="Fullboard_Dalam" class="col-md-4 control-label">Uang Fullboard</label>

                            <div class="col-md-6">
                                <input id="Fullboard_Dalam" type="text" class="form-control" name="Fullboard_Dalam" value="{{ $permenkeu->Fullboard_Dalam }}" required>

                                @if ($errors->has('Fullboard_Dalam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Fullboard_Dalam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Diklat') ? ' has-error' : '' }}">
                            <label for="Diklat" class="col-md-4 control-label">Uang Diklat</label>

                            <div class="col-md-6">
                                <input id="Diklat" type="text" class="form-control" name="Diklat" value="{{ $permenkeu->Diklat }}" required>

                                @if ($errors->has('Diklat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Diklat') }}</strong>
                                    </span>
                                @endif
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
