<html>

<head>
   <title>@yield('title')</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="/css/style.css" rel="stylesheet">
     <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>
 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="" class="logo d-flex align-items-center">
    <!-- añadir ruta -->
    <img src="logo.png" alt="Celia Viñas" width="40" height="50">
    <span class="d-none d-lg-block">Museo de obras</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.html">
      <i class="bi bi-grid"></i>
      <span>Inicio</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading">Vistas</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/producto/') }}">
      <i class="bi bi-folder"></i>
      <span>Productos</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/categorias/') }}">
      <i class="bi bi-folder"></i>
      <span>Categorias</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/items/') }}">
      <i class="bi bi-folder"></i>
      <span>Items</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/imagenes/') }}">
      <i class="bi bi-folder"></i>
      <span>Imagenes</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/etiquetas/') }}">
      <i class="bi bi-folder"></i>
      <span>Etiquetas</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/usuarios/') }}">
      <i class="bi bi-person"></i>
      <span>Usuarios</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/opciones/') }}">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Opciones</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/categorias/') }}"> <!--meter ruta -->
      <i class="bi bi-dash-circle"></i>
      <span>Cerrar sesión</span>
    </a>
  </li>

</ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl col-md-12">
              <div class="card info-card sales-card">
                @section('sidebar')
                @show
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


  
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="/js/main.js"></script>
</body>
 
</html>