<html>
     <head>
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
     </head>
     <body>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        @section('sidebar')
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid px-4">
               <a class="navbar-brand" href="#">
                  <img src="logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                     <a class="nav-link" href="{{ url('/producto/') }}">Productos</a>
                     <a class="nav-link" href="{{ url('/categorias/') }}" > Categorias</a>
                     <a class="nav-link" href="{{ url('/etiquetas/') }}" > Etiquetas</a>
                     <a class="nav-link" href="{{ url('/items/') }}" > Items</a>
                     <a class="nav-link" href="{{ url('/opciones/') }}" > Opciones</a>
                     <a class="nav-link" href="{{ url('/imagenes/') }}" > Imagenes</a>
               </a>
            </div>
         </nav>
        @show
        <div class="container-fluid">
            @yield('content')
        </div>
     </body>
  </html>