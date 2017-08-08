<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../Model/util/jquery.js"></script>
    <script type="text/javascript" src="../Model/util/bootstrap/js/bootstrap.js"></script>
    <link href="../Model/util/bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- arquivos necessarios para fazer a mascara -->
    <script type="text/javascript" src="../Model/util/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../Model/util/querymascara.js"></script>
    <!--   -->
    <title>Cadastrar Usuario</title>
</head>

<body>
<div class="row" style="background-color:lavender;">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <br>
        <ol class="list-inline">
            <li><a href="criaPerfil.php">Criar Usuario</a> <strong>></strong></li>
        </ol>
    </div>
    <br>
    <div class="col-md-3">

    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <h1 class="text-center" >Criando Perfil...</h1>
            <div class="col-md-12">
                <form role="form" class="text-justify" method="post" action="../Controler/ControlaUsuario.php">
                    <div class="form-group has-feedback">
                        <label class="control-label" for="exampleInputEmail1">Nome Do Usuario</label>
                        <input class="form-control input-lg" id="exampleInputEmail1" name="usuario"
                               placeholder="Nome" type="text">
                        <span class="fa fa-check form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label class="control-label" for="exampleInputPassword1">Telefone</label>
                        <input class="form-control input-lg telefone" id="exampleInputPassword1"
                               placeholder="Telefone" name="telefone" type="text">
                        <span class="fa fa-check form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label class="control-label">CPF</label>
                        <input class="form-control input-sm cpf" type="text" placeholder="CPF" name="cpf">
                        <span class="fa fa-check form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label class="control-label">Senha</label>
                        <input class="form-control input-lg" type="password"
                               placeholder="senha" name="senha">
                        <span class="fa fa-check form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="hidden" value="cadastraUsuario" name="op">
                            <button class="btn btn-success btn-succuess" type="submit">salvar</button>
                            <a class="btn btn-succuess btn-danger" href="../index.php">Cancelar</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="section section-danger">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-11 hidden-xs">
                    <p class="lead">Desenvolido por Maico Camargo, Futuro Programador</p>
                </div>
                <div class="col-md-1 text-right">
                    <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>