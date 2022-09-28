<?php
include_once "conexao.php";

class ReceitaController{


    public static function allReceitas(){
        $conn = new conn();
        $conn = $conn->conn();
        $stmt = $conn->prepare("SELECT * FROM receita");
        $stmt->execute();
        $receitas = $stmt->fetchAll();
        $stmt = null;
        return $receitas;
    }

    public static function favCategoriaUser ($categoriaFavorita) {
        $conn = new conn();
        $conn = $conn->conn();
        $stmt = $conn->prepare("SELECT * FROM receita WHERE idcategoriaFK=$categoriaFavorita");
        $stmt->execute();
        $receitas = $stmt->fetchAll();
        $stmt = null;
        return $receitas;
    }





}
?>