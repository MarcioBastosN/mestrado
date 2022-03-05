@include('layout.app')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Decrições</h5>
                <div class="col mt-3">
                    <div class="card border-info">
                        <div class="card-body">
                            <h5 class="card-title">Pontos</h5>
                            <p class="card-text">Ocorrências, acrescidas de bairro, setor e pontos
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col mt-3">
                    <div class="card border-info">
                        <div class="card-body">
                            <h5 class="card-title">Classificação</h5>
                            <p class="card-text">Lista de Tipos de ocorrências, para definição dos niveis
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col mt-3">
                    <div class="card border-info">
                        <div class="card-body">
                            <h5 class="card-title">Niveis</h5>
                            <p class="card-text">relação nivel pontos
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Actions</h5>
                <div class="col mt-3">
                    <form action="{{ route('pontos.erase') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-block btn-info">Zerar Tabelas</button>
                    </form>
                </div>
                <div class="col mt-3">
                    <form action="{{ route('pontos.seedLoadingPontos') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-block btn-info">Carregar dados Pontos via seed</button>
                    </form>
                </div>
                <div class="col mt-3">
                    <form action="{{ route('pontos.seedLoadingNivel') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-block btn-info">Carregar dados Nivel via seed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Importar tabela</h5>
                <p>
                    * O arquivo deve estar no formato (.xlsx)
                <br/>
                    * Deve conter a seguinte estrutura de colunas:
                <br/>
                [ x, y, ocorrencia, bairro, setor ]
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
                    <button type="submit" class="btn btn-block btn-primary">carregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
