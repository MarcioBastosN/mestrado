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
        <form action="{{ route('pontos.erase')}}" method="post">
            @csrf
            <button type="submit">Zerar Tabelas</button>
        </form>
    </div>
    <div class="col">
        <form action="{{ route('pontos.seedLoading')}}" method="post">
            @csrf
            <button type="submit">Carregar dados do seed</button>
        </form>
    </div>
</div>

