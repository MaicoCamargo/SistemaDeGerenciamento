<?php

/**
 * Created by PhpStorm.
 * User: Maico Camargo
 * Date: 25/11/2016
 * Time: 22:26
 */
include_once 'util/ConexaoComBD.php';
class Rendimento
{
    public $data;
    public $descricao;
    public $valor;

    function RegistrarRendimento()
    {
        $bd = new ConexaoComBD();
        $sql= "INSERT INTO rendimento (dataa,descricao,valor)VALUES ('$this->data','$this->descricao','$this->valor')";
        $bd->conectar();
        $bd->ExecutaQuery($sql);
        $bd->fechar();
    }

    function VerRendimentos(){
        $conexao= new ConexaoComBD();
        $sql="select * from rendimento";
        $conexao->conectar();
        return $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }
    function ApagarRendimento($id){
        echo 'id>>>',$id;
        $conexao = new ConexaoComBD();
        $conexao->conectar();
        $sql="delete from rendimento where codrendimento='$id'";
        $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }

    function EditarRendimento($id,$valor,$descri,$data){
        $conexao = new ConexaoComBD();
        $conexao->conectar();
        $sql="update rendimento set valor='$valor' , descricao='$descri', dataa='$data' where codrendimento='$id'";
        $conexao->ExecutaQuery($sql);
        $conexao->fechar();

    }

    function VerRendimentoComID($id){
        $conexao= new ConexaoComBD();
        $sql="select * from rendimento WHERE codrendimento='$id'";
        $conexao->conectar();
        return $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }

    function SomaRendimentos(){
        $sql= "select sum(valor) from rendimento";
        $conexaoBanco = new ConexaoComBD();
        $conexaoBanco->conectar();
        return $conexaoBanco->ExecutaQuery($sql);
        $conexaoBanco->fechar();
    }

}
?>