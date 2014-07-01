<!DOCTYPE html>
<?php
//Conexão com o Banco de Dados
require_once 'conectaMySQL.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <?php
        /* Verificação de POST
          echo "<pre>";
          print_r($_POST);
          echo "</pre>";
         * 
         */

        //Testar se o botão cadastrar foi pressionado
        if (isset($_POST['btnCadastro']) && $_POST['btnCadastro'] == "Cadastrar") {
            /*
            echo "Botão Cadastrar pressionado";
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
             * 
             */
            $nome = utf8_decode($_POST['nome']);
            $login = $_POST['login'];
            $email = $_POST['email'];
            $senha = sha1($_POST['senha']);
            
            $sql = "insert into tblusers values(NULL,'$nome','$login','$email','$senha',now(),now())";
            //Teste da string SQL
            //echo $sql;
            //exit();
            
            if(mysqli_query($link, $sql)){
                echo "<p>Dados do usuário $_POST[nome] "
                        . "cadastrados corretamente.</p>";
                //Redirecionamento com tempo de 3s
                echo "<script>";
                echo "setTimeout(\"document.location='login.php'\",3000)";
                echo "</script>";
               
            }else{
                echo "<p>Cadastro não efetuado.</p>";
                if(mysqli_errno($link) == 1062)
                    echo "<p>Usuário já existente.</p>";
                
                //Redirecionamento com tempo de 3s
                echo "<script>";
                echo "setTimeout(\"document.location='login.php'\",3000)";
                echo "</script>";
            }//testa envio para o banco de dados
            
        } else {
            //echo "Botão não pressionado";
            //Redirecionamento Javascript
            echo "<script>";
            echo "window.location='login.php'";
            echo "</script>";
        }
        ?>
    </body>
</html>
