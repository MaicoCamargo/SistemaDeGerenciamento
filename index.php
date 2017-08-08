<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../Model/util/jquery.js"></script>
    <script type="text/javascript" src="../Model/util/bootstrap/js/bootstrap.js"></script>
    <link href="../Model/util/bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">

    <title>Login</title>
</head>

<body>
<div class="row" style="background-color:lavender;">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <br>
        <ol class="list-inline">
            <li><a href="index.php">Home </a> <strong>></strong></li>

        </ol>
    </div>
    <br>
    <div class="col-md-3">

    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Novo sistema de gerenciamento de gastos on-line, aqui você gerencia seus
                    gastos e rendimentos.
                    <br>
                    <br>- desenvolvido por meros universitarios, sujeito a bugs, Varios</p>
            </div>
            <div class="col-md-6">
                <form class="form-horizontal" role="form" action="Controler/ControlaUsuario.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="nome" class="control-label">Usuario</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="senha" class="control-label">Senha</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="senha">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="op" value="logarUsuario">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Logar</button>
                            <a href="Views/criaPerfil.php" class="text-right">cadastrar-se</a>
                            <h2>
                                <?php
                                    session_start();
                                    if (isset($_SESSION['erro']))
                                    {
                                        echo $_SESSION['erro'];
                                    }
                                ?>
                            </h2>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="https://unsplash.imgix.net/photo-1423683249427-8ca22bd873e0?w=1024&amp;q=50&amp;fm=jpg&amp;s=5e57c661d0f772ce269188a6f5325708"
                     class="img-responsive">
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