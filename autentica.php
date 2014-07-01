<?php
session_start();
//Conexão com Banco de Dados
require_once 'conectaMySQL.php';
?>
<!DOCTYPE html>
<!-- autentica.php -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Autenticação do Login</title>
    </head>
    <body>
        <?php
        //Testar se o botão Entrar foi pressionado
        if (isset($_POST['btn'])) {
            echo "Botão Entrar pressionado! <br />";
            //Capturar as variáveis
            //Só para debugar
            echo "Login: $_POST[login] <br />";
            echo "Senha: $_POST[senha] <br />";
            echo "Conectado: " . @$_POST['conectado'] . "<br />";
            echo "Senha codificada: " . sha1($_POST['senha']) . "<br/>";

            $login = $_POST['login'];
            $senha = sha1($_POST['senha']);
            $sql = "SELECT idUsers,login,senha "
                    . "FROM tblusers WHERE "
                    . "login='$login' AND "
                    . "senha='$senha'";

            //echo $sql;
            //exit();
            //Buscar no Banco de Dados o Login e a Senha
            $result = mysqli_query($link, $sql);

            //Nº de linhas vinda do banco de dados
            $linha = mysqli_num_rows($result);
            //exit();

            if ($linha) {
                //echo "Existe User.";
                
                //Autenticação concluída
                //Criando a sessão
                $_SESSION['login'] = $login;
                $tblusers = mysqli_fetch_assoc($result);
                //Pega o ID do Banco e coloca na sessão
                $_SESSION['idUsers']=$tblusers['idUsers'];
               
                if (isset($_POST['conectado']))
                    setcookie("login", $login, time() + 24 * 60 * 60); //1 dia de vida


                echo "<p>";
                echo "<a href='index.php'>Entrar no Site</a>";
                echo "</p>";
                echo "<script>";
                echo "setTimeout(\"document.location='index.php'\",3000)";
                echo "</script>";
            } else {
                //echo "Não existe User e Senha.";  
                echo "Login ou Senha inválidos <br />";
                echo "<script>";
                echo "setTimeout(\"document.location='login.php'\",3000)";
                echo "</script>";
            }

            //exit();
            
        } else {
            echo "Botão Entrar NÃO foi pressionado";
            //Redirecionamento para a página de login
            echo "<script>";
            echo "window.location = 'login.php'";
            echo "</script>";
        }
        ?>
    </body>
</html>
