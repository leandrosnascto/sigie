<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGIE</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="{{ asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/plugins/jqvmap/jqvmap.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.css') }}">
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
  <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  @yield('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      
      <a href="{{ url('index') }}"><button type="button" class="btn btn-primary">Inicio Index</button></a>

      
    </ul>
  </nav>
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light"></span>
    </a>

    <div class="sidebar">
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ url('index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                SIGIE
              </p>
            </a>
          </li>

          @if(!session('escondeMenuCadastrar'))
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p> Cadastros 
                  
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">3</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="abrirModalCadastrarInstituicao()" href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar Instituição</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="abrirModalCadastrarCursos()" href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar Cursos</p>
                  </a>
                </li>
                 <li class="nav-item">
                  <a href="{{ Route('telaAlunos') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar Alunos</p>
                  </a>
                </li>
                
              </ul>
            </li>

          @endif
          <li class="nav-item">
            <a href="{{ url('calculo') }}" class="nav-link">
              <i class="fas fa-dollar-sign"></i>

              <p>
                Cálculo 
              </p>
            </a>
          </li>
 
        </ul>
      </nav>
      
    </div>
   
  </aside>
</div>

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">

          @yield('content')
    
      </div>
    </section>
 </div>

<footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="#">sigie</a>.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>Versão</b> 3.0
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
    
  </aside>
</div>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('/plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('/plugins/sparklines/sparkline.js') }}"></script>

<script src="{{ asset('/plugins/jqvmap/jquery.vmap.min.js') }}"></script>

<script src="{{ asset('/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<script src="{{ asset('/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

<script src="{{ asset('/plugins/moment/moment.min.js') }}"></script>

<script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="{{ asset('/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script src="{{ asset('/plugins/fastclick/fastclick.js') }}"></script>

<script src="{{ asset('/dist/js/adminlte.js') }}"></script>

<script src="{{ asset('/dist/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('/dist/js/demo.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8"></script>

@yield('js')

</body>
</html>