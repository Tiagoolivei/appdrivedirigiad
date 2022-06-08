<?php 

$host="localhost";     /* conectar ao servidor*/
$user="id19053810_appmobilidade";         /* loguin da conta no servidor*/
$pass="Passaro@10@10";             /*senha da conta no servidor*/
$banc="id19053810_cadastromobilidade";     /*nome do banco criado*/   

$conectar = mysqli_connect($host, $user, $pass, $banc);

if(!$conectar){echo "erro de ao conectar ";  }


?>
