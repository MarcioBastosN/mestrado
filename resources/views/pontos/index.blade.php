@extends('layout.app')
@section('body')
    <div class="row">
        <div class="col">
            @if ($relacoes)
                <div class="alert alert-warning" role="alert">
                    <h3>Para processar os pontos e necesario corrigir:</h3>
                </div>
                <p>A classificação não pode conter um ou mais niveis = '0'. Editar <a
                        href="{{ route('relacoes_pontos.index') }}">classificação</a></p>
            @else
                <form action="{{ route('pontos.alterar') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-block btn-primary">Atualizar Pontos</button>
                </form>
            @endif
        </div>
        <div class="col">
            <div class="card border-info">
                <div class="card-body">
                    <h5 class="card-title">Info:</h5>
                    <p>Total de pontos: {{$pontos->count()}}
                    <br/>
                    Ocorrências distintas: {{$ocorrencias}}
                </p>
                </div>
            </div>
        </div>
    </div>

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
