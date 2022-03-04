@include('layout.app')

<div class="row">
    <div class="col">
        <div class="card border-info">
            <div class="card-body">
                <h5 class="card-title">Pontos</h5>
                <p class="card-text">Ocorrências, acrescidas de bairro, setor e pontos
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border-info">
            <div class="card-body">
                <h5 class="card-title">Classificaçâo</h5>
                <p class="card-text">Lista de Tipos de occorencias, para definição dos niveis
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border-info">
            <div class="card-body">
                <h5 class="card-title">Niveis</h5>
                <p class="card-text">relacao nivel pontos
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <form action="{{ route('pontos.erase') }}" method="post">
            @csrf
            <button type="submit">Zerar Tabelas</button>
        </form>
    </div>
    <div class="col">
        <form action="{{ route('pontos.seedLoadingPontos') }}" method="post">
            @csrf
            <button type="submit">Carregar dados Pontos seed</button>
        </form>
    </div>
    <div class="col">
        <form action="{{ route('pontos.seedLoadingNivel') }}" method="post">
            @csrf
            <button type="submit">Carregar dados Nivel seed</button>
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <div class="card" style="width: 36rem;">
            <p>
                * O arquivo deve estar no formato (.xlsx)
                * Deve conter a seguinte estrutura de colunas:
                - x
                - y
                - ocorrencia
                - bairro
                - setor
            </p>
            <div class="alert alert-warning" role="alert">
                <p>As tabelas (Pontos e Classificação) são zeradas antes de incluir novos dados.</p>
            </div>
            <form action="{{ route('importData') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlFile1">Carrega Dados pontos</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="tabela">
                </div>
                <button type="submit" class="btn btn-primary">carregar</button>
            </form>
        </div>
    </div>
</div>
