
@extends('layouts.app') @section('content') {{-- content --}}
<div id="page_content">
  <div id="page_content_inner">
    <!-- statistics (small charts) -->
    <div>
      <h3>Data Pegawai Terbaru</h3>
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
                    <a href="#">Edit</a>
                  </li>
                  <li>
                    <a href="#">Remove</a>
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

    <!-- large chart -->
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
                    <td>{{$p->no_ktp}}</td>
                    <td>{{$p->gaji}}</td>
                    <td>{{$p->status_pegawai}}</td>
                    {{--
                    <span class="uk-badge uk-badge-danger">{status_pegawai}</span> --}}
                    <td>{{$p->created_at}}</td>
                    <td class="uk-text-center">
                      <a href="#">
                        <i class="md-icon material-icons"></i>
                      </a>
                      <a href="#">
                        <i class="md-icon material-icons"></i>
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
  </div>
</div>
{{-- end content --}} @endsection