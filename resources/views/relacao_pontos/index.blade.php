@extends('layout.app')
@section('body')
<form action="{{ route('relacoes_pontos.load') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Carregar Relações</button>
</form>
    <table class="table">
        <thead>
            <tr>
                <th>ocorrencia</th>
                <th>nivel</th>
                <th>update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($relacoes as $relacao)
                <tr>
                    <td>{{ $relacao->ocorrencia }}</td>
                    <td>{{ $relacao->nivel_id }}</td>
                    <td>
                        <form action="{{ route('relacoes_pontos.update', $relacao) }}" method="post" class="form-inline">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nivel_id">Nivel</label>
                                <select name="nivel_id" id="nivel_id">
                                    @foreach ($niveis as $nivel)
                                        <option value="{{$nivel->id}}">{{$nivel->nivel}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info btn-primary">Submit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
