<!DOCTYPE html>
<html>

<head>
  <title>Simpeg - Sistem Kepegawaian Puskesmas</title>

  <meta charset="UTF-8">
  <meta name="description" content="sistem kepegawaian puskesmas">
  <meta name="keywords" content="Admin,Panel,HTML,CSS,XML,JavaScript">
  <meta name="author" content="Gladiator Doscom 2018">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('css/notyf.min.css')}}" /> {{--
  <script src="{{asset('js/uikit.min.js')}}"></script> --}} {{--
  <script src="{{asset('js/uikit-icons.min.js')}}"></script> --}}

  <!-- UIkit CSS -->
  {{--
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/css/uikit.min.css" /> --}}

  <!-- UIkit JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/js/uikit-icons.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.15.1/slimselect.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.15.1/slimselect.min.css" rel="stylesheet"></link>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  @include('layouts.main.nav_header')
  <div class="content-background">
    <div class="uk-section-large">
      <div class="uk-container uk-container-large">
        <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
          <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
          <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
            @include('layouts.main.nav_menu')
          </div>
          <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
          <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
          <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
            <div class="uk-card uk-card-default uk-animation-slide-top">
              <div class="uk-card-body">
                <h4>Mutasi Pegawai</h4>
                <form method="POST" action="{{route('post-mutasi')}}">
                  {{ csrf_field() }}
                  <fieldset class="uk-fieldset">
                    <div class="uk-margin">
                      <div class="uk-position-relative">
                        <label for="pegawai">Nama</label>
                        <select class="uk-form-control" id="pegawai" name="pegawai_id">
                          <option value="">...</option>
                          @foreach($pegawais as $p)
                          <option value="{{$p->id}}">{{$p->nama}} _ID : {{$p->id}}</option>
                          @endforeach
                        </select>
                        <script>
                          new SlimSelect({
                            select: '#pegawai'
                          })
                        </script>
                      </div>
                    </div>
                    <div class="uk-margin">
                      <div class="uk-form-controls">
                        <label for="status_mustasi">Status Mutasi</label>
                        <select name="status_mutasi" id="status_mustasi">
                          <option value="">...</option>
                          <option value="1">A</option>
                          <option value="2">B</option>
                          <option value="3">C</option>
                        </select>
                        <script>
                          new SlimSelect({
                            select: '#status_mustasi'
                          })
                        </script>
                      </div>
                    </div>
                    <div class="uk-margin">
                      <div class="uk-form-controls">
                        <label for="instansi">Instansi</label>
                        <select id="instansi" name="instansi_id">
                          <option value="">...</option>
                          @foreach($instansis as $i)
                          <option value="{{$i->id}}">{{$i->nama_instansi}} _ID : {{$i->id}}</option>
                          @endforeach
                        </select>
                        <script>
                          new SlimSelect({
                            select: '#instansi'
                          })
                        </script>
                      </div>
                    </div>
                    <div class="uk-margin">
                      <button type="submit" class="uk-button uk-button-primary">
                        <span class="ion-forward"></span>&nbsp; Submit
                      </button>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
          {{--
          <hr class="uk-divider-icon"> --}}
          <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('js/script.js')}}"></script>
  @if(Session::has('req_error'))
  <script>
    swal({
      title: "Maaf",
      text: "ID tidak ditemukan!",
      icon: "info",
      button: "ok!",
    });
  </script>
  @elseif(Session::has('mutasi_failed'))
  <script>
    swal({
      title: "! ! !",
      text: "failed create record!",
      icon: "error",
      button: "ok!",
    });
  </script>
  @elseif(Session::has('mutasi_success'))
  <script>
    swal({
      title: "yooshh!",
      text: "record created!",
      icon: "success",
      button: "ok!",
    });
  </script>
  @endif
</body>

</html>