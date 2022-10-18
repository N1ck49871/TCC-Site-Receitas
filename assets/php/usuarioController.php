<?php
include_once "conexao.php";



class usuarioController{

    public static function favCategoriaUser ( $idUsuario) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT idCategoriaFK FROM usuario WHERE idUsuario = $idUsuario");
        $stmt->execute();
        $categoriaUsuario = $stmt->fetchAll();
        $stmt = null;
        $stmt = $conn->prepare("SELECT * FROM receita WHERE idcategoriaFK = $categoriaUsuario");

    }

     public function cadastrar($dados){
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `idCategoriaFK`) VALUES (NULL, :eusername, :eemail, :esenha, :ecategoria);");
        $stmt->bindParam(':eusername', $dados['nameUser']);
        $stmt->bindParam(':eemail',$dados['email']);
        $stmt->bindParam(':esenha',  $dados['senha']);
        $stmt->bindParam(':ecategoria', $dados['categoria']);
        $result = $stmt->execute();
        return $result;
     }



}
?>