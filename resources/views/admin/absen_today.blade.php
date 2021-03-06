@extends('layouts.app') @section('_addmeta')
<script src="{{asset('js/sweetalert.min.js')}}"></script>
@endsection @section('content') {{-- content --}}
<div id="page_content">
  <div id="page_content_inner">
      <h4 class="heading_a uk-margin-bottom">Data Absen
          <a href="{{route('get-absen-records-download-all')}}" data-uk-tooltip="{pos:'right'}" title="Download Record">
            <i class="md-icon material-icons uk-text-primary">cloud_download</i>
          </a>
        </h4>
        <div class="md-card uk-margin-medium-bottom">
          <div class="md-card-content">
            <table id="dt_tableTools" class="uk-table" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Pegawai ID</th>
                  <th>Nama</th>
                  <th>Tanggal Terbuat</th>
                  <th>Tanggal Diubah</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($absens as $ins)
                <tr>
                  <td>{{$ins->id}}</td>
                  <td>{{$ins->pegawai_id}}</td>
                  <td>{{$ins->pegawai->nama}}</td>
                  <td>{{$ins->created_at}}</td>
                  <td>{{$ins->updated_at}}</td>
                  <td class="uk-text-center">
                    <a data-uk-tooltip="{pos:'top'}" title="Hapus pegawai" href="{{route('get-absen-delete-id',$ins->id)}}">
                      <i class="md-icon material-icons uk-text-danger">remove_circle</i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    <!-- statistics (small charts) -->
    @if($absenRecordsToday->count() <1 ) <div>
    <h3 class="uk-text-danger">Belum Ada Pegawai yg Absen</h3>
  </div>
  <div class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show"
    data-uk-sortable data-uk-grid-margin>
    @else
    <div>
      <h3>Absen Hari Ini</h3>
    </div>
    <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-3 uk-grid-medium uk-sortable sortable-handler hierarchical_show"
      data-uk-sortable data-uk-grid-margin>

      @foreach($absenRecordsToday as $abs)
      <div>
        <div class="md-card md-card-hover">
          <div class="md-card-head md-bg-default">
            <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
              <i class="md-icon material-icons md-icon-light"></i>
              <div class="uk-dropdown uk-dropdown-small">
                <ul class="uk-nav">
                  <li>
                    <a href="">Edit</a>
                  </li>
                  <li>
                    <a href="">Remove</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="uk-text-center">
              <img class="md-card-head-avatar" src="#" alt="">
            </div>
            <h3 class="md-card-head-text uk-text-center md-color-white">
              {{$abs->pegawai->nama}}
              <span class="uk-text-truncate">
                {{$abs->pegawai->status_pegawai == 2 ? 'active' : ''}} {{$abs->pegawai->status_pegawai == 1 ? 'waiting' : ''}} {{$abs->pegawai->status_pegawai
                == 0 ? 'inactive' : ''}}
              </span>
            </h3>
          </div>
          <div class="md-card-content">
            <ul class="md-list">
              <li>
                <div class="md-list-content">
                  <span class="md-list-heading">ID : {{$abs->pegawai->id}}</span>
                  {{--
                  <span class="uk-text-small uk-text-muted"></span> --}}
                </div>
              </li>
              <li>
                <div class="md-list-content">
                  <span class="md-list-heading">No KTP</span>
                  <span class="uk-text-small uk-text-muted uk-text-truncate">{{$abs->pegawai->no_ktp}}</span>
                </div>
              </li>
              <li>
                <div class="md-list-content">
                  <span class="md-list-heading">Gaji</span>
                  <span class="uk-text-small uk-text-muted">{{($abs->pegawai->gaji)}}</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach @endif
    </div>
    <div class="uk-grid">
      <div class="uk-width-1-1">
        <center>
          {{$absenRecordsToday->links('pagination.uk')}}
        </center>
      </div>
    </div>
    <!-- large chart -->
    {{-- <div class="uk-grid">
      <div class="uk-width-1-1">
        <div class="md-card">
          <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
              <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
              <i class="md-icon material-icons">&#xE5D5;</i>
            </div>
            <h3 class="md-card-toolbar-heading-text">
              List Semua Absen
            </h3>
          </div>
          <div class="md-card-content">

            <div class="mGraph-wrapper">
              <table class="uk-table uk-table-nowrap">
                <thead>
                  <tr>
                    <th class="uk-width-1-10">ID</th>
                    <th>ID Pegawai</th>
                    <th>Tanggal</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($absens as $p)
                  <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->pegawai_id}}</td>
                    <td>{{$p->created_at}}</td>
                    <td class="uk-text-center">
                      <a data-uk-tooltip="{pos:'top'}" title="Hapus Absen" href="{{route('get-absen-delete-id',$p->id)}}">
                        <i class="md-icon material-icons uk-text-danger">remove_circle</i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$absens->links('pagination.uk')}}
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</div>
{{-- end content --}} @endsection @section('_addscript')
<!-- datatables -->
<script src="{{asset('altair/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<!-- datatables tableTools-->
<script src="{{asset('altair/bower_components/datatables-tabletools/js/dataTables.tableTools.js')}}"></script>
<!-- datatables custom integration -->
<script src="{{asset('altair/assets/js/custom/datatables_uikit.min.js')}}"></script>
<!--  datatables functions -->
<script src="{{asset('altair/assets/js/pages/plugins_datatables.min.js')}}"></script>

<script>
  @if(Session::has('absen_success_deleted'))
  swal("Success!", "record berhasil di hapus.", "success")
  @elseif(Session::has('absen_failed_deleted'))
  swal("Warning!", "Gagal menghapus record.", "warning")
  @endif
</script>
@endsection