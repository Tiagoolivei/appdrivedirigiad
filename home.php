<?php 


session_start();


//if(!isset($_COOKIE[$cookie_name])) {
if(!isset($_SESSION['logado'])){
  header('Location:index.php');
    //print "<a href='index.php>'erro de loguin</a>";
}
//$id=$_COOKIE[$cookie_name];


 $id= $_SESSION['idusuario'];
 
 
 
include_once "conectar.php";

include_once 'deslogar.php';



                               $usuarionome = $_SESSION['nomeusuario'] ;
                               $usuariosenha =  $_SESSION['senhausuario']; 
                             
                              
  $sqla= "SELECT * FROM usuarios WHERE nome='$usuarionome' AND senha='$usuariosenha' ";
  $res = mysqli_query($conectar,$sqla);
  
  
  $pegar = mysqli_fetch_assoc($res);
 
  
   
 
    
    
?>

    



 
    


<!DOCTYPE html>
<html>
<head >
    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="imagens/icotres.png" type="image/png" sizes="16x16">

    <title id="logotitulojs">Sistema - controle de registro </title>
    <meta charset="utf-8" lang="pt-br"/>

</head>

<body>
</header>


<style>
    body{margin: 0px;background:rgb(249, 249, 251);margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background:rgb(10,90,155);
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: white;
  color: #04AA6D;;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
  border:1px solid white; margin-right:10px;
  background-color: #04AA6D;
}



@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {

  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}


  
</style>


<header id="cheader">


<div class="topnav" id="myTopnav">
 
  <a href="home.php" class="active">AppDrive </a> 
  <a >Olá <?php print $pegar['id'];?>, boas-vindas ! </a> 
  <a href="cadastrar.php">Cadastrar</a>
  <a href="pesquisar.php">Pesquisar</a>
   <a href="pesquisarhist.php">Pesquisar historico</a>
  <a href="sair.php">sair</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">Menu
    <i class="fa fa-bars"></i>
  </a>
            
</div>

</header>


         
         <div id="cabecarioesquerdo">
            <?php print $usuario.$id;?>
        
         </div>
 
         
      
                  

    <div id="boasvindas">
    <h2 style="font:16pt arial; color:rgb(90,130,190);"> Olá  <?php print $pegar['id'];?>, boas-vindas ! </h2>  
    </div>

             

          




  
  
 

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
      
</body>
<?php  mysqli_close($conectar); ?>
</html>