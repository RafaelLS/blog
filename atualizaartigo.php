<?php
//Conexão com o Banco de Dados
require_once 'conectaMySQL.php';
//Verifica se está logado
require_once 'protege.php';
//Teste se botão foi pressionado
if(isset($_POST['btnAtualizaArtigo'])){
  //Extrair dados vindos do POST
  $assunto = utf8_decode($_POST['assunto']);
  $artigo = utf8_decode($_POST['artigo']);
  $id = $_POST['id'];
  
  $query = "UPDATE `blog`.`tblartigos` SET `assunto` = '$assunto', `artigo` = '$artigo',`dtAtualiza` = NOW() WHERE `tblartigos`.`idArtigos` = $id;";
  
  //echo $query;
  //exit();
  if(mysqli_query($link, $query)){
      echo "<p>Artigo atualizado com sucesso</p>\n";
      echo "<script>";
      echo "setTimeout(\"document.location='index.php'\",1000)";
      echo "</script>";
  }
  else{
      echo "<p>Artigo não atualizado </p>\n";
      echo "<script>";
      echo "setTimeout(\"document.location='index.php'\",1000)";
      echo "</script>";
  }
  
}else{
    echo "<script>";
    echo "window.location = 'index.php'";
    echo "</script>";
}
