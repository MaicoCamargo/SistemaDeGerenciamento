<?php

/**
 * Created by PhpStorm.
 * User: Maico Camargo
 * Date: 26/11/2016
 * Time: 12:14
 */
include_once '../Model/util/ConexaoComBD.php';
class Despesa
{
    public $codGasto;
    public $descricao;
    public $idRendimento;
    public $tipo;
    public $valor;

    function realizaGasto()
    {
        $conexao = new ConexaoComBD();
        $conexao->conectar();
        $sql = "insert into gastos (descricao,tipo,valor,idRendimento) values ('$this->descricao','$this->tipo','$this->valor','$this->idRendimento')";
        $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }

    function VerGastos(){
        $conexao = new ConexaoComBD();
        $sql="select * from gastos";
        $conexao->conectar();
        return $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }

    function VerGastoComId($codigo){
        $conexao = new ConexaoComBD();
        $sql="select * from gastos where codgasto='$codigo'";
        $conexao->conectar();
        return $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }

    function EditarGasto($id,$valor,$descricao,$tipo){
        $sql="update gastos set valor='$valor' , descricao='$descricao', tipo='$tipo' where codgasto='$id'";
        $con = new ConexaoComBD();
        $con->conectar();
        $con->ExecutaQuery($sql);
        $con->fechar();
    }

    function SomaGastos(){
        $conexaoBd =new ConexaoComBD();
        $conexaoBd->conectar();
        return $conexaoBd->ExecutaQuery("select sum(valor) from rendimento");
        $conexaoBd->fechar();
    }
}
?>