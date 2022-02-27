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
                <th>x</th>
                <th>y</th>
                <th>ocorrencia</th>
                <th>bairro</th>
                <th>setor</th>
                <th>pontos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pontos as $ponto)
                <tr>
                    <td>{{$ponto->X}}</td>
                    <td>{{$ponto->Y}}</td>
                    <td>{{$ponto->ocorrencia}}</td>
                    <td>{{$ponto->bairro}}</td>
                    <td>{{$ponto->setor}}</td>
                    <td>{{$ponto->score}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
