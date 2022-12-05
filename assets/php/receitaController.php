<?php
include_once "conexao.php";

class ReceitaController {

    public static function favCategoriaUser ($categoriaFavorita) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT * FROM receita WHERE idcategoriaFK=$categoriaFavorita");
        $stmt->execute();
        $receitas = $stmt->fetchAll();
        $stmt = null;
        return $receitas;
    }


    public static function allReceitas(){
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT `idReceita`,`nomeReceita`, `tempoReceita`, `idcategoriaFK`, `imagem` FROM receita");
        $stmt->execute();
        $receitas = $stmt->fetchAll();
        $stmt = null;
        return $receitas;
    }
    
    public static function allDetailsReceitas(){
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT 
        `idReceita`,
        `qtdCalorias`, 
        `nomeReceita`, 
        `porcoes`, 
        `tempoReceita`, 
        `link`, 
        `ingrediente_1`, 
        `ingrediente_2`, 
        `ingrediente_3`, 
        `ingrediente_4`, 
        `ingrediente_5`, 
        `ingrediente_6`, 
        `ingrediente_7`, 
        `ingrediente_8`, 
        `ingrediente_9`, 
        `ingrediente_10`, 
        `ingrediente_11`, 
        `ingrediente_12`, 
        `ingrediente_13`, 
        `ingrediente_14`, 
        `ingrediente_15`, 
        `modoPreparo`,
        `idcategoriaFK` FROM `receita`");
        $stmt->execute();
        $receitas = $stmt->fetchAll();
        $stmt = null;
        return $receitas;
    }


    public static function getRecipesByCategory ($categoriaSelect) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT `idReceita`,`nomeReceita`, `tempoReceita`, `idcategoriaFK`, `imagem` FROM `receita` WHERE idcategoriaFK=$categoriaSelect;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        return $resultado;
    }

    public static function allDetailsReceitasByCategory($categoriaSelect){
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT 
        `idReceita`,
        `qtdCalorias`, 
        `nomeReceita`, 
        `porcoes`, 
        `tempoReceita`, 
        `link`, 
        `ingrediente_1`, 
        `ingrediente_2`, 
        `ingrediente_3`, 
        `ingrediente_4`, 
        `ingrediente_5`, 
        `ingrediente_6`, 
        `ingrediente_7`, 
        `ingrediente_8`, 
        `ingrediente_9`, 
        `ingrediente_10`, 
        `ingrediente_11`, 
        `ingrediente_12`, 
        `ingrediente_13`, 
        `ingrediente_14`, 
        `ingrediente_15`, 
        `modoPreparo`,
        `idcategoriaFK` FROM `receita` WHERE idcategoriaFK=$categoriaSelect");
        $stmt->execute();
        $receitas = $stmt->fetchAll();
        $stmt = null;
        return $receitas;
    }


    public static function getRecipesBySearch($search) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT 
        `idReceita`,
        `nomeReceita`, 
        `tempoReceita`, 
        `idcategoriaFK`,
        `imagem`
        FROM `receita` 
        WHERE
        ingrediente_1   like '%{$search}%' or 
        ingrediente_2   like '%{$search}%' or
        ingrediente_3   like '%{$search}%' or 
        ingrediente_4   like '%{$search}%' or 
        ingrediente_5   like '%{$search}%' or 
        ingrediente_6   like '%{$search}%' or 
        ingrediente_7   like '%{$search}%' or 
        ingrediente_8   like '%{$search}%' or 
        ingrediente_9   like '%{$search}%' or 
        ingrediente_10  like '%{$search}%' or 
        ingrediente_11  like '%{$search}%' or 
        ingrediente_12  like '%{$search}%' or 
        ingrediente_13  like '%{$search}%' or 
        ingrediente_14  like '%{$search}%' or 
        ingrediente_15  like '%{$search}%' 
        ");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        return $resultado;
    }

    public static function allDetailsReceitasBySearch($search) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT 
        `idReceita`,
        `qtdCalorias`, 
        `nomeReceita`, 
        `porcoes`, 
        `tempoReceita`, 
        `link`, 
        `ingrediente_1`, 
        `ingrediente_2`, 
        `ingrediente_3`, 
        `ingrediente_4`, 
        `ingrediente_5`, 
        `ingrediente_6`, 
        `ingrediente_7`, 
        `ingrediente_8`, 
        `ingrediente_9`, 
        `ingrediente_10`, 
        `ingrediente_11`, 
        `ingrediente_12`, 
        `ingrediente_13`, 
        `ingrediente_14`, 
        `ingrediente_15`, 
        `modoPreparo`,
        `idcategoriaFK` 
        FROM `receita` 
        WHERE 
        ingrediente_1   like '%{$search}%' or 
        ingrediente_2   like '%{$search}%' or
        ingrediente_3   like '%{$search}%' or 
        ingrediente_4   like '%{$search}%' or 
        ingrediente_5   like '%{$search}%' or 
        ingrediente_6   like '%{$search}%' or 
        ingrediente_7   like '%{$search}%' or 
        ingrediente_8   like '%{$search}%' or 
        ingrediente_9   like '%{$search}%' or 
        ingrediente_10  like '%{$search}%' or 
        ingrediente_11  like '%{$search}%' or 
        ingrediente_12  like '%{$search}%' or 
        ingrediente_13  like '%{$search}%' or 
        ingrediente_14  like '%{$search}%' or 
        ingrediente_15  like '%{$search}%' 
        ");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        return $resultado;
    }

    public static function getRecipesBySearchAndCategory($search, $category) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT 
            `idReceita`,
            `nomeReceita`, 
            `tempoReceita`, 
            `idcategoriaFK`,
            `imagem`
            FROM  `receita`
            WHERE idcategoriaFK=$category AND 
            (ingrediente_1   like '%{$search}%' or 
            ingrediente_2   like '%{$search}%' or
            ingrediente_3   like '%{$search}%' or 
            ingrediente_4   like '%{$search}%' or 
            ingrediente_5   like '%{$search}%' or 
            ingrediente_6   like '%{$search}%' or 
            ingrediente_7   like '%{$search}%' or 
            ingrediente_8   like '%{$search}%' or 
            ingrediente_9   like '%{$search}%' or 
            ingrediente_10  like '%{$search}%' or 
            ingrediente_11  like '%{$search}%' or 
            ingrediente_12  like '%{$search}%' or 
            ingrediente_13  like '%{$search}%' or 
            ingrediente_14  like '%{$search}%' or 
            ingrediente_15  like '%{$search}%');
        ");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        return $resultado;
    }

    public static function allDetailsReceitasBySearchAndCategory($search, $category) {
        $conn = new Conexao();
        $conn = $conn->conexao();
        $stmt = $conn->prepare("SELECT 
            `idReceita`,
            `qtdCalorias`, 
            `nomeReceita`, 
            `porcoes`, 
            `tempoReceita`, 
            `link`, 
            `ingrediente_1`, 
            `ingrediente_2`, 
            `ingrediente_3`, 
            `ingrediente_4`, 
            `ingrediente_5`, 
            `ingrediente_6`, 
            `ingrediente_7`, 
            `ingrediente_8`, 
            `ingrediente_9`, 
            `ingrediente_10`, 
            `ingrediente_11`, 
            `ingrediente_12`, 
            `ingrediente_13`, 
            `ingrediente_14`, 
            `ingrediente_15`, 
            `modoPreparo`,
            `idcategoriaFK` 
            FROM  `receita`
            WHERE idcategoriaFK=$category AND 
            (ingrediente_1   like '%{$search}%' or 
            ingrediente_2   like '%{$search}%' or
            ingrediente_3   like '%{$search}%' or 
            ingrediente_4   like '%{$search}%' or 
            ingrediente_5   like '%{$search}%' or 
            ingrediente_6   like '%{$search}%' or 
            ingrediente_7   like '%{$search}%' or 
            ingrediente_8   like '%{$search}%' or 
            ingrediente_9   like '%{$search}%' or 
            ingrediente_10  like '%{$search}%' or 
            ingrediente_11  like '%{$search}%' or 
            ingrediente_12  like '%{$search}%' or 
            ingrediente_13  like '%{$search}%' or 
            ingrediente_14  like '%{$search}%' or 
            ingrediente_15  like '%{$search}%');
        ");

        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        return $resultado;
    }
}
?>





