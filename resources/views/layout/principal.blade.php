<html>
<head>
    <meta name="viewport" content="width=device-width">
    <link href="/css/app.css" rel="stylesheet">
<!--<link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">-->
    <link href="/css/fontawesome-all.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-expand-md navbar-laravel">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    Estoque Laravel
                </a>

            </div>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ action( 'ProdutoController@lista' ) }}">Listagem</a>

                </li>
                <li>
                    <font color="#000"> | </font>
                </li>
                <li>
                    <a href="{{ action( 'ProdutoController@novo' ) }}">Novo</a>
                </li>
            </ul>

        </div>
    </nav>
    <br/>

        @yield('conteudo')

    <footer class="footer">
        <p>Copyright © 2018 Bruno Silva.</p>
    </footer>

</div>
</body>
</html>
