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
        include '../Model/Rendimento.php';
        $operecao = $_POST["op"];

        if ($operecao=="inserirRendimento")
        {
            $valor = $_POST["valor"];
            $descricao=$_POST["descricao"];
            $data=$_POST["data"];
            $rendimento = new Rendimento;
            $rendimento->valor=$valor;
            $rendimento->descricao=$descricao;
            $rendimento->data=$data;
            $rendimento->RegistrarRendimento();//condicao
            echo "<meta http-equiv='refresh'content='0;url=../Views/menu.php'>";
        }

        elseif($operecao=="apagaRendimento"){
            $id=$_POST['codigo'];//id do rendimento que sera deletado
            $rend  = new Rendimento();
            $rend->ApagarRendimento($id);
            echo "<meta http-equiv='refresh'content='0;url=../Views/verRendimentos.php'>";

        }
        elseif($operecao=="editaRendimento"){
            $id=$_POST['codigo'];
            $rend= new Rendimento();
            $novoValor=$_POST['valor'];
            $novaDescricao=$_POST['descricao'];
            $novaData=$_POST['data'];
            echo '>>>',$novaData,$novoValor,$novaDescricao;
            $rend->EditarRendimento($id,$novoValor,$novaDescricao,$novaData);
            echo "<meta http-equiv='refresh'content='0;url=../Views/verRendimentos.php'>";
        }



    ?>
</div>
</body>
</html>