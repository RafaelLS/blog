<?php
//conectaMySQL.php

//Variáveis de conexão
$servidor = 'localhost';
$user = 'userbd';
$senha = '123';
$banco = 'blog';

//Efetivação da Conexão com o banco de dados
$link = mysqli_connect($servidor, $user, $senha, $banco) 
        or die("Erro: " . mysqli_connect_errno() . 
        " - " . 
        mysqli_connect_error()); 

//echo 'Passou da conexão!'; 
