@extends('layout.app')
@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Inserir Nivel</h5>
            <form action="{{ route('nivel.store') }}" method="post" class="form-inline">
                @csrf
                <div class="form-group">
                    <label for="my-input">Nivel</label>
                    <input type="number" class="form-control" name="nivel">
                </div>
                <div class="form-group">
                    <label for="my-input">Pontos</label>
                    <input type="number" class="form-control" name="score">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @if ($niveis->count() <= 0)
        <div class="col mt-3">
            <form action="{{ route('pontos.seedLoadingNivel') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-block btn-info">Carregar dados Nivel via seed</button>
            </form>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nivel</th>
                <th>Score</th>
                <th>update Pontos</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($niveis as $nivel)
                <tr>
                    <td>{{ $nivel->nivel }}</td>
                    <td>{{ $nivel->score }}</td>
                    <td>
                        <form action="{{ route('nivel.update', $nivel->id) }}" method="post" class="form-inline">
                            @method("PATCH")
                            @csrf
                            <div class="form-group">
                                <input type="number" name="score" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">atualizar</button>
                        </form>
                        <p>{{ $nivel->existeRelacao->count() <= 0 ? 'Não esta em uso' : '' }}</p>
                    </td>
                    <td>
                        <form action="{{ route('nivel.destroy', $nivel->id) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
