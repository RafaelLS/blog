<?php
session_start();
//Conexão com o Banco de Dados
require_once 'conectaMySQL.php';
//Não verifica se está logado
//require_once 'protege.php';
//Teste se botão foi pressionado
if (isset($_POST['btnComentario'])) {
    //Extrair dados vindos do POST
    $comentario = utf8_decode($_POST['comentario']);
    $idArtigos = $_POST['idArtigos'];
    
      
    if (isset($_SESSION['idUsers']))
        $idUsers = $_SESSION['idUsers'];
    else
        $idUsers = 0;

    $query = "insert into tblcomentarios values"
            . "(NULL,$idUsers,$idArtigos,"
            . "'$comentario',now(),now())";

  //echo $query;
    //exit();
    if (mysqli_query($link, $query)) {
        echo "<p>Novo comentário inserido com "
        . "sucesso</p>\n";
        echo "<script>";
        echo "setTimeout(\"document.location='index.php'\",1000)";
        echo "</script>";
    } else {
        echo "<p>Comentário não inserido </p>\n";
        echo "<script>";
        echo "setTimeout(\"document.location='index.php'\",1000)";
        echo "</script>";
    }
} else {
    echo "<script>";
    echo "window.location = 'index.php'";
    echo "</script>";
}
?>

