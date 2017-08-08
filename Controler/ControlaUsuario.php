<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div>
    <?php

    include '../Model/Usuario.php';

    $acaoDoUsuario = $_POST["op"];//saber o que o usuario quer fazer
    // >>>>>>>>>> usuario <<<<<<<<<<<<<<<<<
    if ($acaoDoUsuario=="logarUsuario")//logar usuario
    {
        session_start();
        $nomeDoForm = $_POST["nome"];
        $senhaDoForm = $_POST["senha"];

        $usuarioLogando = new Usuario();
        $usuarioLogando->nome = $nomeDoForm;
        $usuarioLogando->senha = $senhaDoForm;
        $ret = $usuarioLogando->LoginDoUsuario($nomeDoForm, $senhaDoForm); //metodo que faz o comando sql
        if (mysqli_num_rows($ret) > 0)    //verifica se o sql retorno algum dado para logar ou nao
        {
            if ($ret) {
                while ($linha = mysqli_fetch_assoc($ret)) {
                    $id = $linha['codusuario'];

                }
                $_SESSION['id']=$id;
                $_SESSION['usuario']=$nomeDoForm;
                echo "<meta http-equiv='refresh'content='0;url=../Views/menu.php'>";//fazer ir para a pagina
            }
         }
        else{
            $_SESSION['erro']='usuario ou senha incorretos';
            echo "<meta http-equiv='refresh'content='0;url=../index.php'>";
        }
    }


    elseif ($acaoDoUsuario == "cadastraUsuario") {
        $nomeDoUsuario = $_POST["usuario"];
        $cpf = $_POST["cpf"];
        $tel = $_POST["telefone"];
        $senha = $_POST["senha"];

        $cadastroUsuario = new Usuario();

        $cadastroUsuario->nome = $nomeDoUsuario;
        $cadastroUsuario->telefone = $tel;
        $cadastroUsuario->cpf = $cpf;
        $cadastroUsuario->senha = $senha;
        $cadastroUsuario->CadastraUsuario();
        echo "<meta http-equiv='refresh'content='0;url=../Views/menu.php'>";
        //quando cadastra loga, exibir mensagem
    }

    elseif($acaoDoUsuario=="EditarPerfil"){
        $id = $_POST['id'];
        $nomeNovo=$_POST['NovoNome'];
        $cpfNovo=$_POST['NovoCPF'];
        $novoCelular=$_POST['NovoTelefone'];
        $novaSenha=$_POST['NovaSenha'];
        $usu =new Usuario();
        $retornoSql = $usu->VerUsuario($id);
        if ($retornoSql){
            while ($linha=mysqli_fetch_assoc($retornoSql)){
                $nomeDoUsuario=$linha['nome'];
                $senha=$linha['senha'];
                $cpf=$linha['cpf'];
                $telefone=$linha['telefone'];
            }
        }
        if ($nomeNovo!=$nomeDoUsuario) {
            $usu->AlteraNome($nomeNovo,$id);
        }
        if ($cpf!=$cpfNovo){
            $usu->AlteraCPF($cpfNovo,$id);
        }
        if ($novoCelular!=$telefone){
            $usu->AlteraTelefone($novoCelular,$id);
        }
        if ($novaSenha!=$senha){
            $usu->AlteraSenha($novaSenha,id);
        }
        else{
            echo 'nada alterado';
        }

    }

    elseif($acaoDoUsuario=="deslogar")
    {
        echo "deslogar";
        $usuarioSaindo = $_POST['deslogando'];
        session_destroy($_SESSION['usuarioSaindo']);
        echo "<meta http-equiv='refresh'content='0;url=../Views/menu.php'>";

    }
    ?>
</div>
</body>
</html>