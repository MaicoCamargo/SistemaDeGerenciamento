<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../Model/util/jquery.js"></script>
    <script type="text/javascript" src="../Model/util/bootstrap/js/bootstrap.js"></script>
    <link href="../Model/util/bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Editar Rendimento</title>
</head>

<body>
<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right"></ul>
        </div>
    </div>
</div>
<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right"></ul>
        </div>
    </div>
</div>

<div class="section text-center">
    <h1 class="text-center">Editando Rendimento</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form class="form-horizontal" role="form" action="../Controler/controlaDespesa.php" method="post">
                    <?php
                        include '../Model/Despesa.php';
                        $codigo=$_GET['id'];
                        $gasto = new Despesa();
                        $retornoDoBanco= $gasto->VerGastoComId($codigo);
                        if (mysqli_num_rows($retornoDoBanco)>0)
                        {
                            while ($linha=mysqli_fetch_assoc($retornoDoBanco)){
                                $valor=$linha['valor'];
                                $descricao=$linha['descricao'];
                                $tipo=$linha['tipo'];
                                $idDoGasto=$linha['codgasto'];
                                /*$idDoRendimento=['idrendimento'];*/

                            }
                        }
                    ?>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputEmail3" class="control-label">Valor</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="valor" value="<?php echo $valor ;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputEmail3" class="control-label">Descricao</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="descricao" value="<?php echo $descricao ;?>">
                        </div>
                    </div>


                    <div class="form-group">

                        <div class="col-sm-2">

                            <label class="control-label">Tipo De Gasto</label>
                        </div>

                        <div class="col-sm-10">
                                <p><strong>tipo atual: </strong><?php echo $tipo ;?></p>
                            <select class="form-control" name="tipo">
                                <option value="null" >Escoha Tipo de Gasto</option>
                                <option value="saude" >Saúde</option>
                                <option value="alimentacao">Alimentação</option>
                                <option value="transporte">Transporte</option>
                                <option value="superfluo">Supérfluo</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputEmail3" class="control-label">Rendimento</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" value="implementar..">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2 text-center">
                            <input type="hidden" value="<?php echo $idDoGasto ;?>" name="id">
                            <button type="submit" class="btn btn-block btn-lg btn-success" name="opcao" value="editaGasto">SalvarAlterações</button>
                        </div>

                    </div>

                </form>
                <a href="../Views/menu.php" class=" btn btn-block btn-default btn-lg">Voltar</a>
            </div>
            <div class="col-md-3"></div>
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