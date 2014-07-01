<?php
session_start();

//Apaga todas as variáveis
session_unset();
//Destrói a sessão
session_destroy();
//Limpa o array $_SESSION
$_SESSION = array();

//Matando o cookie
//tEMPO DE VIDA IGUAL A zero SEGUNDOS
setcookie("login","",0);

header('Location:index.php');

