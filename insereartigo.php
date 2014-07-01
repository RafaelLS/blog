<?php
//Conexão com o Banco de Dados
require_once 'conectaMySQL.php';
//Verifica se está logado
require_once 'protege.php';

//Teste se botão foi pressionado
if(isset($_POST['btnArtigo'])){
  //Extrair dados vindos do POST
  $assunto = $_POST['assunto'];
  $artigo = $_POST['artigo'];
  $id = $_SESSION['idUsers'];
  
  $query = "insert into tblartigos values"
          . "(NULL,$id,'$assunto','$artigo',"
          . "now(),now())";
  
  //echo $query;
  //exit();
  if(mysqli_query($link, $query)){
      echo "<p>Novo artigo inserido com "
            . "sucesso</p>\n";
      echo "<script>";
      echo "setTimeout(\"document.location='index.php'\",2000)";
      echo "</script>";
  }
  else{
      echo "<p>Artigo não inserido </p>\n";
      echo "<script>";
      echo "setTimeout(\"document.location='index.php'\",2000)";
      echo "</script>";
  }
  
}else{
    echo "<script>";
    echo "window.location = 'index.php'";
    echo "</script>";
}

?>

