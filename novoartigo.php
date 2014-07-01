<?php
session_start();
//Conexão com o Banco de Dados
require_once 'conectaMySQL.php';
//Verifica se está logado
require_once 'protege.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Novo Artigo</title>
        <link href="css/estilo.css" type="text/css" rel="stylesheet" /> 
        <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
    </head>
    <body>
            <form method="post" action="insereartigo.php">
            <fieldset>
                 <?php
        //Perfil e Sair
        include 'topo.php';
        ?>
                <legend>Novo artigo do Blog</legend>
                <input type="text" name="assunto" placeholder="Assunto" required/></br></br>
                <textarea name="artigo" placeholder="Texto do Artigo" ></textarea></br></br>
                <input type="submit" name="btnArtigo" value="Enviar" />
            </fieldset>
        </form>
    </body>
</html>
