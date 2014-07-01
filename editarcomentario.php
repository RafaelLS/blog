<?php
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
    </head>
    <body onLoad="document.atualizaCom.comentario.focus();">
        
        <?php
         
         if (isset($_POST['e']) && $_POST['e'] == 4) {
    //pronto para editar
    if (isset($_POST['idComentarios'])) {
        $id = $_POST['idComentarios'];
        //echo "$id";
        //exit();
        $buscarArt = "select * from tblcomentarios where idComentarios=$id";
        //echo "$buscarArt";
        //exit();
        $resultado = mysqli_query($link, $buscarArt);
        $linha = mysqli_fetch_assoc($resultado);
//        test retorno dos dados
//        echo "<pre>";
//      print_r($linha);
//        echo "</pre>";
        
        $comentario = utf8_encode($linha['comentario']);
        
    }
}     
        ?>
        <form method="post" action="atualizarcomentario.php" name="atualizaCom">
            <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
            <fieldset>
                <?php
                //Perfil e Sair
        include 'topo.php';
        ?>
                
                <legend>Atualizar Comentário</legend>
                <input type="hidden" name="id" value="<?php echo $_POST['idComentarios'] ?>" />
                <textarea name="comentario"> <?php echo $comentario ?>   </textarea></br></br>
                <input type="submit" name="btnAtualizaComentario" value="Atualizar"  />
            </fieldset>
        </form>
    </body>
</html>
