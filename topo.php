<?php
//Capturar o ID que está na SESSÃO
//Como esta página será inserida em outra
//Não é necessário inicializar SESSÃO

if(isset($_SESSION['idUsers'])):
$id = $_SESSION['idUsers'];
$usuario = $_SESSION['login'];
?>


<p style="float: right; margin-left:10px;">
    <a href="sair.php" title="Sair - Logout">X</a>
</p>
<p style="float: right; margin-left:10px;">
    <a href="perfil.php" title="Visualizar Perfil"><?php echo "$usuario"; ?></a>
</p>
<p style="float: right;margin-left:10px;">
    <a href="index.php" title="Página Inicial">Home</a>
</p>

<?php else: ?>
<p style="float: right;">
    <a href="login.php" title="Login">Fazer Login</a>
</p>
<?php endif; ?>