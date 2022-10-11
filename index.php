<?php
// include "./assets/php/conexao.php";
// include "./assets/php/receitaController.php";
// session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc_receitas";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$idCategoriaFKK = $_GET['categoriaReceita'];

$sql = "SELECT `idReceita`,`nomeReceita`, `tempoReceita`, `idcategoriaFK` FROM `receita` WHERE idcategoriaFK=$idCategoriaFKK;";
$result = $conn->query($sql);


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
                            <img src="./assets/img/iconUser.png" alt="">
                        </div>
                        <div class="modal" id="modal">
                            <a href="#">
                                <span>Alterar Informações</span>
                                <div class="img">
                                    <img src="./assets/img/iconUserModal.png" alt="">
                                </div>
                            </a>
                            <a href="#">
                                <span>Sair da conta</span>
                                <div class="img">
                                    <img src="./assets/img/iconClose.png" alt="">
                                    <!-- <img src="./assets/img/iconClose.png" alt=""> -->
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="searchBar">
                        <input class="searchControl" name="pesquisa" type="search" placeholder="Digite o ingrediente da sua receita ou Selecione a receita pra filtrar">
                        <button class="searchBtn" type="submit">
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
                                if ($result->num_rows > 0) {
                                    while ($linha = $result->fetch_assoc()) {
        

                                        $categoria = "$linha[idcategoriaFK]";
                                        if ($categoria == 1) {
                                            $categoria = "Frutos do Mar";
                                        } else if ($categoria == 2) {
                                            $categoria = "Massas";
                                        } else if ($categoria == 3) {
                                            $categoria = "Veganas";
                                        } else if ($categoria == 4) {
                                            $categoria = "Salgados";
                                        } else if ($categoria == 5) {
                                            $categoria = "Doces";
                                        } else if ($categoria == 6) {
                                            $categoria = "Carnes";
                                        };


                                        echo "
                                        <div class='itemReceita'>
                                            <div class='btnAbrirReceita' id='$linha[idReceita]'>
                                                <div class='imgReceita'>
                                                    <img src='./assets/img/food.jpg'>
                                                </div>
                                                <div class='alignItems'>
                                                    <div class='nomeReceita'>
                                                        <h3>$linha[nomeReceita]</h3>
                                                    </div>
                                                    <div class='infoAdicionaisReceita'>
                                                        <div class='tempoPreparoReceita'>
                                                            <img src='./assets/img/garfoFaca.png' alt='IconeGarfoFaca'>
                                                            <p>$linha[tempoReceita]</p>
                                                        </div>
                                                        <div class='categoriaReceita'>
                                                            <img src='./assets/img/categoriaIcone.png' alt='iconeCategoria'>
                                                            <p>$categoria</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                    }
                                } else {
                                    echo 'Não há receita para ser exibida';
                                }
                            
                    ?>

        <div class="detalhesReceita" id="detalhesReceita">
            <div class="col-left">
                <div class="videoReceita">
                    <img src="./assets/img/food.jpg" alt="">
                </div>
                <div class="ingredientesReceita">
                    <h2>Ingredientes</h2>
                    <p>
                        -> 300 gr de macarrão parafuso ou outra massa curta de sua preferência
                        <br>
                        -> 1 1/2 xícaras (chá) de leite
                        <br>
                        -> 2 colheres (sopa) de farinha de trigo
                        <br>
                        -> 1 colher (sopa) de margarina
                        <br>
                        -> 1 unidade de alho picadinho
                        <br>
                        -> 1 xícara (chá) de queijo ralado (gorgonzola, gruyère, cheddar)
                        <br>
                        -> Noz-moscada a gosto
                        <br>
                        -> Pimenta-do-reino branca e sal a gosto
                        <br>
                        -> Parmesão para gratinar a gosto
                    </p>
                </div>
            </div>
            <div class="col-right">
                <div class="btnCloseAndHeader">
                    <h1>Mac And Cheese Americano</h1>
                    <a href="#"><i class="las la-times" id="btnClose"></i></a>

                </div>
                <div class="informacoesReceita">
                    <div class="divInfo">
                        <img src="./assets/img/categoriaIcon.png" alt="">
                        <label>Massa</label>
                    </div>
                    <div class="divInfo">
                        <img src="./assets/img/tempoPreparoIcon.png" alt="">
                        <label>45 Min</label>
                    </div>
                    <div class="divInfoExclusiva">
                        <img src="./assets/img/porcoesIcon.png" alt="">
                        <label>6 Porções</label>
                    </div>
                    <div class="divInfo">
                        <img src="./assets/img/gastoCaloricoIcon.png" alt="">
                        <label>356 cal</label>
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
                        1. Preaqueça o forno em temperatura média, se tiver o gratinador você pode usar apenas esta função.
                        <br>
                        2. Numa panela derreta a margarina e doure o alho.
                        <br>
                        3. Junte a farinha de trigo e mexa bem até formar uma pasta grossa.
                        <br>
                        4. Comece pingando o leite aos poucos, sem parar de mexer.
                        <br>
                        5. Enquanto isso coloque a massa para cozinhar até que esteja al dente.
                        <br>
                        6. Depois de adicionar todo o leite na panela reduza o fogo e mexa sem parar até começar a borbulhar.
                        <br>
                        7. Junte os queijos e cozinhe por 8 minutos, mexendo de vez em quando.
                        <br>
                        8. Se gostar de um molho mais líquido basta acrescentar mais leite, sempre um pouco por vez.
                        <br>
                        9. Quando o molho estiver bem encorpado e os queijos derretidos tempere com noz moscada, pimenta e sal a gosto.
                        <br>
                        10. Escorra o macarrão e coloque-o dentro da panela do molho (se a sua panela puder ir ao forno) misturando bem, ou transfira tudo para um refratário.
                        <br>
                        11. Cubra o macarrão com queijo parmesão e leve para gratinar por 10 minutos, ou até que a superfície esteja levemente dourada.
                    </p>

                </div>

            </div>
        </div>
        <script src="./assets/js/script-index.js"></script>
    </div>
</body>

</html>