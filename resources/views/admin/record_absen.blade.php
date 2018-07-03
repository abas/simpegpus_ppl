@extends('layouts.app') @section('content')
@section('_addmeta')
<script src="{{asset('js/sweetalert.min.js')}}"></script>
@endsection 
<div id="page_content">
  <div id="page_content_inner">
    @php $idx = 0; @endphp
    @foreach($recordGroup as $data_abs => $val)
    <h4 class="heading_a uk-margin-bottom">Record Tanggal : {{$data_abs}}
        <a href="{{route('get-absen-records-download',$data_abs)}}">
            <i class="md-icon material-icons uk-text-primary">cloud_download</i>
          </a>
          <a href="{{route('get-absen_deleteall-by-date',$data_abs)}}">
            <i class="md-icon material-icons uk-text-danger">remove_circle</i>
          </a>
    </h4>
    <div class="md-card uk-margin-medium-bottom">
      <div class="md-card-content">
        <table id="dt_tableTools" class="uk-table" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID Absen</th>
              <th>Pegawai ID</th>
              <th>Nama Pegawai</th>
              <th>Tanggal Absen</th>
              <th>Tanggal Diubah</th>
            </tr>
          </thead>
          <tbody>
            @foreach($val as $absen)
            <tr>
              <td>{{$absen->id}}</td>
              <td>{{$absen->pegawai_id}}</td>
              <td>{{$absen->pegawai->nama}}</td>
              <td>{{$absen->created_at}}</td>
              <td>{{$absen->updated_at}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @php $idx++; @endphp
    @endforeach
  </div>
</div>
@endsection @section('_addscript')
<!-- page specific plugins -->
<!-- datatables -->
<script src="{{asset('altair/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<!-- datatables colVis-->
<script src="{{asset('altair/bower_components/datatables-colvis/js/dataTables.colVis.js')}}"></script>
<!-- datatables tableTools-->
<script src="{{asset('altair/bower_components/datatables-tabletools/js/dataTables.tableTools.js')}}"></script>
<!-- datatables custom integration -->
<script src="{{asset('altair/assets/js/custom/datatables_uikit.min.js')}}"></script>

<!--  datatables functions -->
<script src="{{asset('altair/assets/js/pages/plugins_datatables.min.js')}}"></script>

<script>
  $(function () {
    // enable hires images
    altair_helpers.retina_images();
    // fastClick (touch devices)
    if (Modernizr.touch) {
      FastClick.attach(document.body);
    }
  });
</script>
<script>
  @if(Session::has('absen_failed_deleteall'))
    swal("Warning!","Somthing Error will delete record","info")
  @elseif(Session::has('absen_success_deleteall'))
    swal("Success!","delete record successfully","success")
  @endif
</script>
@endsection