@extends('layout.app')
@section('body')
<form action="{{ route("pontos.alterar") }}" method="post">
    @csrf
    <button type="submit" class="btn btn-block btn-primary">Atualizar Score</button>
</form>
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
            @foreach ($pontos as $ponto)
                <tr>
                    <td>{{ $ponto->X }}</td>
                    <td>{{ $ponto->Y }}</td>
                    <td>{{ $ponto->ocorrencia }}</td>
                    <td>{{ $ponto->bairro }}</td>
                    <td>{{ $ponto->setor }}</td>
                    <td>{{ $ponto->score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
