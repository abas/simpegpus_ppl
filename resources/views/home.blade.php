@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Mahasiswa
                    <a href="{{route('add')}}" class="btn btn-success">Add</a>
                
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                <table class="table">
                    <tr>
                        <td><b>Nama</b></td>
                        <td><b>Nim</b></td>
                        <td><b>Mata Kuliah</b></td>
                        <td><b>Nilai</b></td>
                        <td><b>Status</b></td>
                    </tr>
                @foreach($mhs as $data)
                    <tr>
                        <td>{{$data->nama_siswa}}</td>
                        <td>{{$data->nim}}</td>
                        <td>{{$data->mata_kuliah}}</td>
                        <td>{{$data->nilai}}</td>
                        <td>{{$data->status}}</td>    
                    </tr>
                @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
