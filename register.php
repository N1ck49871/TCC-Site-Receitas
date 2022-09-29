<?php
include "./assets/php/conexao.php";
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="./assets/css/register.css">
    </head>

    <body>
        
            <div class="container" id="container">
                <form id="formulario" action="" method="GET" name="formulario">
                    <div class="loginInputs">
                        <header>
                            <h1>Cadastro</h1>
                        </header>
                        <div class="input-field">
                            <input id="nome" name='nameUser' type="text" required form="formulario">
                            <label>Nome de usu&aacute;rio</label>
                        </div>
                        <div class="input-field">
                            <input id='email' name='email' type="email" required form="formulario">
                            <label>Email</label>
                        </div>
                        <div class="input-field">
                            <input id='senha' name='password' class="pswrd" type="password" required form="formulario">
                            <span class="material-symbols-rounded show" id="show">visibility</span>
                            <!-- <span class="show">MOSTRAR</span> -->
                            <label>Senha</label>
                        </div>
                        <div class="input-field">
                            <!-- <span class="show">MOSTRAR</span> -->
                            <input class="pswrd" type="password" required form="formulario">
                             <span class="material-symbols-rounded show" id="show">visibility</span>
                            <label>Confirme sua senha</label>
                        </div>
                        <div class="button">
                            <!-- <input type="submit" value="PRÓXIMO"> -->
                            <button type="button" id="button">PRÓXIMO</button>

                        </div>
                        <div class="signup">
                            J&aacute; tem conta? <a href="login.html">Fa&ccedil;a Login</a>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="main-container" id="main-container">
                <h2>Qual é a sua categoria favorita?</h2>
                
                <div class="radio-buttons">
                        <label class="custom-radio col-a">
                            <input type="radio" name="categoria" value="1" form="formulario">
                            <span class="radio-btn">
                                <i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/sushiIcone.png"/>
                                    <h3>Frutos do Mar</h3>
                                </div>
                            </span>
                        </label>
                        <label class="custom-radio col-b">
                            <input type="radio" name="categoria" value="2" form="formulario">
                            <span class="radio-btn">
                                <i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/massaIcone.png"/>
                                    <h3>Massas</h3>
                                </div>
                            </span>
                        </label>
                        <label class="custom-radio col-c">
                            <input type="radio" name="categoria" value="3" form="formulario">
                            <span class="radio-btn"><i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/veganoIcone.png"/>
                                    <h3>Veganas</h3>
                                </div>
                            </span>
                        </label>
                        <label class="custom-radio col-d">
                            <input type="radio" name="categoria" value="4" form="formulario">
                            <span class="radio-btn"><i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/croassaIcone.png"/>
                                    <h3>Salgados</h3>
                                </div>
                            </span>
                        </label>
                        <label class="custom-radio col-f">
                            <input type="radio" name="radio" value="5" form="formulario">
                            <span class="radio-btn"><i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/boloIcone.png"/>
                                    <h3>Doces</h3>
                                </div>
                            </span>
                        </label>
                        <label class="custom-radio col-g">
                            <input type="radio" name="radio" value="6" form="formulario">
                            <span class="radio-btn"><i class="las la-check-circle"></i>
                                <div class="recipe-icon">
                                    <img src="./assets/img/carneIcone.png"/>
                                    <h3>Carnes</h3>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="button2">
                        <input form="formulario" type="submit" value="FINALIZAR CADASTRO">
                    </div>
            </div>

            
        <script src="./assets/js/script-register.js"></script>
        <script src="./assets/js/script-radio.js"></script>
    </body>
</html>