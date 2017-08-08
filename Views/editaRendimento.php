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
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-left">
                <form role="form" action="../Controler/controlerRendimento.php" method="post">
                    <?php
                    include '../Model/Rendimento.php';
                    $codigo=$_GET['id'];

                    $rend= new Rendimento();
                    $retornoSQl = $rend->VerRendimentoComID($codigo);
                    if ($retornoSQl){
                        while ($linha=mysqli_fetch_assoc($retornoSQl)){
                            $valor=$linha['valor'];
                            $data=$linha['dataa'];
                            $descricao=$linha['descricao'];
                            $id=$linha['codrendimento'];
                        }
                    }
                    ?>
                    <div class="form-group">
                        <label class="control-label">Valor</label>
                        <input class="form-control" placeholder="Valor" value="<?php echo $valor;?>" type="text" name="valor">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descricao</label>
                        <input class="form-control" type="text" value="<?php echo $descricao;?>" name="descricao">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Data</label>
                        <input class="form-control" type="date" value="<?php echo $data;?>" name="data">
                    </div>
                    <input type="hidden" value="<?php echo $id;?>" name="codigo">
                    <button type="submit" class="btn btn-block btn-lg btn-success" name="op" value="editaRendimento">
                        <i class="fa fa-2x fa-check fa-fw fa-spin"></i>Salvar Alterações</button>
                </form>
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