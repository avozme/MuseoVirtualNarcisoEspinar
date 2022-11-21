<html>
     <head>
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
     </head>
     <body>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        @section('sidebar')
         <a href="" > Categorias</a>
         <a href="" > Etiquetas</a>
         <a href="" > Productos</a>
        @show
        <div class="container">
            @yield('content')
        </div>
     </body>
  </html>