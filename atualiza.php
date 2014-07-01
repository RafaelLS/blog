<?php 
    require_once 'protege.php'; 
    require_once 'conectaMySQL.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Atualização de Dados</title>
    </head>
    <body>
        <?php
        if(isset($_POST['btnAtualiza'])){
            $id = $_SESSION['idUsers'];
            $nome = utf8_decode($_POST['nome']);
            $login = $_POST['login'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $query = "UPDATE tblusers SET "
                    . "nome='$nome',login='$login',"
                    . "email='$email',"
                    . "dtAtualiza=now()";
            //Se o comprimento da senha é maior que
            //ZERO, vamos atualizar o campo senha
            if(strlen($senha) > 0){
                  $senha = sha1($senha);//Codifica a senha
                  $query .= ", senha='$senha'";
            }
            //Filtro para UM usuário
            $query .= " WHERE idUsers = $id";
            
           // echo $query;
           // exit();
            
           mysqli_query($link, $query);
           //Verificar se o número de linhas afetadas
           //é maior que ZERO, assim comprovamos
           //que houve atualização.
           $nome = utf8_encode($nome);
           if(mysqli_affected_rows($link) > 0){
               echo "<script>window.alert('";
               echo "Dados do usuário $nome atualizados.";
               echo "');"
               . "window.location='perfil.php';</script>";
           }
           else{
               echo "<script>window.alert('";
               echo "Dados do usuário $nome NÃO atualizados.";
               echo "');"
               . "window.location='perfil.php';</script>";
           }
           
        }   
        else{
            //Se o botão Atualizar não foi pressionado
            //redireciona para index.php
            echo "<script>";
            echo "window.location='perfil.php'";
            echo "</script>";
        }
        ?>
    </body>
</html>
