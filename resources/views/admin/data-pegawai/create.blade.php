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
                <div class="panel-heading">Tambah Pegawai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('data-pegawai.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="nama" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">NIP</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" min="0" name="nip" value="{{ old('lastname') }}" required>

                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pangkat') ? ' has-error' : '' }}">
                            <label for="middlename" class="col-md-4 control-label">Pangkat</label>

                            <div class="col-md-6">
                                <select name="pangkat" class="livesearch" required>
                                <option></option>
                                  @foreach($pangkat as $p)
                                    <option>{{$p->pangkat}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                                <select name="jabatan" class="livesearch" required>
                                <option></option>
                                  @foreach($jabatan as $j)
                                    <option>{{ $j->jabatan }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Tingkat</label>

                            <div class="col-md-6">
                                <select name="tingkat" required>
                                    <option hidden> - Tingkat - </option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
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

                    <script type="text/javascript">
                        $(".livesearch").chosen();
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
