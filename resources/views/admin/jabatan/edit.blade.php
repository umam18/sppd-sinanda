@extends('admin.jabatan.base')

@section('action-content')

<head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>

</head>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Update Jabatan</div>
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('jabatan.update', ['id' => $jabatan->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <select name="jabatan" class="livesearch" required>
                                    <option>{{$jabatan->jabatan}}</option>
                                      @foreach($kode as $k)
                                        <option>{{ $k->jabatan }}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
