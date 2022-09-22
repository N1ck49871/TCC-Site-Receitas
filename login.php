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
                    <input type="text" required>
                    <label>Email ou nome de usuário</label>
                </div>
                <div class="input-field">
                    <input class="pswrd" type="password" required>
                    <!-- <span class="show">MOSTRAR</span> -->
                     <span class="material-symbols-rounded show" id="show">visibility</span>
                    <label>Senha</label>
                </div>
                <div class="button">
                    <input value="CONECTAR" type="submit">
                </div>
                <div class="signup">
                    Não tem conta? <a href="register.html">Inscreva-se</a>
                </div>
                
            </form>
        </div>
        <script src="./assets/js/script-login.js"></script>
    </body>
</html>