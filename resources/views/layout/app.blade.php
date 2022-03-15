<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/app.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('inicio')}}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{ route('pontos.index') }}">Pontos</a>
            <a class="nav-item nav-link" href="{{ route('relacoes_pontos.index') }}">Classificação</a>
            <a class="nav-item nav-link" href="{{ route('nivel.index') }}">Niveis</a>
            <a class="nav-item nav-link" href="{{ route('tabela') }}">Tabela</a>
            <a class="nav-item nav-link" href="{{ route('info.index') }}">Info</a>
          </div>
        </div>
      </nav>
    @yield("body")
</body>
</html>
