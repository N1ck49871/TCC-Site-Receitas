<?php
include_once "conexao.php";

class ReceitaController{


    public static function allReceitas($conn){
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT * FROM receita");
        $stmt->execute();
        $receitas = $stmt->fetchAll();
        $stmt = null;
        return $receitas;
    }

    public static function favCategoriaUser ($categoriaFavorita) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT * FROM receita WHERE idcategoriaFK=$categoriaFavorita");
        $stmt->execute();
        $receitas = $stmt->fetchAll();
        $stmt = null;
        return $receitas;
    }

    public static function categoriaSelect ($categoriaSelect) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT * FROM receita WHERE idcategoriaFK=$categoriaSelect");
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        return $resultado;
    }

}
?>