@extends('layout.app')
@section('body')

    <form action="{{ route('nivel.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="my-input">Nivel</label>
            <input type="number" class="form-control" name="nivel">
        </div>
        <div class="form-group">
            <label for="my-input">Score</label>
            <input type="number" class="form-control" name="score" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Nivel</th>
                <th>Score</th>
                <th>update</th>
                {{-- <th>delet</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($niveis as $nivel)
                <tr>
                    <td>{{$nivel->nivel}}</td>
                    <td>{{$nivel->score}}</td>
                    <td>
                        <form action="{{ route("nivel.update", $nivel->id) }}" method="post">
                            @method("PATCH")
                            @csrf
                            <input type="number" name="score" class="form-control">
                            <button type="submit" class="btn btn-primary">atualizar</button>
                        </form>
                    </td>
                    {{-- <td></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
