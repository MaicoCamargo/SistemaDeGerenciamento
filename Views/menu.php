<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../Model/util/jquery.js"></script>
    <script type="text/javascript" src="../Model/util/bootstrap/js/bootstrap.js"></script>
    <link href="../Model/util/bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Home</title>
  </head>
<body>
<div class="row" style="background-color:lavender;">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <br>
        <ol class="list-inline">
            <li><a href="menu.php">Menu</a> <strong>></strong></li>
        </ol>
    </div>
    <br>
    <div class="col-md-3">
           <form action="../Controler/ControlaUsuario.php" method="post">
               <p>Ola, <?php session_start();//exibir nome do usuario logado
                   if (isset($_SESSION['usuario']))
                   {
                       echo $_SESSION['usuario'];
                   }
                   ?>
                        <input type="hidden" name="deslogando" value="<?php  echo $_SESSION['usuario'];?>">
                        <button class="btn btn-default" value="deslogar" name="op" type="submit" >Sair</button>
                </form>

    </div>
</div>
<div class="section">
      <div class="container">
        <h1 class="text-center">Menu De Gerenciamento Do Sistema</h1>
        <br>
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#modalRendimento">Registrar Rendimento</a>
          </div>
        </div>
        <hr>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-block btn-lg btn-warning" data-toggle="modal" data-target="#modalDespesa">Inserir Despesa</a>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-3">

                <a class="btn btn-block btn-default btn-lg" href="editaPerfil.php?id=<?php
                if (isset($_SESSION['id']))
                {
                    echo $_SESSION['id'];
                }?>">Editar Perfil</a><!--   php dentro do html :/-->

          </div>
          <div class="col-md-3">
            <a class="btn btn-block btn-lg btn-primary" href="../Views/verRendimentos.php">Vizualizar Rendimentos</a>
          </div>
          <div class="col-md-3">
             <a class="btn btn-block btn-lg btn-primary" href="verGastos.php">Vizualizar Gastos</a>
          </div>
          <div class="col-md-3">
            <a class="btn btn-block btn-lg btn-primary" href="balancoGeral.php">Balanço geral</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modalRendimento">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Rendimento</h4>
          </div>
          <div class="modal-body">
            <form role="form" action="../Controler/ControlerRendimento.php" method="post">

              <div class="form-group">
                <label class="control-label" for="exampleInputEmail1">Valor</label>
                <input class="form-control" id="exampleInputEmail1" name="valor" placeholder="Valor" type="number" step="0.1">
              </div>
              <div class="form-group">
                <label class="control-label" for="exampleInputPassword1">Descrição</label>
                <input class="form-control" id="exampleInputPassword1" name="descricao" placeholder="Descrição" type="text">
              </div>
              <div class="form-group">
                <label class="control-label" for="exampleInputPassword1">Data</label>
                <input class="form-control"  name="data" type="date">
              </div>
              <div class="modal-footer">
                <input type="hidden" name="op" value="inserirRendimento"><!--saber o que o usuario vai fazer -->
                <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="submit" >Salvar</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="modalDespesa">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Despesa</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" action="../Controler/controlaDespesa.php" method="post">
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Descrição</label>
                </div>
                <div class="col-sm-10">
                  <input type="text"  name="descricao" class="form-control" placeholder="descrição da despesa">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Valor</label>
                </div>
                <div class="col-sm-10">
                  <input type="number" step="0.1" class="form-control"  name="valor" placeholder="valor">
                </div>
              </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label class="control-label">Tipo De Gasto</label>
                    </div>
                    <div class="col-sm-10">
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
                  <label  class="control-label">Rendimento</label>
                </div>
                  <div class="col-sm-10">
                      <select class="form-control" name="rendimento">
                          <option  value="null">Escolha um Rendimento</option>
                          <?php
                            include '../Model/Rendimento.php';
                            $rend=new Rendimento();
                            $retornoSql = $rend->VerRendimentos();
                            if ($retornoSql)
                            while ($linha=mysqli_fetch_assoc($retornoSql)){
                              $descricao=$linha['descricao'];
                              $valor=$linha['valor'];
                              $id=$linha['codrendimento'];
                              echo "<option value='$id'>".$descricao." - ".$valor."</option>";
                            }
                          ?>
                      </select>
                  </div>
              </div>
          </div>

              <div class="modal-footer">
                <input type="hidden" name="opcao" value="inserirDespesa">
                <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="submit">Salvar</button>
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