<?php
include_once "conexao.php";


 $name = $_POST['nameUser'];
 $email = $_POST['email'];
 $pwd = $_POST['password'];

 $dados[] = array($name, $email, $pwd); 


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

     public function cadastrar($name ,$email, $pwd ){
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `idCategoriaFK`) VALUES (NULL, ".$dados[0].",".$dados[1].",".$dados[2].");
        $result = $stmt->execute();
        return $result;
     }



}
?>