@extends('layouts.app') @section('_addmeta')
<script src="{{asset('js/sweetalert.min.js')}}"></script>
@endsection @section('content') {{-- content --}}
<div id="page_content">
  <div id="page_content_inner">
    <!-- statistics (small charts) -->
    <div>
      <h3>Data Instansi Terbaru
        <button data-uk-tooltip="{pos:'right'}" title="Tambah Pegawai" class="
            md-btn 
            md-btn-warning 
            md-btn-small 
            md-btn-wave-light 
            waves-effect 
            waves-button 
            waves-light" data-uk-modal="{target:'#add_pegawai'}">
          <span class="menu_icon">
            <i class="material-icons uk-text-contrast">add</i>
          </span>
        </button>
      </h3>
    </div>
    <div class="uk-grid uk-grid-width-large-1-6 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show"
      data-uk-sortable data-uk-grid-margin>
      @php $i=1; $colors = ['pink','teal','red','cyan','orange','teal']; @endphp @foreach($newInstansis as $np)
      <div>
        <div class="md-card md-card-hover md-card-overlay" data-snippet-title="Smooth scrolling to top of page">
          <div class="md-card-content md-bg-light-blue-800 uk-text-left " style="cursor: pointer; ">
            <br>
            <br>
            <h3 class="uk-text-contrast">{{$np->nama_instansi}}</h3>
            <hr class="divider">
          </div>
          <div class="md-card-overlay-content">
            <div class="uk-clearfix md-card-overlay-header">
              <i title="detail" data-uk-tooltip="{pos:'left'}" class="md-icon 
                  md-icon 
                  material-icons 
                  md-card-overlay-toggler"></i>
              <h4>
                <i class="material-icons md-20 uk-text-success">nature</i> ID : {{$np->id}}
              </h4>
            </div>
            <div class="md-card-overlay-content-inner">
              <p class="uk-margin-bottom truncate-text is-truncated" style="height: 88px; overflow-wrap: break-word;">
                tercatat : {{$np->created_at}}
                <br> termutasi : {{\App\Mutasi::getCountOnInstansi($np->id)}} pegawai
              </p>
              <p>
                <span class="uk-badge uk-badge-success">ID : {{$np->id}}</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      @php $i++; if($i>5){$i=1;}@endphp @endforeach
    </div>
    <br>
    <center>
      {{$newInstansis->links('pagination.uk')}}
    </center>
    <h4 class="heading_a uk-margin-bottom">List Instansi
        <a 
          href="{{route('get-absen-records-download','asd')}}"
          data-uk-tooltip="{pos:'right'}"
          title="Download Record"
          >
          <i class="md-icon material-icons uk-text-primary">cloud_download</i>
        </a>
      </h4>
      <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
          <table id="dt_tableTools" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Termutasi</th>
                <th>Tanggal Terbuat</th>
                <th>Tanggal Diubah</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($instansis as $ins)
              <tr>
                <td>{{$ins->id}}</td>
                <td>{{$ins->nama_instansi}}</td>
                <td>{{\App\Mutasi::getCountOnInstansi($ins->id)}} pegawai</td>
                <td>{{$ins->created_at}}</td>
                <td>{{$ins->updated_at}}</td>
                <td class="uk-text-center">
                    <a data-uk-tooltip="{pos:'top'}" title="Update pegawai" href="{{route('get-instansi-update',$ins->id)}}">
                      <i class="md-icon material-icons uk-text-success">edit</i>
                    </a>
                    <a data-uk-tooltip="{pos:'top'}" title="Hapus pegawai" href="{{route('get-instansi-delete',$ins->id)}}">
                      <i class="md-icon material-icons uk-text-danger">remove_circle</i>
                    </a>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
    {{-- update pegawai modal --}} @if(Session::has('instansi_update'))
    <div class="uk-width-medium-2-3">
      <div class="uk-modal uk-open" id="update_pegawai" aria-hidden="true" style="display: block; overflow-y: auto;">
        <div class="uk-modal-dialog" style="top: 269.5px;">
          <form action="{{route('get-instansi-updated',Session('instansi')->id)}}" method="POST">
            <div class="uk-modal-header">
              <h3 class="uk-modal-title">Update Pegawai</h3>
            </div>
            {{ csrf_field() }}
            <div class="uk-form-row">
              <label for="nama">Nama Instansi</label>
              <input required 
                value="{{Session('instansi')->nama_instansi}}" 
                class="
                  md-input 
                  {{$errors->has('nama_instansi') ? ' md-input-danger' : ''}}
                  " type="text" id="nama" name="nama_instansi" />
            </div>
            <div class="uk-modal-footer uk-text-right">
              <button onclick="close_update_pegawai()" type="button" class="md-btn md-btn-flat md-btn-flat-danger uk-modal-close">Batal</button>
              <script>
                function close_update_pegawai() {
                  $('#update_pegawai').hide()
                  console.log("hidden");

                }
              </script>
              <button type="submit" class="md-btn md-btn-flat md-btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endif {{-- end update pegawai modal --}} {{-- update modal --}}
    <div class="uk-width-medium-2-3">
      <div class="uk-modal uk-open" id="add_pegawai" aria-hidden="false" style="display: none; overflow-y: auto;">
        <div class="uk-modal-dialog" style="top: 269.5px;">
          <form action="{{route('post-instansi-add')}}" method="POST">
            <div class="uk-modal-header">
              <h3 class="uk-modal-title">Tambah Instansi</h3>
            </div>
            {{ csrf_field() }}
            <div class="uk-form-row">
              <label for="nama">Nama Instansi</label>
              <input required 
                class="
                  md-input 
                  {{$errors->has('nama_instansi') ? ' md-input-danger' : ''}}
                  " type="text" id="nama" name="nama_instansi" />
            </div>
            <div class="uk-modal-footer uk-text-right">
              <button type="button" class="md-btn md-btn-flat md-btn-flat-danger uk-modal-close">Close</button>
              <button type="submit" class="md-btn md-btn-flat md-btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- end update modal --}}
    <script>
      @if(Session::has('instansi_errval'))
        @if($errors->has('nama_instansi'))
          swal("Warning!", "Error Request! {{$errors->first('nama')}}", "warning")
        @endif
      @elseif(Session::has('instansi_notfound'))
        swal("warning!", "ID instansi tidak ada.", "info")
      @elseif(Session::has('instansi_failed'))
        swal("Maaf!", "Terjadi kesalahan system", "error");

      @elseif(Session::has('instansi_created'))
        swal("sukses!", "instansi berhasil ditambahkan.", "success")
      @elseif(Session::has('instansi_failed_creared'))
        swal("Maaf!", "gagal menambahkan data instansi.", "error")

      @elseif(Session::has('instansi_success_updated'))
        swal("Berhasil!", "data instansi berhasil di ubah.", "success")
      @elseif(Session::has('instansi_failed_updated'))
        swal("Maaf!", "data instansi gagal di ubah.", "error")

      @elseif(Session::has('instansi_success_deleted'))
        swal("Berhasil!", "data instansi berhasil dihapus.", "success")
      @elseif(Session::has('instansi_failed_deleted'))
        swal("Maaf!", "data Pegawai gagal dihapus.", "error")

      @endif
    </script>
    {{-- end content --}} @endsection @section('_addscript')
    <!-- page specific plugins -->
    <!-- datatables -->
    <script src="{{asset('altair/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <!-- datatables tableTools-->
    <script src="{{asset('altair/bower_components/datatables-tabletools/js/dataTables.tableTools.js')}}"></script>
    <!-- datatables custom integration -->
    <script src="{{asset('altair/assets/js/custom/datatables_uikit.min.js')}}"></script>
    <!--  datatables functions -->
    <script src="{{asset('altair/assets/js/pages/plugins_datatables.min.js')}}"></script>

    <!--  dashbord functions -->
    <script src="{{asset('altair/assets/js/pages/dashboard.min.js')}}"></script>
    @endsection