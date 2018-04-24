<html>
<head>
  <link href="/css/app.css" rel="stylesheet">
  <!--<link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">-->
  <link href="/css/fontawesome-all.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">

      <nav class="navbar navbar-default">
           <div class="container-fluid">

           <div class="navbar-header">
               <a class="navbar-brand" href="/produtos">
                   Estoque Laravel
               </a>
           </div>

               <ul class="nav navbar-nav navbar-right">
                   <li><a href="/produtos/novo">Novo</a></li>
               </ul>
           </div>
      </nav>

        @yield('conteudo')

      <footer class="footer">
          <p>© Livro de Laravel da Casa do Código.</p>
      </footer>

  </div>
</body>
</html>
