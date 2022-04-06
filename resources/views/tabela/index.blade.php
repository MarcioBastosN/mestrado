@include('layout.app')
@if ($pontos->where('score', 0)->count() > 0)
    <div class="alert alert-warning" role="alert">
        <h3>Necessario relacionar os pontos aos niveis <a href="{{ route('pontos.index') }}">Ir a pagina</a></h3>
    </div>
@else
    <form action="{{ route('exportTable')}}" method="get">
        <button type="submit">Download Tabela</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>setor</th>
                <th>bairro</th>
                <th>x</th>
                <th>y</th>
                @foreach ($niveis as $nivel)
                    <th>Nivel -{{ $nivel->nivel }}</th>
                @endforeach
                <th>Indice de Violência</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($setores as $setor)
                <tr>
                    <td>{{ $setor->setor }}</td>
                    <td>{{ $pontos->where('setor', $setor->setor)->first()->bairro }}</td>
                    <td>{{ $pontos->where('setor', $setor->setor)->first()->X }}</td>
                    <td>{{ $pontos->where('setor', $setor->setor)->first()->Y }}</td>
                    @php
                        $soma = 0;
                    @endphp
                    @foreach ($niveis as $nivel)
                        @if ($nivel->existeRelacao->count() > 0)
                            @php
                                $temp = 0;
                            @endphp
                            <td>
                                @if ($pontos->where('score', $nivel->score)->sum('score') > 0)
                                    {{ $temp = $pontos->where('setor', $setor->setor)->where('score', $nivel->score)->sum('score') / $pontos->where('score', $nivel->score)->sum('score') }}
                                @else
                                    0
                                @endif
                            </td>
                            @php
                                $soma += $temp;
                            @endphp
                        @else
                            <td>0</td>
                        @endif
                    @endforeach
                    <td>{{ $soma / $niveisValidos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
