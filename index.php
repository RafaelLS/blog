<?php
//Conexão com o Banco de Dados
session_start();
require_once 'conectaMySQL.php';


//Início do código para exclusão
//Testar se deseja excluir
if (isset($_POST['e']) && $_POST['e'] == 1) {
    //Confirmado o desejo de excluir
    //Exclusão de artigos
    if (isset($_POST['idArtigos'])) {
        //Existe id para ser excluído
        //Copia o ID para uma variável local
        $idArtigos = $_POST['idArtigos'];
        $apaga = "DELETE FROM `tblartigos` "
                . "WHERE `idArtigos` = $idArtigos";
        //Testar a string de exclusão
        //echo $apaga;
        //exit();
        mysqli_query($link, $apaga);
        if (mysqli_affected_rows($link) > 0) {
            echo "<script>window.alert('";
            echo "Artigo excluído com sucesso.";
            echo "');</script>";
        } else {
            //mensagem de erro
            echo "<script>window.alert('";
            echo "Artigo inexistente.";
            echo "');</script>";
        }
    } else
    //Exclusão de comentários
    if (isset($_POST['idComentarios'])) {
        //Existe id para ser excluído
        //Copia o ID para uma variável local
        $idComentarios = $_POST['idComentarios'];
        $apaga = "DELETE FROM `tblcomentarios` "
                . "WHERE `idComentarios` = $idComentarios";
        //Testar a string de exclusão
        //echo $apaga;
        //exit();
        mysqli_query($link, $apaga);
        if (mysqli_affected_rows($link) > 0) {
            echo "<script>window.alert('";
            echo "Comentário excluído com sucesso.";
            echo "');</script>";
        } else {
            //mensagem de erro
            echo "<script>window.alert('";
            echo "Comentário inexistente.";
            echo "');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog da Aprendizagem</title>
        <link href="css/estilo.css" type="text/css" rel="stylesheet" />   
      
        <script type="text/javascript">
            
            /**
             *Função Javascript que envia os dados via POST
             *http://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit
             */
            function post(path, params, method) {
                method = method || "post"; // Set method to post by default if not specified.

                // The rest of this code assumes you are not using a library.
                // It can be made less wordy if you use one.
                var form = document.createElement("form");
                form.setAttribute("method", method);
                form.setAttribute("action", path);

                for (var key in params) {
                    if (params.hasOwnProperty(key)) {
                        var hiddenField = document.createElement("input");
                        hiddenField.setAttribute("type", "hidden");
                        hiddenField.setAttribute("name", key);
                        hiddenField.setAttribute("value", params[key]);

                        form.appendChild(hiddenField);
                    }
                }

                document.body.appendChild(form);
                form.submit();
            }
            
            
           
            //Função Javascript para confirmar exclusão
            function apagar(idComentarios, nome) {
                if (confirm("Deseja excluir o comentário do " + nome)) {
                    //window.location = "?e=1&id=" + idComentarios;
                    post('index.php', {'e': '1','idComentarios':idComentarios});
                }
            }
             function apagarA(idArtigos, nome) {
                if (confirm("Deseja excluir o Artigo do " + nome)) {
                    //window.location = "?e=2&id=" + idArtigos;
                    post('index.php', {'e': '1','idArtigos':idArtigos});
                }
            }
            
              function editarArtigo(idArtigos) {
                  post('editarartigo.php', {'e': '3','idArtigos':idArtigos});
                }
             
             function editarComentario(idComentarios) {
                  post('editarcomentario.php', {'e': '4','idComentarios':idComentarios});
                }
            
        </script>
    </head>
    <body>
        <?php
        //Perfil e Sair
        include 'topo.php';
        //Link para  novo artigo
        if(isset($_SESSION['idUsers'])):
        ?>    
        <p style="float: right; margin-right: 10px;">
            <a href="novoartigo.php" title="Inserir novo artigo">
                Novo Artigo
            </a> 
        </p>
        <?php endif; ?>
        <h1>Artigos</h1>

        <?php
        //Busca de Artigos no Banco de Dados
        //Montagem do artigo HTML
        $query = "SELECT a . * , u.nome AS nome
                  FROM tblartigos a
                  INNER JOIN tblusers u
                  USING ( idusers )
                  ORDER BY a.dtCriacao DESC";
        $result = mysqli_query($link, $query);
        while ($linha = mysqli_fetch_assoc($result)) {
            //Para teste
            /*
              echo "<pre>";
              print_r($linha);
              echo "</pre>";
             * 
             */
            echo "<article id='art$linha[idArtigos]'>\n";
            echo "\t<header>\n";
            echo "\t\t<h2>" . utf8_encode($linha['assunto']) . "</h2>\n";
            echo "\t\t<p>Publicado em: $linha[dtCriacao]</p>\n";
            echo "\t\t\t\t<p>Atualizado em: $linha[dtAtualiza]</p>\n";
            echo "\t\t<p>Autor: " . utf8_encode($linha['nome']) . "</p>\n";
            echo "\t</header>\n";
            echo "\t<p>" . utf8_encode($linha['artigo']) . "</p>\n";
            //Se For Administrador
            if (isset($_SESSION['idUsers']) && $_SESSION['idUsers']== 1){
                 echo "<a href='#' "
                    . " onclick='apagarA($linha[idArtigos],\"" . utf8_encode($linha['nome']) . "\")'"
                    . "title='Excluir'><img src='img/excluir.png'/></a>";
                if($_SESSION['idUsers'] == $linha['idUsers']){
                //Editar
                 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                        . "<a href='#'"
                         . "onclick='editarArtigo($linha[idArtigos])'"
                         . "title='Editar'>"
                        . "<img src='img/editar.png' title='Editar'/></a>";
                }
            } //Se for usuario comun, so pode apagar o seu 
            elseif (isset ($_SESSION['idUsers']) && $_SESSION['idUsers'] == $linha['idUsers']) {
                echo "<a href='#' "
                    . " onclick='apagarA($linha[idArtigos],\"" . utf8_encode($linha['nome']) . "\")'"
                    . "title='Excluir'><img src='img/excluir.png'/></a>"; 
                if($_SESSION['idUsers'] == $linha['idUsers']){
                //Editar
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                         . "<a href='#'"
                        . "onclick='editarArtigo($linha[idArtigos])'"
                        . "title='Editar'>"
                        . "<img src='img/editar.png' title='Editar'/></a>";
                }
               }
            echo "\t<p><a href='novocomentario.php?idArtigos=$linha[idArtigos]'>Novo Comentário</a></p>\n";
              
           
            
            //Seção de comentários
            $query = "SELECT c . * , u.nome AS nome
                      FROM tblcomentarios c
                      INNER JOIN tblusers u
                      USING ( idUsers )
                      WHERE idArtigos = $linha[idArtigos]
                      ORDER BY dtCriacao DESC";
            //Resultado dos comentários
            $resultC = mysqli_query($link, $query);
            if (mysqli_num_rows($resultC) > 0) {
                echo "\t<section>\n";
                echo "\t\t<h2>Comentários</h2>\n";
                //Início comentários
                while ($linhaC = mysqli_fetch_assoc($resultC)) {
                    echo "\t\t<article id='art$linha[idArtigos]com$linhaC[idComentarios]'>\n";
                    echo "\t\t\t<header>\n";
                    echo "\t\t\t\t<p>Publicado em: $linhaC[dtCriacao]</p>\n";
                    echo "\t\t\t\t<p>Atualizado em: $linhaC[dtAtualiza]</p>\n";
                    echo "\t\t\t\t<p>Autor: ".  utf8_encode($linhaC['nome'])."</p>\n";
                    echo "\t\t\t</header>\n";
                    echo "\t\t\t<p>".utf8_encode($linhaC['comentario'])."</p>\n";
                    //Se For Administrador
                    if (isset($_SESSION['idUsers']) && $_SESSION['idUsers'] == 1){
                    echo "<a href='#' "
                    . " onclick='apagar($linhaC[idComentarios],\"" . utf8_encode($linhaC['nome']) . "\")'"
                    . "title='Excluir'><img src='img/excluir.png'/></a>";
                    if($_SESSION['idUsers'] == $linhaC['idUsers']){
                    //Editar
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                         . "<a href='#'"
                            . "onclick='editarComentario($linhaC[idComentarios])'>"
                        . "<img src='img/editar.png' title='Editar'/></a>";
                    }
                    }
                    //Se for usuario comun, so pode apagar o seu 
                    elseif (isset ($_SESSION['idUsers']) && ($_SESSION['idUsers'] == $linhaC['idUsers'] || $_SESSION['idUsers'] == $linha['idUsers'] )) {
                    echo "<a href='#' "
                    . " onclick='apagar($linhaC[idComentarios],\"" . utf8_encode($linhaC['nome']) . "\")'"
                    . "title='Excluir'><img src='img/excluir.png'/></a>";  
                    
                    if($_SESSION['idUsers'] == $linhaC['idUsers']){
                    //Editar
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                         . "<a href='#'"
                            . "onclick='editarComentario($linhaC[idComentarios])'>"
                        . "<img src='img/editar.png' title='Editar'/></a>";
                    }             
                    }                                     
                    
                   echo "\t\t</article>\n";
                }//Fim Comentários
                echo "\t</section>\n";
            }//Fechamento da seção de comentários

            echo "</article>\n\n";
        }
        ?>                                                             
    </body>
</html>
