<?php
include_once "./assets/php/conexao.php";
include_once 'assets/php/usuarioController.php';
session_start();

$user = new usuarioController();
$boolean = !empty($_GET['erro']);


if($boolean) {
    echo '<script>alert("Você precisa logar para entrar no site")</script>';
}


if (isset($_POST['enviar'])) {
    $email = trim($_POST['email']);
    $senha = trim($_POST['pswrd']);
    $retorno = $user->login($email, $senha);
    if (!empty($retorno)) {
        header('Location: index.php');
        $_SESSION['emailSessao'] = $retorno[1];
        $_SESSION['senhaSessao'] = $retorno[2];
        $_SESSION['nomeSessao'] = $retorno[3];
        $_SESSION['idUsuario'] = $retorno[4];
        $_SESSION['logado'] = true;
        exit;
    }else{
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL= login.php'>
                <script type=\"text/javascript\">
                    alert(\"Senha ou email incorretos!\");
                </script>
            ";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="./assets/css/login.css">
    </head>
    <body>
        
        <div class="container">
            <header>
                <h1>Login</h1>
            </header>
            <form action="" method="POST">
                <div class="input-field">
                    <input type="text" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-field">
                    <input class="pswrd" name="pswrd" type="password" required>
                    <!-- <span class="show">MOSTRAR</span> -->
                     <span class="material-symbols-rounded show" id="show">visibility</span>
                    <label>Senha</label>
                </div>
                <div class="button">
                    <input value="CONECTAR" name="enviar" type="submit">
                </div>
                <div class="signup">
                    Não tem conta? <a href="register.php">Inscreva-se</a>
                </div>
                
            </form>
        </div>
        <script src="./assets/js/script-login.js"></script>
    </body>
</html>

        <!-- <div class="detalhesReceita" id="detalhesReceita">
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
        </div> -->