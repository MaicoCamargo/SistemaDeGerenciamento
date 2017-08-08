<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../Model/util/jquery.js"></script>
    <script type="text/javascript" src="../Model/util/bootstrap/js/bootstrap.js"></script>
    <link href="../Model/util/bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"  rel="stylesheet" type="text/css">
    <!-- arquivos necessarios para fazer a mascara -->
    <script type="text/javascript" src="../Model/util/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../Model/util/querymascara.js"></script>
    <!--   -->

    <title>Editar Perfil</title>
</head>

<body>
<div class="row" style="background-color:lavender;">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <br>
        <ol class="list-inline">
            <li><a href="menu.php">Menu</a> <strong>></strong> <a>Editar Perfil</a> </li>
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

<div class="section text-center">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <h1 class="text-center">Editar Perfil</h1>
                    <br>
                    <form class="form-horizontal text-center" role="form" action="../Controler/ControlaUsuario.php" method="post">
                        <?php
                        include '../Model/Usuario.php';
                        $id=$_GET['id'];//pega os dados que veio pelo link do href do botao editar perfil da pagina menu.php
                        $editarperfil = new Usuario();
                        $retornoSql = $editarperfil->VerUsuario($id);
                        if ($retornoSql){
                            while ($linha=mysqli_fetch_assoc($retornoSql)){
                                $nomeDoUsuario=$linha['nome'];
                                $senha=$linha['senha'];
                                $cpf=$linha['cpf'];
                                $telefone=$linha['telefone'];
                                $idd=$linha['codusuario'];
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="control-label">Nome</label>
                            </div>
                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="NovoNome" value="<?php echo $nomeDoUsuario;?>" placeholder="Digite novo Nome">
                            </div>
                            <h5 class="text-left">Nome Atual: <?php echo $nomeDoUsuario;?> </h5>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label  class="control-label">CPF</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control cpf" name="NovoCPF" value="<?php echo $cpf;?>" placeholder="Digite o novo CPF">
                            </div>
                            <h5 class="text-left">CPF Atual: <?php echo $cpf;?> </h5>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="control-label">Telefone</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control telefone" name="NovoTelefone" value="<?php echo $telefone;?>" placeholder="Digite o novo numero de Telefone">
                            </div>
                            <h5 class="text-left">¨Telefone Atual: <?php echo $telefone;?> </h5>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <label class="control-label">Senha</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="NovaSenha" value="<?php echo $senha;?>" placeholder="Digite a nova Senha">
                            </div>
                            <h5 class="text-left">Senha Atual: *****</h5>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $idd;?>">
                                <input type="hidden" name="op" value="EditarPerfil">
                                <a href="menu.php" class="btn btn-info btn-sm">Voltar</a>
                                <button type="submit" class="btn btn-primary btn-sm">Salvar Alteraçoes</button>

                            </div>
                        </div>
                    </form>


                    <br>
                </div>
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