<?php 
    require_once 'protege.php'; 
    require_once 'conectaMySQL.php';
?>
<!DOCTYPE html>
<!-- perfil.php -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar dados do Perfil</title>
        <link href="css/estilo.css" type="text/css" rel="stylesheet" /> 
    </head>
    <body>
        <?php include "topo.php";?>
        <h1>Alterar dados do Perfil</h1>
        <?php
        
        $id = $_SESSION['idUsers'];
        $query = "SELECT * FROM tblusers "
                . "WHERE idUsers = $id";
        $result = mysqli_query($link, $query);
        
        //Testa se o número de linha retornado
        //é maior que zero.
        if(mysqli_num_rows($result) > 0){
            $campo = mysqli_fetch_assoc($result);
            //Para testar
            /*
            echo "<pre>";
            print_r($campo);
            echo "</pre>";
             * 
             */
            
            $nome = utf8_encode($campo['nome']);
            //Alteração de login permitida
            //só para fins didáticos
            $login = $campo['login'];
            $email = $campo['email'];
            
        }
            
       
        
        
        ?>
        
         <form action="atualiza.php" method="post">
            <fieldset>
                <legend>Altere seus dados</legend>
                <br /><input type="text" name="nome" required value="<?= $nome ?>"/>
                <br /><input type="text" name="login" required value="<?= $login ?>"/>
                <br /><input type="email" name="email" required value="<?= $email ?>"/>
                <br /><input type="password" name="senha" placeholder="Nova senha" pattern=".{6,12}" title="A senha deve conter de 6 a 12 caracteres"/>
                <br /><input type="submit" name="btnAtualiza" value="Atualizar"/>
            </fieldset>
        </form>
        
    </body>
</html>
