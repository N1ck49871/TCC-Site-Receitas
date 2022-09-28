<?php
include_once "conexao.php";


$name = $_POST['name']
$email = $_POST['email']

$dados[$] = array($name, $email ) 
class usuarioController{

    public static function favCategoriaUser ( $idUsuario) {
        $conn = new conn();
        $conn = $conn->conn();
        $stmt = $conn->prepare("SELECT idCategoriaFK FROM usuario WHERE idUsuario = $idUsuario");
        $stmt->execute();
        $categoriaUsuario = $stmt->fetchAll();
        $stmt = null;
        $stmt = $conn->prepare("SELECT * FROM receita WHERE idcategoriaFK = $categoriaUsuario");

    }

    public function cadastrar($email, $nomeUsuario, )

    $dados[0] = 


}
?>