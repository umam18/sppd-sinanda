@extends('admin.data-pegawai.base')

@section('action-content')

<head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>

</head>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Pegawai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('pembebanan.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Kode</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="kode" value="{{ old('kode') }}" required autofocus>

                                @if ($errors->has('kode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}" required autofocus>

                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>

                    <script type="text/javascript">
                        $(".livesearch").chosen();
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
