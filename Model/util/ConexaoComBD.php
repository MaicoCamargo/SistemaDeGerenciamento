<?php

/**
 * Created by PhpStorm.
 * User: Maico Camargo
 * Date: 25/11/2016
 * Time: 17:46
 */
class ConexaoComBD
{
    private $servidor;//servidor que sera usado
    private $usuario;//usuario do banco
    private $senha;//senha do banco de dados
    private $database;//nome do database
    private $con;
    public function __construct()//metodo construtor da classe
    {
        $this->servidor='localhost';
        $this->usuario='root';
        $this->senha='';
        $this->database='gereciamentodespesa';
    }

    public function conectar(){//metodo que conecta no banco
        global $con; //variavel global
        $con = mysqli_connect($this->servidor,$this->usuario,$this->senha) or die (mysqli_error());
        mysqli_select_db($con,$this->database) or die (mysqli_error());
    }

    public function fechar(){//metodo que fecha a conexão com banco
        global $con;
        mysqli_close($con);
    }

    public function ExecutaQuery($sql){
        global $con;
        $query = mysqli_query($con,$sql) or die (mysqli_error());
        return $query;

    }
}
?>
