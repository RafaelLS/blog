<?php
//print_r($_POST);
//exit();
//Conexão com o Banco de Dados
session_start();
require_once 'conectaMySQL.php';

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <link href="css/estilo.css" type="text/css" rel="stylesheet" />
          <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
    </head>
     <body onLoad="document.atualizaArt.assunto.focus();">
        <?php
        
       
         if (isset($_POST['e']) && $_POST['e'] == 3) {
    //pronto para editar
    if (isset($_POST['idArtigos'])) {
        $id = $_POST['idArtigos'];
        //echo "$id";
        //exit();
        $buscarArt = "select * from tblartigos where idArtigos=$id";
        //echo "$buscarArt";
        //exit();
        $resultado = mysqli_query($link, $buscarArt);
        $linha = mysqli_fetch_assoc($resultado);
//        test retorno dos dados
//        echo "<pre>";
//      print_r($linha);
//        echo "</pre>";
        $assunto = $linha['assunto'];
        $artigo = utf8_encode($linha['artigo']);
        
    }
}     
        ?>
         <form method="post" action="atualizaartigo.php" name="atualizaArt">
            <fieldset>
                <?php
                //Perfil e Sair
        include 'topo.php';
        ?>
                <legend>Atualizar Artigo</legend>
                <input type="hidden" name="id" value="<?php echo $_POST['idArtigos'] ?>" />
                <input type="text" name="assunto" value="<?php echo $assunto ?>" /></br></br>
                <textarea name="artigo"><?php echo $artigo ?>   </textarea></br></br>
                <input type="submit" name="btnAtualizaArtigo" value="Atualizar"  />
            </fieldset>
        </form>
    </body>
</html>
