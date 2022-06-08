<?php 

$host="localhost";     /* conectar ao servidor*/
$user="";         /* loguin da conta no servidor*/
$pass="";             /*senha da conta no servidor*/
$banc="";     /*nome do banco criado*/   

$conectar = mysqli_connect($host, $user, $pass, $banc);

if(!$conectar){echo "erro de ao conectar ";  }


?>
