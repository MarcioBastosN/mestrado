<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>ocorrencia</th>
                <th>score</th>
                <th>atualizar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($relacoes as $relacao)
                <tr>
                    <td>{{$relacao->ocorrencia}}</td>
                    <td>{{$relacao->score}}</td>
                    <td>
                        <form action="{{route("relacoes_pontos.update", $relacao )}}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="number" name="score">
                            <input type="submit" value="Salvar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
