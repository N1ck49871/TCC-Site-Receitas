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
        $stmt->bindParam(':esenha',  $dados['password']);
        $stmt->bindParam(':ecategoria', $dados['categoria']);
        $result = $stmt->execute();
        return $result;
     }

     public function login($email, $senha) {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();  
        $stmt = $conexao->prepare("SELECT nomeUsuario, emailUsuario, senhaUsuario, idUsuario FROM usuario WHERE emailUsuario = :email AND senhaUsuario = :senha");
        $stmt->execute(array('email' => $email, 'senha' => $senha));
        if ($stmt->rowcount() > 0) {
            $result = $stmt->fetch();
            return [true, $result['emailUsuario'], $result['senhaUsuario'], $result['nomeUsuario'], $result['idUsuario']];
        }else {
            return false;
        }
    }

    public function logout(){
        session_destroy();
    }

    public function isLoggedIn(){
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            return true;
        }
        return false;
    }

    public function updateInformationsUser ($nome , $email, $senha, $idUsuario) {
        // $nomeUsuario = empty($nome) === true ? '' : "nomeUsuario = '{$nome}',";
        // $emailUsuario = empty($email) === true ? '' : "emailUsuario = '{$email}',";
        $nomeUsuario = empty($nome) === true ? '' : empty($email) === true ? empty($senha) === true ? "nomeUsuario = '{$nome}'" : "nomeUsuario = '{$nome}'," : "nomeUsuario = '{$nome}',";
        $emailUsuario = empty($email) === true ? '' : empty($senha) === true ? "emailUsuario = '{$email}'" : "emailUsuario = '{$email}'," ;
        $senhaUsuario = empty($senha) === true ? '' : "senhaUsuario = '{$senha}'";
        $conexao = new Conexao();
        $conexao = $conexao->conexao();  
        $stmt = $conexao->prepare("UPDATE usuario SET $nomeUsuario $emailUsuario $senhaUsuario WHERE idUsuario=$idUsuario");
        // $stmt = $conexao->prepare("UPDATE usuario SET nomeUsuario = 'Lol', emailUsuario = 'h@gmail.com', senhaUsuario=123 WHERE idUsuario=1");
        if($stmt->execute()) {
            return true;
        } else {
          return false;
        }

    }


}
?>