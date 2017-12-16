@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Input Data</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <b>{{ session('status') }}</b>
                        </div>
                    @endif
                    @if(session('msg'))
                        <div class="alert alert-danger">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('addData') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('nama_siswa') ? ' has-error' : '' }}">
                        <label for="nama_siswa" class="col-md-4 control-label">Nama</label>

                        <div class="col-md-6">
                            <input id="nama_siswa" type="nama_siswa" class="form-control" name="nama_siswa" value="{{ old('nama_siswa') }}" required autofocus>

                            @if ($errors->has('nama_siswa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama_siswa') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">
                        <label for="nim" class="col-md-4 control-label">Nim</label>

                        <div class="col-md-6">
                            <input id="nim" type="nim" class="form-control" name="nim" value="{{ old('nim') }}" required autofocus>

                            @if ($errors->has('nim'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nim') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('mata_kuliah') ? ' has-error' : '' }}">
                        <label for="mata_kuliah" class="col-md-4 control-label">Mata kuliah</label>

                        <div class="col-md-6">
                            <input id="mata_kuliah" type="mata_kuliah" class="form-control" name="mata_kuliah" value="{{ old('mata_kuliah') }}" required autofocus>

                            @if ($errors->has('mata_kuliah'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mata_kuliah') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }}">
                        <label for="nilai" class="col-md-4 control-label">Nilai</label>

                        <div class="col-md-6">
                            <input id="nilai" type="nilai" class="form-control" name="nilai" value="{{ old('nilai') }}" required autofocus>

                            @if ($errors->has('nilai'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nilai') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Add
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
