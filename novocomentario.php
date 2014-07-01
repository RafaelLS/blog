<?php
session_start();
//Conexão com o Banco de Dados
require_once 'conectaMySQL.php';
//Não é necessário verificar se está logado 
//para fazer comentários
//require_once 'protege.php';

if (!isset($_GET['idArtigos'])) {
    echo "<script>";
    echo "window.location = 'index.php'";
    echo "</script>";
}

$idArtigos = $_GET['idArtigos'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Novo Comentário</title>
        <link href="css/estilo.css" type="text/css" rel="stylesheet" /> 
        <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
    </head>
    <body>
        <form method="post" action="inserecomentario.php">
            <fieldset>
                       <?php
        //Perfil e Sair
        include 'topo.php';
        ?>
                <legend>Novo Comentário</legend>
                <input type="hidden" name="idArtigos" value="<?= $idArtigos ?>"/></br></br>
                <textarea name="comentario" placeholder="Comentário" ></textarea></br></br>
                <input type="submit" name="btnComentario" value="Comentar" />
            </fieldset>
        </form>
    </body>
</html>
