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
            include '../Model/Despesa.php';
            $operacao = $_POST["opcao"];

            if ($operacao == "inserirDespesa")
            {
                $descr= $_POST["descricao"];
                $tipo=$_POST["tipo"];
                $valor=$_POST["valor"];
                $idDoRendimento= $_POST["rendimento"];
                $despesa= new Despesa();
                $despesa->valor=$valor;
                $despesa->descricao=$descr;
                $despesa->tipo=$tipo;
                $despesa->idRendimento = $idDoRendimento;
                $despesa->realizaGasto();
                echo "<meta http-equiv='refresh'content='0;url=../Views/menu.php'>";//fazer ir para a pagina
            }

            elseif($operacao="editaGasto"){
                $valor=$_POST['valor'];
                $descr=$_POST['descricao'];
                $tipoDeGasto=$_POST['tipo'];
                $codigo=$_POST['id'];
                $gst = new Despesa();

                $gst->EditarGasto($codigo,$valor,$descr,$tipoDeGasto);
                echo "<meta http-equiv='refresh'content='0;url=../Views/verGastos.php'>";//fazer ir para a pagina
            }
        ?>
    </div>
</body>
</html>