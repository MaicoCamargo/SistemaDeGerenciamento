<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../Model/util/jquery.js"></script>
    <script type="text/javascript" src="../Model/util/bootstrap/js/bootstrap.js"></script>
    <link href="../Model/util/bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Ver Rendimentos</title>
</head>

<body>
<div class="row" style="background-color:lavender;">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <br>
        <ol class="list-inline">
            <li><a href="menu.php">Menu</a> <strong>></strong> <a>Ver Rendimentos</a></li>
        </ol>
    </div>
    <br>
    <div class="col-md-3">
        <p>Ola, <?php session_start();//exibir nome do usuario logado
            if (isset($_SESSION['usuario']))
            {
                echo $_SESSION['usuario'];
            }
            ?> <button class="btn btn-info"> Sair</button></p>

    </div>
</div>
<div class="section">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Rendimentos</h1>
            <h4>vizualize, edite e apague os dados se necesario</h4>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <table class="table table-bordered table-condensed table-hover">

                <tr>
                    <th class="text-center" >Valor</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Açoes</th>
                </tr>
                  <?php

                  include '../Model/Rendimento.php';
                  $rendimentos = new Rendimento();
                  $retornoDoSQL= $rendimentos->VerRendimentos();
                  if ($retornoDoSQL)
                  {
                      while ($linha=mysqli_fetch_assoc($retornoDoSQL)){
                          $valor=$linha['valor'];
                          $descricao=$linha['descricao'];
                          $data=$linha['dataa'];
                          $id=$linha['codrendimento'];
                          echo '<tr> <form action="../Controler/controlerRendimento.php" method="post"><td class="text-center">'.$valor.'</td>';
                          echo '<td class="text-center">'.$descricao.'</td>';
                          echo '<td class="text-center">'.$data.'</td>';
                          echo '<td class="text-center">
                              
                              
                              <a type="button" class="btn btn-warning" href="../Views/editaRendimento.php?id='.$id.'">Editar</a>
                              <input type="hidden" value='.$id.' name="codigo">
                              <button type="submit" name="op" value="apagaRendimento" class="btn btn-default disabled">Apagar</button>
                              </form>
                              </td></tr>';
                      }
                  }
                  else{
                      echo '<p>nao a rendimentos cadastrados!</p>';

                  }

                  ?>

            </table>
            <a class="btn btn-info" href="menu.php">Voltar</a>
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