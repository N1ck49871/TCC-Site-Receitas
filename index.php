<?php
include_once "./assets/php/conexao.php";
include_once "./assets/php/receitaController.php";
include_once "./assets/php/usuarioController.php";

session_start();

$idCategoriaFKK;
$logout = new usuarioController();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeMadeGourmet</title>
    <link rel="stylesheet" href="./assets/css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
</head>

<body>
    <div class="container">
        <nav class="recipeSearch">
            <form action="index.php" name="formSearch" method="GET" class="formSearch">
                <div class="navBar">
                    <div class="modal-perfil" id="btnModal">
                        <div class="IconeUsuario">
                            <a href="#" class="menuIcon"><img src="./assets/img/iconUser.png" alt="Icone de usuario"></i></a>
                        </div>
                        <div class="modal" id="modal">
                            <a href="profile.php">
                                <span>Alterar Informações</span>
                                <div class="img">
                                    <img src="./assets/img/iconUserModal.png" alt="">
                                </div>
                            </a>
                            <a href="./assets/php/logout.php">
                                <span>Sair da conta</span>
                                <div class="img">
                                    <img src="./assets/img/iconClose.png" alt="">
                                    <!-- <img src="./assets/img/iconClose.png" alt=""> -->
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="searchBar">
                        <input class="searchControl" name="pesquisa" type="search" placeholder="Digite o ingrediente da sua receita ou selecione a categoria pra filtrar">
                        <button class="searchBtn" type="submit" name="buscar">
                            <i class="fas fa-search"></i>
                        </button>

                    </div>
                </div>
                <div class="main-container" id="main-container">
                    <div class="radio-buttons">
                        <label class="custom-radio col-a">
                            <input type="radio" name="categoriaReceita" value="1">
                            <span class="radio-btn">
                                <i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/sushiIcone.png" />
                                    <h3>Frutos do Mar</h3>
                                </div>
                            </span>
                        </label>

                        <label class="custom-radio col-b">
                            <input type="radio" name="categoriaReceita" value="2">
                            <span class="radio-btn">
                                <i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/massaIcone.png" />
                                    <h3>Massas</h3>
                                </div>
                            </span>
                        </label>

                        <label class="custom-radio col-c">
                            <input type="radio" name="categoriaReceita" value="3">
                            <span class="radio-btn"><i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/veganoIcone.png" />
                                    <h3>Veganas</h3>
                                </div>
                            </span>
                        </label>

                        <label class="custom-radio col-d">
                            <input type="radio" name="categoriaReceita" value="4">
                            <span class="radio-btn"><i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/croassaIcone.png" />
                                    <h3>Salgados</h3>
                                </div>
                            </span>
                        </label>

                        <label class="custom-radio col-f">
                            <input type="radio" name="categoriaReceita" value="5">
                            <span class="radio-btn"><i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/boloIcone.png" />
                                    <h3>Doces</h3>
                                </div>
                            </span>
                        </label>

                        <label class="custom-radio col-g">
                            <input type="radio" name="categoriaReceita" value="6">
                            <span class="radio-btn"><i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/carneIcone.png" />
                                    <h3>Carnes</h3>
                                </div>
                            </span>
                        </label>

                    </div>
                </div>
            </form>
        </nav>

        <div class="recipeResults">
            <h2>SUA PESQUISA</h2>
            <div class="receitasCentro">
                <div class="receitas" id="receitas">
                    <?php
                    if (isset($_GET['buscar'])) {
                        if (empty($_GET['categoriaReceita']) && empty($_GET['pesquisa'])) {
                            echo '<script>alert("Tente escrever algo na barra de pesquisa ou selecionar uma categoria")</script>';
                        } 
                        elseif (!empty($_GET['categoriaReceita']) && empty($_GET['pesquisa'])) {
                            $idCategoriaFKK = $_GET['categoriaReceita'];
                            $receitas = ReceitaController::getRecipesByCategory($idCategoriaFKK);

                            if (empty($receitas)) {
                                echo '<script>alert("Não foi possível encontrar receitas nessa categoria :( ")</script>';
                            } else {
                                foreach ($receitas as $receita) {

                                    if ($receita[3] == 1) {
                                        $receita[3] = "Frutos do Mar";
                                    } else if ($receita[3] == 2) {
                                        $receita[3] = "Massas";
                                    } else if ($receita[3] == 3) {
                                        $receita[3] = "Veganas";
                                    } else if ($receita[3] == 4) {
                                        $receita[3] = "Salgados";
                                    } else if ($receita[3] == 5) {
                                        $receita[3] = "Doces";
                                    } else if ($receita[3] == 6) {
                                        $receita[3] = "Carnes";
                                    };


                                    echo '   
                                <div class="itemReceita">
                                    <div class="btnAbrirReceita  id=' . $receita[0] . '">
                                        <div class="imgReceita" id=' . $receita[0] . '>
                                            <img src="./assets/img/'.$receita[4].'" id=' . $receita[0] . '>
                                        </div>
                                        <div class="alignItems" id=' . $receita[0] . '>
                                            <div class="nomeReceita" id=' . $receita[0] . '>
                                                <h3 id=' . $receita[0] . '>' . $receita[1] . '</h3>
                                            </div>
                                            <div class="infoAdicionaisReceita" id=' . $receita[0] . '>
                                                <div class="tempoPreparoReceita" id=' . $receita[0] . '>
                                                    <img src="./assets/img/garfoFaca.png" alt="IconeGarfoFaca" id=' . $receita[0] . '>
                                                    <p id=' . $receita[0] . '>
                                                    ' . $receita[2] . '
                                                    </p>
                                                </div>
                                                <div class="categoriaReceita">
                                                    <img src="./assets/img/categoriaIcone.png" alt="iconeCategoria" id=' . $receita[0] . '>
                                                    <p id=' . $receita[0] . '> 
                                                        ' . $receita[3] . '
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                }
                            }
                        } 
                        elseif (!empty($_GET['pesquisa']) && empty($_GET['categoriaReceita'])) {

                            $search = $_GET['pesquisa'];

                            $receitas = ReceitaController::getRecipesBySearch($search);

                            if (empty($receitas)) {
                                echo '<script>alert("Não foi possível encontrar receitas :(")</script>';
                            } else {
                                foreach ($receitas as $receita) {


                                    if ($receita[3] == 1) {
                                        $receita[3] = "Frutos do Mar";
                                    } else if ($receita[3] == 2) {
                                        $receita[3] = "Massas";
                                    } else if ($receita[3] == 3) {
                                        $receita[3] = "Veganas";
                                    } else if ($receita[3] == 4) {
                                        $receita[3] = "Salgados";
                                    } else if ($receita[3] == 5) {
                                        $receita[3] = "Doces";
                                    } else if ($receita[3] == 6) {
                                        $receita[3] = "Carnes";
                                    };


                                    echo '   
                                    <div class="itemReceita">
                                        <div class="btnAbrirReceita  id=' . $receita[0] . '">
                                            <div class="imgReceita" id=' . $receita[0] . '>
                                                <img src="./assets/img/'.$receita[4].'" id=' . $receita[0] . '>
                                            </div>
                                            <div class="alignItems" id=' . $receita[0] . '>
                                                <div class="nomeReceita" id=' . $receita[0] . '>
                                                    <h3 id=' . $receita[0] . '>' . $receita[1] . '</h3>
                                                </div>
                                                <div class="infoAdicionaisReceita" id=' . $receita[0] . '>
                                                    <div class="tempoPreparoReceita" id=' . $receita[0] . '>
                                                        <img src="./assets/img/garfoFaca.png" alt="IconeGarfoFaca" id=' . $receita[0] . '>
                                                        <p id=' . $receita[0] . '>
                                                        ' . $receita[2] . '
                                                        </p>
                                                    </div>
                                                    <div class="categoriaReceita">
                                                        <img src="./assets/img/categoriaIcone.png" alt="iconeCategoria" id=' . $receita[0] . '>
                                                        <p id=' . $receita[0] . '> 
                                                            ' . $receita[3] . '
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }
                        } 
                        else {
                            $search = $_GET['pesquisa'];
                            $idCategoriaFKK = $_GET['categoriaReceita'];

                            $receitas = ReceitaController::getRecipesBySearchAndCategory($search, $idCategoriaFKK);
                            
                            if (empty($receitas)) {
                                echo '<script>alert("Não foi possível encontrar receitas :(")</script>';
                            } 
                            else {

                                foreach ($receitas as $receita) {


                                    if ($receita[3] == 1) {
                                        $receita[3] = "Frutos do Mar";
                                    } else if ($receita[3] == 2) {
                                        $receita[3] = "Massas";
                                    } else if ($receita[3] == 3) {
                                        $receita[3] = "Veganas";
                                    } else if ($receita[3] == 4) {
                                        $receita[3] = "Salgados";
                                    } else if ($receita[3] == 5) {
                                        $receita[3] = "Doces";
                                    } else if ($receita[3] == 6) {
                                        $receita[3] = "Carnes";
                                    };


                                    echo '   
                                    <div class="itemReceita">
                                        <div class="btnAbrirReceita  id=' . $receita[0] . '">
                                            <div class="imgReceita" id=' . $receita[0] . '>
                                                <img src="./assets/img/'.$receita[4].'" id=' . $receita[0] . '>
                                            </div>
                                            <div class="alignItems" id=' . $receita[0] . '>
                                                <div class="nomeReceita" id=' . $receita[0] . '>
                                                    <h3 id=' . $receita[0] . '>' . $receita[1] . '</h3>
                                                </div>
                                                <div class="infoAdicionaisReceita" id=' . $receita[0] . '>
                                                    <div class="tempoPreparoReceita" id=' . $receita[0] . '>
                                                        <img src="./assets/img/garfoFaca.png" alt="IconeGarfoFaca" id=' . $receita[0] . '>
                                                        <p id=' . $receita[0] . '>
                                                        ' . $receita[2] . '
                                                        </p>
                                                    </div>
                                                    <div class="categoriaReceita">
                                                        <img src="./assets/img/categoriaIcone.png" alt="iconeCategoria" id=' . $receita[0] . '>
                                                        <p id=' . $receita[0] . '> 
                                                            ' . $receita[3] . '
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                    } else {
                        $receitas = ReceitaController::allReceitas();
                        foreach ($receitas as $receita) {


                            if ($receita[3] == 1) {
                                $receita[3] = "Frutos do Mar";
                            } else if ($receita[3] == 2) {
                                $receita[3] = "Massas";
                            } else if ($receita[3] == 3) {
                                $receita[3] = "Veganas";
                            } else if ($receita[3] == 4) {
                                $receita[3] = "Salgados";
                            } else if ($receita[3] == 5) {
                                $receita[3] = "Doces";
                            } else if ($receita[3] == 6) {
                                $receita[3] = "Carnes";
                            };


                            echo '   
                            <div class="itemReceita">
                                <div class="btnAbrirReceita  id=' . $receita[0] . '">
                                    <div class="imgReceita" id=' . $receita[0] . '>
                                        <img src="./assets/img/'.$receita[4].'" id=' . $receita[0] . '>
                                    </div>
                                    <div class="alignItems" id=' . $receita[0] . '>
                                        <div class="nomeReceita" id=' . $receita[0] . '>
                                            <h3 id=' . $receita[0] . '>' . $receita[1] . '</h3>
                                        </div>
                                        <div class="infoAdicionaisReceita" id=' . $receita[0] . '>
                                            <div class="tempoPreparoReceita" id=' . $receita[0] . '>
                                                <img src="./assets/img/garfoFaca.png" alt="IconeGarfoFaca" id=' . $receita[0] . '>
                                                <p id=' . $receita[0] . '>
                                                ' . $receita[2] . '
                                                </p>
                                            </div>
                                            <div class="categoriaReceita">
                                                <img src="./assets/img/categoriaIcone.png" alt="iconeCategoria" id=' . $receita[0] . '>
                                                <p id=' . $receita[0] . '> 
                                                    ' . $receita[3] . '
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
        if (isset($_GET['buscar'])) {
            if (empty($_GET['categoriaReceita']) && empty($_GET['pesquisa'])) {
            } 
            elseif (!empty($_GET['categoriaReceita']) && empty($_GET['pesquisa'])) {
                $idCategoriaFKK = $_GET['categoriaReceita'];
                $receitas = ReceitaController::allDetailsReceitasByCategory($idCategoriaFKK);
                foreach ($receitas as $receita) {

                    if ($receita[22] == 1) {
                        $receita[22] = "Frutos do Mar";
                    } else if ($receita[22] == 2) {
                        $receita[22] = "Massas";
                    } else if ($receita[22] == 3) {
                        $receita[22] = "Veganas";
                    } else if ($receita[22] == 4) {
                        $receita[22] = "Salgados";
                    } else if ($receita[22] == 5) {
                        $receita[22] = "Doces";
                    } else if ($receita[22] == 6) {
                        $receita[22] = "Carnes";
                    };


                    $ingrediente1 =  empty($receita[6]) === true ? "Não há mais ingredientes" :  $receita[6];
                    $ingrediente2 =  empty($receita[7]) === true ? "Não há mais ingredientes" :  $receita[7];
                    $ingrediente3 =  empty($receita[8]) === true ? "Não há mais ingredientes" :  $receita[8];
                    $ingrediente4 =  empty($receita[9]) === true ? "Não há mais ingredientes" :  $receita[9];
                    $ingrediente5 =  empty($receita[10]) === true ? "Não há mais ingredientes" :  $receita[10];
                    $ingrediente6 =  empty($receita[11]) === true ? "Não há mais ingredientes" :  $receita[11];
                    $ingrediente7 =  empty($receita[12]) === true ? "Não há mais ingredientes" :  $receita[12];
                    $ingrediente8 =  empty($receita[13]) === true ? "Não há mais ingredientes" :  $receita[13];
                    $ingrediente9 =  empty($receita[14]) === true ? "Não há mais ingredientes" :  $receita[14];
                    $ingrediente10 = empty($receita[15]) === true ? "Não há mais ingredientes" :  $receita[15];
                    $ingrediente11 = empty($receita[16]) === true ? "Não há mais ingredientes" :  $receita[16];
                    $ingrediente12 = empty($receita[17]) === true ? "Não há mais ingredientes" :  $receita[17];
                    $ingrediente13 = empty($receita[18]) === true ? "Não há mais ingredientes" :  $receita[18];
                    $ingrediente14 = empty($receita[19]) === true ? "Não há mais ingredientes" :  $receita[19];
                    $ingrediente15 = empty($receita[20]) === true ? "Não há mais ingredientes" :  $receita[20];


                    $modoDePreparo =  explode(".", $receita[21]);
                    $string = "";

                    for ($i = 0; $i < count($modoDePreparo); $i++) {
                        $numero = $i;
                        $br = "<br>";
                        if ($i < count($modoDePreparo) - 1) {
                            $string .= $numero . ". " . $modoDePreparo[$i] . " " . $br;
                        }
                    }

                    echo '
                        <div class="detalhesReceita" id="detalhesReceita' . $receita[0] . '">
                            <div class="col-left">
                                <div class="videoReceita">
                                    ' . $receita[5] . '
                                </div>
                                <div class="ingredientesReceita">
                                    <h2>Ingredientes</h2>
                                    <p>
                                        -> ' . $ingrediente1 . '
                                        <br>
                                        -> ' . $ingrediente2 . '
                                        <br>
                                        -> ' . $ingrediente3 . '
                                        <br>
                                        -> ' . $ingrediente4 . ' 
                                        <br>
                                        -> ' . $ingrediente5 . ' 
                                        <br>
                                        -> ' . $ingrediente6 . '
                                        <br>
                                        -> ' . $ingrediente7 . '
                                        <br>
                                        -> ' . $ingrediente8 . '
                                        <br>
                                        -> ' . $ingrediente9 . '
                                        <br>
                                        -> ' . $ingrediente10 . '
                                        <br>
                                        -> ' . $ingrediente11 . '
                                        <br>
                                        -> ' . $ingrediente12 . '
                                        <br>
                                        -> ' . $ingrediente13 . '
                                        <br>
                                        -> ' . $ingrediente14 . '
                                        <br>
                                        -> ' . $ingrediente15 . '
                                    </p>
                                </div>
                            </div>
                            <div class="col-right">
                                <div class="btnCloseAndHeader">
                                    <h1>' . $receita[2] . '</h1>
                                    <a href="#"><i class="las la-times btnClose" id="' . $receita[0] . '"></i></a>
                
                                </div>
                                <div class="informacoesReceita">
                                    <div class="divInfo">
                                        <img src="./assets/img/categoriaIcon.png" alt="">
                                        <label>' . $receita[22] . '</label>
                                    </div>
                                    <div class="divInfo">
                                        <img src="./assets/img/tempoPreparoIcon.png" alt="">
                                        <label>' . $receita[4] . '</label>
                                    </div>
                                    <div class="divInfoExclusiva">
                                        <img src="./assets/img/porcoesIcon.png" alt="">
                                        <label>' . $receita[3] . ' Porções</label>
                                    </div>
                                    <div class="divInfo">
                                        <img src="./assets/img/gastoCaloricoIcon.png" alt="">
                                        <label>' . $receita[3] . ' cal</label>
                                    </div>
                
                
                                </div>
                
                                <div class="modoPreparoReceita">
                                    <div class="modoPreparoTitulo">
                                        <div class="imgModoPreparo">
                                            <img src="./assets/img/modoPreparoIcon.png" alt="">
                
                                        </div>
                                        <h2>Modo de Preparo</h2>
                                    </div>
                                    <p>
                                        ' . $string . '  
                                    </p>
                
                                </div>
                
                            </div>
                        </div>
                        ';
                }
            } 
            elseif (!empty($_GET['pesquisa']) && empty($_GET['categoriaReceita'])) {
                $search = $_GET['pesquisa'];
                $receitas = ReceitaController::allDetailsReceitasBySearch($search);

                foreach ($receitas as $receita) {

                    if ($receita[22] == 1) {
                        $receita[22] = "Frutos do Mar";
                    } else if ($receita[22] == 2) {
                        $receita[22] = "Massas";
                    } else if ($receita[22] == 3) {
                        $receita[22] = "Veganas";
                    } else if ($receita[22] == 4) {
                        $receita[22] = "Salgados";
                    } else if ($receita[22] == 5) {
                        $receita[22] = "Doces";
                    } else if ($receita[22] == 6) {
                        $receita[22] = "Carnes";
                    };


                    $ingrediente1 =  empty($receita[6]) === true ? "Não há mais ingredientes" :  $receita[6];
                    $ingrediente2 =  empty($receita[7]) === true ? "Não há mais ingredientes" :  $receita[7];
                    $ingrediente3 =  empty($receita[8]) === true ? "Não há mais ingredientes" :  $receita[8];
                    $ingrediente4 =  empty($receita[9]) === true ? "Não há mais ingredientes" :  $receita[9];
                    $ingrediente5 =  empty($receita[10]) === true ? "Não há mais ingredientes" :  $receita[10];
                    $ingrediente6 =  empty($receita[11]) === true ? "Não há mais ingredientes" :  $receita[11];
                    $ingrediente7 =  empty($receita[12]) === true ? "Não há mais ingredientes" :  $receita[12];
                    $ingrediente8 =  empty($receita[13]) === true ? "Não há mais ingredientes" :  $receita[13];
                    $ingrediente9 =  empty($receita[14]) === true ? "Não há mais ingredientes" :  $receita[14];
                    $ingrediente10 = empty($receita[15]) === true ? "Não há mais ingredientes" :  $receita[15];
                    $ingrediente11 = empty($receita[16]) === true ? "Não há mais ingredientes" :  $receita[16];
                    $ingrediente12 = empty($receita[17]) === true ? "Não há mais ingredientes" :  $receita[17];
                    $ingrediente13 = empty($receita[18]) === true ? "Não há mais ingredientes" :  $receita[18];
                    $ingrediente14 = empty($receita[19]) === true ? "Não há mais ingredientes" :  $receita[19];
                    $ingrediente15 = empty($receita[20]) === true ? "Não há mais ingredientes" :  $receita[20];


                    $modoDePreparo =  explode(".", $receita[21]);
                    $string = "";

                    for ($i = 0; $i < count($modoDePreparo); $i++) {
                        $numero = $i;
                        $br = "<br>";
                        if ($i < count($modoDePreparo) - 1) {
                            $string .= $numero . ". " . $modoDePreparo[$i] . " " . $br;
                        }
                    }

                    echo '
                        <div class="detalhesReceita" id="detalhesReceita' . $receita[0] . '">
                            <div class="col-left">
                                <div class="videoReceita">
                                    ' . $receita[5] . '
                                </div>
                                <div class="ingredientesReceita">
                                    <h2>Ingredientes</h2>
                                    <p>
                                        -> ' . $ingrediente1 . '
                                        <br>
                                        -> ' . $ingrediente2 . '
                                        <br>
                                        -> ' . $ingrediente3 . '
                                        <br>
                                        -> ' . $ingrediente4 . ' 
                                        <br>
                                        -> ' . $ingrediente5 . ' 
                                        <br>
                                        -> ' . $ingrediente6 . '
                                        <br>
                                        -> ' . $ingrediente7 . '
                                        <br>
                                        -> ' . $ingrediente8 . '
                                        <br>
                                        -> ' . $ingrediente9 . '
                                        <br>
                                        -> ' . $ingrediente10 . '
                                        <br>
                                        -> ' . $ingrediente11 . '
                                        <br>
                                        -> ' . $ingrediente12 . '
                                        <br>
                                        -> ' . $ingrediente13 . '
                                        <br>
                                        -> ' . $ingrediente14 . '
                                        <br>
                                        -> ' . $ingrediente15 . '
                                    </p>
                                </div>
                            </div>
                            <div class="col-right">
                                <div class="btnCloseAndHeader">
                                    <h1>' . $receita[2] . '</h1>
                                    <a href="#"><i class="las la-times btnClose" id="' . $receita[0] . '"></i></a>
                
                                </div>
                                <div class="informacoesReceita">
                                    <div class="divInfo">
                                        <img src="./assets/img/categoriaIcon.png" alt="">
                                        <label>' . $receita[22] . '</label>
                                    </div>
                                    <div class="divInfo">
                                        <img src="./assets/img/tempoPreparoIcon.png" alt="">
                                        <label>' . $receita[4] . '</label>
                                    </div>
                                    <div class="divInfoExclusiva">
                                        <img src="./assets/img/porcoesIcon.png" alt="">
                                        <label>' . $receita[3] . ' Porções</label>
                                    </div>
                                    <div class="divInfo">
                                        <img src="./assets/img/gastoCaloricoIcon.png" alt="">
                                        <label>' . $receita[3] . ' cal</label>
                                    </div>
                
                
                                </div>
                
                                <div class="modoPreparoReceita">
                                    <div class="modoPreparoTitulo">
                                        <div class="imgModoPreparo">
                                            <img src="./assets/img/modoPreparoIcon.png" alt="">
                
                                        </div>
                                        <h2>Modo de Preparo</h2>
                                    </div>
                                    <p>
                                        ' . $string . '  
                                    </p>
                
                                </div>
                
                            </div>
                        </div>
                        ';
                }
            } 
            else {
                $idCategoriaFKK = $_GET['categoriaReceita'];
                $search = $_GET['pesquisa'];
                $receitas = ReceitaController::allDetailsReceitasBySearchAndCategory($search, $idCategoriaFKK);

                foreach ($receitas as $receita) {

                    if ($receita[22] == 1) {
                        $receita[22] = "Frutos do Mar";
                    } else if ($receita[22] == 2) {
                        $receita[22] = "Massas";
                    } else if ($receita[22] == 3) {
                        $receita[22] = "Veganas";
                    } else if ($receita[22] == 4) {
                        $receita[22] = "Salgados";
                    } else if ($receita[22] == 5) {
                        $receita[22] = "Doces";
                    } else if ($receita[22] == 6) {
                        $receita[22] = "Carnes";
                    };


                    $ingrediente1 =  empty($receita[6]) === true ? "Não há mais ingredientes" :  $receita[6];
                    $ingrediente2 =  empty($receita[7]) === true ? "Não há mais ingredientes" :  $receita[7];
                    $ingrediente3 =  empty($receita[8]) === true ? "Não há mais ingredientes" :  $receita[8];
                    $ingrediente4 =  empty($receita[9]) === true ? "Não há mais ingredientes" :  $receita[9];
                    $ingrediente5 =  empty($receita[10]) === true ? "Não há mais ingredientes" :  $receita[10];
                    $ingrediente6 =  empty($receita[11]) === true ? "Não há mais ingredientes" :  $receita[11];
                    $ingrediente7 =  empty($receita[12]) === true ? "Não há mais ingredientes" :  $receita[12];
                    $ingrediente8 =  empty($receita[13]) === true ? "Não há mais ingredientes" :  $receita[13];
                    $ingrediente9 =  empty($receita[14]) === true ? "Não há mais ingredientes" :  $receita[14];
                    $ingrediente10 = empty($receita[15]) === true ? "Não há mais ingredientes" :  $receita[15];
                    $ingrediente11 = empty($receita[16]) === true ? "Não há mais ingredientes" :  $receita[16];
                    $ingrediente12 = empty($receita[17]) === true ? "Não há mais ingredientes" :  $receita[17];
                    $ingrediente13 = empty($receita[18]) === true ? "Não há mais ingredientes" :  $receita[18];
                    $ingrediente14 = empty($receita[19]) === true ? "Não há mais ingredientes" :  $receita[19];
                    $ingrediente15 = empty($receita[20]) === true ? "Não há mais ingredientes" :  $receita[20];


                    $modoDePreparo =  explode(".", $receita[21]);
                    $string = "";

                    for ($i = 0; $i < count($modoDePreparo); $i++) {
                        $numero = $i;
                        $br = "<br>";
                        if ($i < count($modoDePreparo) - 1) {
                            $string .= $numero . ". " . $modoDePreparo[$i] . " " . $br;
                        }
                    }

                    echo '
                        <div class="detalhesReceita" id="detalhesReceita' . $receita[0] . '">
                            <div class="col-left">
                                <div class="videoReceita">
                                    ' . $receita[5] . '
                                </div>
                                <div class="ingredientesReceita">
                                    <h2>Ingredientes</h2>
                                    <p>
                                        -> ' . $ingrediente1 . '
                                        <br>
                                        -> ' . $ingrediente2 . '
                                        <br>
                                        -> ' . $ingrediente3 . '
                                        <br>
                                        -> ' . $ingrediente4 . ' 
                                        <br>
                                        -> ' . $ingrediente5 . ' 
                                        <br>
                                        -> ' . $ingrediente6 . '
                                        <br>
                                        -> ' . $ingrediente7 . '
                                        <br>
                                        -> ' . $ingrediente8 . '
                                        <br>
                                        -> ' . $ingrediente9 . '
                                        <br>
                                        -> ' . $ingrediente10 . '
                                        <br>
                                        -> ' . $ingrediente11 . '
                                        <br>
                                        -> ' . $ingrediente12 . '
                                        <br>
                                        -> ' . $ingrediente13 . '
                                        <br>
                                        -> ' . $ingrediente14 . '
                                        <br>
                                        -> ' . $ingrediente15 . '
                                    </p>
                                </div>
                            </div>
                            <div class="col-right">
                                <div class="btnCloseAndHeader">
                                    <h1>' . $receita[2] . '</h1>
                                    <a href="#"><i class="las la-times btnClose" id="' . $receita[0] . '"></i></a>
                
                                </div>
                                <div class="informacoesReceita">
                                    <div class="divInfo">
                                        <img src="./assets/img/categoriaIcon.png" alt="">
                                        <label>' . $receita[22] . '</label>
                                    </div>
                                    <div class="divInfo">
                                        <img src="./assets/img/tempoPreparoIcon.png" alt="">
                                        <label>' . $receita[4] . '</label>
                                    </div>
                                    <div class="divInfoExclusiva">
                                        <img src="./assets/img/porcoesIcon.png" alt="">
                                        <label>' . $receita[3] . ' Porções</label>
                                    </div>
                                    <div class="divInfo">
                                        <img src="./assets/img/gastoCaloricoIcon.png" alt="">
                                        <label>' . $receita[3] . ' cal</label>
                                    </div>
                
                
                                </div>
                
                                <div class="modoPreparoReceita">
                                    <div class="modoPreparoTitulo">
                                        <div class="imgModoPreparo">
                                            <img src="./assets/img/modoPreparoIcon.png" alt="">
                
                                        </div>
                                        <h2>Modo de Preparo</h2>
                                    </div>
                                    <p>
                                        ' . $string . '  
                                    </p>
                
                                </div>
                
                            </div>
                        </div>
                        ';
                }
            }
        } 
        else {
            $receitas = ReceitaController::allDetailsReceitas();
            foreach ($receitas as $receita) {

                if ($receita[22] == 1) {
                    $receita[22] = "Frutos do Mar";
                } else if ($receita[22] == 2) {
                    $receita[22] = "Massas";
                } else if ($receita[22] == 3) {
                    $receita[22] = "Veganas";
                } else if ($receita[22] == 4) {
                    $receita[22] = "Salgados";
                } else if ($receita[22] == 5) {
                    $receita[22] = "Doces";
                } else if ($receita[22] == 6) {
                    $receita[22] = "Carnes";
                };


                $ingrediente1 =  empty($receita[6]) === true ? "Não há mais ingredientes" :  $receita[6];
                $ingrediente2 =  empty($receita[7]) === true ? "Não há mais ingredientes" :  $receita[7];
                $ingrediente3 =  empty($receita[8]) === true ? "Não há mais ingredientes" :  $receita[8];
                $ingrediente4 =  empty($receita[9]) === true ? "Não há mais ingredientes" :  $receita[9];
                $ingrediente5 =  empty($receita[10]) === true ? "Não há mais ingredientes" :  $receita[10];
                $ingrediente6 =  empty($receita[11]) === true ? "Não há mais ingredientes" :  $receita[11];
                $ingrediente7 =  empty($receita[12]) === true ? "Não há mais ingredientes" :  $receita[12];
                $ingrediente8 =  empty($receita[13]) === true ? "Não há mais ingredientes" :  $receita[13];
                $ingrediente9 =  empty($receita[14]) === true ? "Não há mais ingredientes" :  $receita[14];
                $ingrediente10 = empty($receita[15]) === true ? "Não há mais ingredientes" :  $receita[15];
                $ingrediente11 = empty($receita[16]) === true ? "Não há mais ingredientes" :  $receita[16];
                $ingrediente12 = empty($receita[17]) === true ? "Não há mais ingredientes" :  $receita[17];
                $ingrediente13 = empty($receita[18]) === true ? "Não há mais ingredientes" :  $receita[18];
                $ingrediente14 = empty($receita[19]) === true ? "Não há mais ingredientes" :  $receita[19];
                $ingrediente15 = empty($receita[20]) === true ? "Não há mais ingredientes" :  $receita[20];


                $modoDePreparo =  explode(".", $receita[21]);
                $string = "";

                for ($i = 0; $i < count($modoDePreparo); $i++) {
                    $numero = $i;
                    $br = "<br>";
                    if ($i < count($modoDePreparo) - 1) {
                        $string .= $numero . ". " . $modoDePreparo[$i] . " " . $br;
                    }
                }

                echo '
                    <div class="detalhesReceita" id="detalhesReceita' . $receita[0] . '">
                        <div class="col-left">
                            <div class="videoReceita">
                                ' . $receita[5] . '
                            </div>
                            <div class="ingredientesReceita">
                                <h2>Ingredientes</h2>
                                <p>
                                    -> ' . $ingrediente1 . '
                                    <br>
                                    -> ' . $ingrediente2 . '
                                    <br>
                                    -> ' . $ingrediente3 . '
                                    <br>
                                    -> ' . $ingrediente4 . ' 
                                    <br>
                                    -> ' . $ingrediente5 . ' 
                                    <br>
                                    -> ' . $ingrediente6 . '
                                    <br>
                                    -> ' . $ingrediente7 . '
                                    <br>
                                    -> ' . $ingrediente8 . '
                                    <br>
                                    -> ' . $ingrediente9 . '
                                    <br>
                                    -> ' . $ingrediente10 . '
                                    <br>
                                    -> ' . $ingrediente11 . '
                                    <br>
                                    -> ' . $ingrediente12 . '
                                    <br>
                                    -> ' . $ingrediente13 . '
                                    <br>
                                    -> ' . $ingrediente14 . '
                                    <br>
                                    -> ' . $ingrediente15 . '
                                </p>
                            </div>
                        </div>
                        <div class="col-right">
                            <div class="btnCloseAndHeader">
                                <h1>' . $receita[2] . '</h1>
                                <a href="#"><i class="las la-times btnClose" id="' . $receita[0] . '"></i></a>
            
                            </div>
                            <div class="informacoesReceita">
                                <div class="divInfo">
                                    <img src="./assets/img/categoriaIcon.png" alt="">
                                    <label>' . $receita[22] . '</label>
                                </div>
                                <div class="divInfo">
                                    <img src="./assets/img/tempoPreparoIcon.png" alt="">
                                    <label>' . $receita[4] . '</label>
                                </div>
                                <div class="divInfoExclusiva">
                                    <img src="./assets/img/porcoesIcon.png" alt="">
                                    <label>' . $receita[3] . ' Porções</label>
                                </div>
                                <div class="divInfo">
                                    <img src="./assets/img/gastoCaloricoIcon.png" alt="">
                                    <label>' . $receita[3] . ' cal</label>
                                </div>
            
            
                            </div>
            
                            <div class="modoPreparoReceita">
                                <div class="modoPreparoTitulo">
                                    <div class="imgModoPreparo">
                                        <img src="./assets/img/modoPreparoIcon.png" alt="">
            
                                    </div>
                                    <h2>Modo de Preparo</h2>
                                </div>
                                <p>
                                    ' . $string . '  
                                </p>
            
                            </div>
            
                        </div>
                    </div>
                    ';
            }
        }
        ?>

        <script src="./assets/js/script-index.js"></script>
    </div>
</body>

</html>