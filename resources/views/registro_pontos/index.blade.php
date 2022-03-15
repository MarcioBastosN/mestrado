@extends('layout.app')
@section('body')
<form action="{{route('info.load')}}" method="get">
    @csrf
    <button type="submit" class="btn btn-block btn-primary">Carregar / Atualizar</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>bairro</th>
            <th>IV - bairro</th>
            <th>setores</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($regIndividual as $registro)
            <tr>
                <td>{{$registro->bairro}}</td>
                <td>{{$registros->where('bairro', $registro->bairro)->sum('iv')}}</td>
                <td>{{$registros->where('bairro', $registro->bairro)->count()}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

