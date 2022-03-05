@extends('layout.app')
@section('body')
    @if ($niveis->count() <= 0)
        <div class="alert alert-warning" role="alert">
            <p>A tabela estara disponivel para carregar assim que:</p>
            <p>Os niveis forem gerados <a href="{{ route('nivel.index') }}">Ir para Niveis</a></p>
        </div>
    @else
        @if ($pontos != 0)
            <form action="{{ route('relacoes_pontos.load') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-block btn-primary">Carregar Relações</button>
            </form>
        @else
        <div class="alert alert-warning" role="alert">
            <p>Necessario <a href="{{ route('inicio') }}">carregar os Pontos</a></p>
        </div>
        @endif
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ocorrencia</th>
                <th>Quantidade</th>
                <th>nivel</th>
                <th>update</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($relacoes as $relacao)
                <tr>
                    <td>{{ $relacao->ocorrencia }}</td>
                    <td>{{ $relacao->ocorrencias->count()}}</td>
                    <td>{{ $relacao->nivel->nivel }}</td>
                    <td>
                        <form action="{{ route('relacoes_pontos.update', $relacao) }}" method="post"
                            class="form-inline">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nivel_id">Nivel</label>
                                <select name="nivel_id" id="nivel_id" class="form-control">
                                    @foreach ($niveis as $nivel)
                                        <option value="{{ $nivel->id }}">{{ $nivel->nivel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info btn-primary">Submit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('relacoes_pontos.destroy', $relacao->id) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
