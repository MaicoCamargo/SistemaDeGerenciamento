<?php

/**
 * Created by PhpStorm.
 * User: Maico Camargo
 * Date: 25/11/2016
 * Time: 18:14
 */
include 'util/ConexaoComBD.php';
class Usuario
{
    
    public $nome;
    public $cpf;
    public $senha;
    public $telefone;

    public function CadastraUsuario()
    {
        $bancoDEdados = new ConexaoComBD();//cria o objeto para poder usar os metodos da classe:conecta/fecha e executa o sql
        $sql = "INSERT INTO usuario (nome,senha,telefone,cpf) VALUES ('$this->nome','$this->senha','$this->telefone','$this->cpf')";
        $bancoDEdados->conectar();
        $bancoDEdados->ExecutaQuery($sql);
        $bancoDEdados->fechar();
    }

    public function LoginDoUsuario($nome,$senha)
    {
        $conectaBanco = new ConexaoComBD();
        $conectaBanco->conectar();
        $sql= "select * from usuario where nome='$nome' and senha='$senha'";
        return $conectaBanco->ExecutaQuery($sql);
        $conectaBanco->fechar();
    }

    public function VerUsuario($id)
    {
        $conectaBanco= new ConexaoComBD();
        $conectaBanco->conectar();
        $sql="select * from usuario where codusuario='$id'";
        return $conectaBanco->ExecutaQuery($sql);
        $conectaBanco->fechar();
    }

    public function AlteraNome($nome,$id){
        $sql="UPDATE usuario SET nome='$nome' WHERE codusuario='$id'";
        $conexao = new ConexaoComBD();
        $conexao->conectar();
        $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }

    public function AlteraTelefone($celular,$id){
        $sql="UPDATE usuario SET telefone='$celular' WHERE codusuario='$id'";
        $conexao = new ConexaoComBD();
        $conexao->conectar();
        $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }

    public function AlteraCPF($cpf,$id){
    $sql="UPDATE usuario SET cpf='$cpf' WHERE codusuario='$id'";
    $conexao = new ConexaoComBD();
    $conexao->conectar();
    $conexao->ExecutaQuery($sql);
    $conexao->fechar();
    }
    public function AlteraSenha($senha,$id){
        $sql="UPDATE usuario SET senha='$senha' WHERE codusuario='$id'";
        $conexao = new ConexaoComBD();
        $conexao->conectar();
        $conexao->ExecutaQuery($sql);
        $conexao->fechar();
    }
}
?>