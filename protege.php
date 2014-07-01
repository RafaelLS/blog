<?php
//protege.php
//Proteção de Página
session_start(); #Inicia a SESSÃO
//Lógica inversa com a NEGAÇÃO !

//Se o login NÃO existir, NÃO estiver setado
if(!isset($_SESSION['login'])){  
    //Sessão não existe, verificar o COOKIE
    if(isset($_COOKIE['login'])){
    //Se o cookie existe, cria a sessão
    //Para manter o usuário conectado
        $_SESSION['login']=$_COOKIE['login'];
    }  else {
    //Nem a sessão e nem o cookie existem    
        //Redirecionamento
        header('Location:login.php');   
    } 
}

