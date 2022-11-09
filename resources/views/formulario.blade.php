<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <!-- Título da página -->
  <title>Mensagens do Site</title>

  <!-- Carreg css do bootstrap -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">

    <!----------------- MENU SUPERIOR -------------------->
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Mensagens</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/">Link</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!----------------- TÍTULO DO SITE -------------------->
    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <p class="h1 mb-2 mt-2">Mensagens do Site</p>
      </div>
    </div>

    <!----------------- EXIBE MENSAGENS DE SUCESSO -------------------->

    @if(\Session::has('success'))
    <div class="alert alert-success">
      {{\Session::get('success')}}
    </div>
    @endif

    <!------------------- EXIBE MENSAGENS DE ERROS ------------------>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- ----------------- FORMULÁRIO DE CADASTRO DE MSG ------------ -->
    <form method="post" action="salvarmensagem" class="mb-4">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" name="titulo">
          </div>

          <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor">
          </div>

          <div class="mb-3">
            <label for="texto" class="form-label">Texto</label>
            <textarea class="form-control" rows="5" cols="50" name="texto"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <button class="btn btn-primary btn-lg" type="submit">Salvar</button>
        </div>
      </div>
    </form>

    <!-- ------------------EXIBIR A LISTA DE MENSAGENS ----------- -->
    @if(count($listaMensagens) > 0)
    <div class="row">
      @foreach($listaMensagens as $umaMensagem)
      <div class="col-md-6 col-sm-12 col-xs-12 text-center mb-3">
        <div class="card">
          <!-- número da msg -->
          <span class="position-absolute top-0 start-100 translate-middle p-1 bg-primary border border-light rounded-circle text-white">#{{ $loop->index+1 }}</span>
          <!-- fim número da msg -->
          <div class="card-body">
            <h5 class="card-title">{{$umaMensagem->titulo}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$umaMensagem->autor}} - {{ \Carbon\Carbon::parse($umaMensagem->created_at)->format('d/m/Y h:m') }}</h6>
            <p class="card-text">{{$umaMensagem->texto}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif

    <!-- Carrega script javascript do bootstrap -->
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>