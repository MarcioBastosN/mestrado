@include('layout.app')

<table class="table">
    <thead>
        <tr>
            <th>setor</th>
            <th>x</th>
            <th>y</th>
            @foreach ($niveis as $nivel)
                <th>Nivel -{{$nivel->nivel}}</th>
            @endforeach
            <th>Indice de Violência</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($setores as $setor)
        <tr>
            <td>{{$setor->setor}}</td>
            <td>{{$pontos->where('setor', $setor->setor)->first()->X}}</td>
            <td>{{$pontos->where('setor', $setor->setor)->first()->Y}}</td>
            @php
                $soma = 0;
            @endphp
            @foreach ($niveis as $nivel)
            @php
                $temp =0;
            @endphp
                <td>{{
                $temp = ($pontos->where('setor', $setor->setor)->where('score', $nivel->score)->sum('score')
                / $pontos->where('score', $nivel->score)->sum('score'))}}</td>
                @php
                    $soma += $temp;
                @endphp
            @endforeach
            <td>{{$soma / $nivel->count()}}</td>
        </tr>
       @endforeach
    </tbody>
</table>
