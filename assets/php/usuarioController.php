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
        $stmt = $conexao->prepare("SELECT nomeUsuario, emailUsuario, senhaUsuario, idCategoriaFK FROM usuario WHERE emailUsuario = :email AND senhaUsuario = :senha");
        $stmt->execute(array('email' => $email, 'senha' => $senha));
        if ($stmt->rowcount() > 0) {
            $result = $stmt->fetch();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_email'] = $result['email']; 
            $_SESSION['senha'] = $result['pswrd']; 
            $_SESSION['user_nome'] = $result['nome'];
            return true;
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


}
?>