<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../Model/util/jquery.js"></script>
    <script type="text/javascript" src="../Model/util/bootstrap/js/bootstrap.js"></script>
    <link href="../Model/util/bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Balanço Geral</title>
</head>

<body>
<div class="row" style="background-color:lavender;">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <br>
        <ol class="list-inline">
            <li><a href="menu.php">Menu </a> <strong>> </strong><a>Ver Gastos</a></li>

        </ol>
    </div>
    <br>
    <div class="col-md-3">

    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-right" contenteditable="true">Saldo Atual:<?php
                    include '../Model/Rendimento.php';
                    include '../Model/Despesa.php';
                    $rend=new Rendimento();
                    $despesa = new Despesa();
                    $retornoRendimento = $rend->SomaRendimentos();
                    $retornoDespesa= $despesa->SomaGastos();
                    echo "implementar";
                    ?>  </h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">Relatorio de Rendimentos</h3>
                <br>
                <table class="table table-condensed table-hover">

                    <tr>
                        <th class="text-center">Data</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Valor</th>
                    </tr>
                    <?php
                    include_once '../Model/Rendimento.php';
                    $rendi = new Rendimento();
                    $retornoDoBanco= $rendi->VerRendimentos();
                    if ($retornoDoBanco)
                    {
                        while ($linha=mysqli_fetch_assoc($retornoDoBanco)){
                            $valor=$linha['valor'];
                            $descricao=$linha['descricao'];
                            $data=$linha['dataa'];
                            $id=$linha['codrendimento'];
                            echo '<tr><td class="text-center">'.$data.'</td>';
                            echo '<td class="text-center">'.$descricao.'</td>';
                            echo '<td class="text-center">'.$valor.'</td>';
                            echo '<td class="text-center">
        
                              </td></tr>';
                        }
                    }
                    else{
                        echo"<tr><td>nada registrado</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-6">
                <h3 class="text-center">Relatorio de Gastos</h3>
                <br>
                <table class="table table-condensed table-hover">

                    <tr >
                        <th class="text-center">Valor</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Tipo</th>
                    </tr>
                    <?php
                    include_once '../Model/Despesa.php';
                    $gastos = new Despesa();
                    $retornoDoSQL= $gastos->VerGastos();
                    if ($retornoDoSQL)
                    {
                        while ($linha=mysqli_fetch_assoc($retornoDoSQL)){
                            $valor=$linha['valor'];
                            $descricao=$linha['descricao'];
                            $tipo=$linha['tipo'];
                            echo '<tr><td class="text-center">'.$valor.'</td>';
                            echo '<td class="text-center">'.$descricao.'</td>';
                            echo '<td class="text-center">'.$tipo.'</td>
                            </tr>';
                        }

                    }

                    ?>
                </table>


            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="row">
        <div class="col-md-12 col-lg-offset-6">
            <a href="menu.php" class="btn btn-info ">Voltar</a>

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