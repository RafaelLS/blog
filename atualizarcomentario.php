<?php
//Conexão com o Banco de Dados
require_once 'conectaMySQL.php';
//Verifica se está logado
require_once 'protege.php';
//Teste se botão foi pressionado
if(isset($_POST['btnAtualizaComentario'])){
  //Extrair dados vindos do POST
   $comentario = utf8_decode($_POST['comentario']);
  $id = $_POST['id'];
  
  $query = "UPDATE `blog`.`tblcomentarios` SET `comentario` = '$comentario',`dtAtualiza` = NOW( ) WHERE `tblcomentarios`.`idComentarios` =$id;";
  
  //echo $query;
  //  exit();
  if(mysqli_query($link, $query)){
      echo "<p>Comentário atualizado com sucesso</p>\n";
      echo "<script>";
      echo "setTimeout(\"document.location='index.php'\",1000)";
      echo "</script>";
  }
  else{
      echo "<p>Comentário não atualizado </p>\n";
      echo "<script>";
      echo "setTimeout(\"document.location='index.php'\",1000)";
      echo "</script>";
  }
  
}else{
    echo "<script>";
    echo "window.location = 'index.php'";
    echo "</script>";
}
