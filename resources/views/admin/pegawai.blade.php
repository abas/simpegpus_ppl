@extends('layouts.app') 
@section('_addmeta')
<script src="{{asset('js/sweetalert.min.js')}}"></script>
@endsection 
@section('content') {{-- content --}}
<div id="page_content">
  <div id="page_content_inner">
    <!-- statistics (small charts) -->
    <div>
      <h3>Data Pegawai Terbaru
        <button class="md-btn md-btn-success md-btn-small md-btn-wave-light waves-effect waves-button waves-light" data-uk-modal="{target:'#add_pegawai'}">
          <span class="menu_icon">
            <i class="material-icons uk-text-contrast">add</i>
          </span>
        </button>
      </h3>
    </div>
    <div class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show"
      data-uk-sortable data-uk-grid-margin>
      @php $i=1; $colors = ['pink','teal','red','cyan','orange']; @endphp @foreach($newPegawais as $np)
      <div>
        <div class="md-card md-card-hover">
          <div class="md-card-head md-bg-{{$colors[$i-1]}}-500">
            <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
              <i class="md-icon material-icons md-icon-light"></i>
              <div class="uk-dropdown uk-dropdown-small">
                <ul class="uk-nav">
                  <li>
                    <a href="{{route('get-pegawai-update-id',$np->id)}}">Edit</a>
                  </li>
                  <li>
                    <a href="{{route('get-pegawai-delete-id',$np->id)}}">Remove</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="uk-text-center">
              <img class="md-card-head-avatar" src="{{asset('altair/assets/img/avatars/avatar_0'.$i.'.png')}}" alt="">
            </div>
            <h3 class="md-card-head-text uk-text-center md-color-white">
              {{$np->nama}}
              <span class="uk-text-truncate">
                {{$np->status_pegawai == 2 ? 'active' : ''}} {{$np->status_pegawai == 1 ? 'waiting' : ''}} {{$np->status_pegawai == 0 ? 'inactive'
                : ''}}
              </span>
            </h3>
          </div>
          <div class="md-card-content">
            <ul class="md-list">
              <li>
                <div class="md-list-content">
                  <span class="md-list-heading">ID : {{$np->id}}</span>
                  {{--
                  <span class="uk-text-small uk-text-muted"></span> --}}
                </div>
              </li>
              <li>
                <div class="md-list-content">
                  <span class="md-list-heading">No KTP</span>
                  <span class="uk-text-small uk-text-muted uk-text-truncate">{{$np->no_ktp}}</span>
                </div>
              </li>
              <li>
                <div class="md-list-content">
                  <span class="md-list-heading">Gaji</span>
                  <span class="uk-text-small uk-text-muted">{{($np->gaji)}}</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @php $i++;@endphp @endforeach
    </div>

    <!-- table -->
    <div class="uk-grid">
      <div class="uk-width-1-1">
        <div class="md-card">
          <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
              <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
              <i class="md-icon material-icons">&#xE5D5;</i>
              <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                <i class="md-icon material-icons">&#xE5D4;</i>
                <div class="uk-dropdown uk-dropdown-small">
                  <ul class="uk-nav">
                    <li>
                      <a href="#">Action 1</a>
                    </li>
                    <li>
                      <a href="#">Action 2</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <h3 class="md-card-toolbar-heading-text">
              Pegawai
            </h3>
          </div>
          <div class="md-card-content">

            <div class="mGraph-wrapper">
              <table class="uk-table uk-table-nowrap">
                <thead>
                  <tr>
                    <th class="uk-width-1-10">ID</th>
                    <th>Nama</th>
                    <th>No KTP</th>
                    <th>Gaji</th>
                    <th>Status Pegawai</th>
                    <th>Terdaftar</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pegawais as $p)
                  <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->no_ktp}}</td>
                    <td>{{$p->gaji}}</td>
                    <td>
                      {{$p->status_pegawai == 2 ? 'active' : ''}} {{$p->status_pegawai == 1 ? 'waiting' : ''}} {{$p->status_pegawai == 0 ? 'inactive'
                      : ''}}
                    </td>
                    {{--
                    <span class="uk-badge uk-badge-danger">{status_pegawai}</span> --}}
                    <td>{{$p->created_at}}</td>
                    <td class="uk-text-center">
                      <a data-uk-tooltip="{pos:'top'}" title="Update pegawai" href="{{route('get-pegawai-update-id',$p->id)}}">
                        <i class="md-icon material-icons uk-text-success">edit</i>
                      </a>
                      <a data-uk-tooltip="{pos:'top'}" title="Hapus pegawai" href="{{route('get-pegawai-delete-id',$p->id)}}">
                        <i class="md-icon material-icons uk-text-danger">remove_circle</i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$pegawais->links('pagination.uk')}}
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- end table --}}
  </div>
</div>

{{-- update pegawai modal --}} @if(Session::has('pegawai_update'))
<div class="uk-width-medium-2-3">
  <div class="uk-modal uk-open" id="update_pegawai" aria-hidden="true" style="display: block; overflow-y: auto;">
    <div class="uk-modal-dialog" style="top: 269.5px;">
      <form action="{{route('post-pegawai-update-id',Session('pegawai')->id)}}" method="POST">
        <div class="uk-modal-header">
          <h3 class="uk-modal-title">Tambah Pegawai</h3>
        </div>
        {{ csrf_field() }}
        <div class="uk-form-row">
          <label for="nama">Nama Pegawai</label>
          <input value="{{Session('pegawai')->nama}}" class="
                md-input 
                {{$errors->has('nama') ? ' md-input-danger' : ''}}
                " type="text" id="nama" name="nama" />
        </div>
        <div class="uk-form-row">
          <label for="no_ktp">Nomor KTP</label>
          <input disabled value="{{Session('pegawai')->no_ktp}}" class="
                md-input
                {{$errors->has('no_ktp') ? ' md-input-danger' : ''}}
                " type="text" id="no_ktp" name="no_ktp" />
        </div>
        <div class="uk-form-row">
          <label for="gaji">Gaji</label>
          <input value="{{Session('pegawai')->gaji}}" class="
                md-input
                {{$errors->has('gaji') ? ' md-input-danger' : ''}}
                " type="number" id="gaji" name="gaji" />
        </div>
        <div class="uk-form-row">
          <label for="status">Status</label>
          <input value="{{Session('pegawai')->status_pegawai}}" class="
                md-input
                {{$errors->has('status') ? ' md-input-danger' : ''}}
                " type="text" id="status" name="status_pegawai" />
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
      <form action="{{route('post-pegawai')}}" method="POST">
        <div class="uk-modal-header">
          <h3 class="uk-modal-title">Tambah Pegawai</h3>
        </div>
        {{ csrf_field() }}
        <div class="uk-form-row">
          <label for="nama">Nama Pegawai</label>
          <input class="
                  md-input 
                  {{$errors->has('nama') ? ' md-input-danger' : ''}}
                  " type="text" id="nama" name="nama" />
        </div>
        <div class="uk-form-row">
          <label for="no_ktp">Nomor KTP</label>
          <input class="
                  md-input
                  {{$errors->has('no_ktp') ? ' md-input-danger' : ''}}
                  " type="text" id="no_ktp" name="no_ktp" />
        </div>
        <div class="uk-form-row">
          <label for="gaji">Gaji</label>
          <input class="
                  md-input
                  {{$errors->has('gaji') ? ' md-input-danger' : ''}}
                  " type="number" id="gaji" name="gaji" />
        </div>
        <div class="uk-form-row">
          <label for="status">Status</label>
          <input min="0" max="2"
                  class="
                  md-input
                  {{$errors->has('status') ? ' md-input-danger' : ''}}
                  " type="number" id="status" name="status_pegawai" />
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
@if(Session::has('pegawai_errval'))
  @if($errors->has('nama'))
    swal("Warning!", "Error Request! {{$errors->first('nama')}}", "warning")
  @endif
  @if($errors->has('gaji'))
    swal("Warning!", "Error Request! {{$errors->first('gaji')}}", "warning")
  @endif
  @if($errors->has('status_pegawai'))
    swal("Warning!", "Error Request! {{$errors->first('status_pegawai')}}", "warning")
  @endif
@elseif(Session::has('pegawai_notfound'))
  swal("warning!", "ID pegawai tidak ada.", "info")
@elseif(Session::has('pegawai_failed'))
  swal("Maaf!","Terjadi kesalahan system","error");

@elseif(Session::has('pegawai_created'))
  swal("sukses!", "pegawai berhasil ditambahkan.", "success")
@elseif(Session::has('pegawai_failed_creared'))
  swal("Maaf!", "gagal menambahkan data pegawai.", "error")

@elseif(Session::has('pegawai_success_updated'))
  swal("Berhasil!","data Pegawai berhasil di ubah.","success")
@elseif(Session::has('pegawai_failed_updated'))
  swal("Maaf!","data Pegawai gagal di ubah.","error")
  
@elseif(Session::has('pegawai_success_deleted'))
  swal("Berhasil!","data Pegawai berhasil dihapus.","success")
@elseif(Session::has('pegawai_failed_deleted'))
  swal("Maaf!","data Pegawai gagal dihapus.","error")

@endif 
</script>
{{-- end content --}} @endsection @section('_addscript')

<!--  dashbord functions -->
<script src="{{asset('altair/assets/js/pages/dashboard.min.js')}}"></script>
@endsection