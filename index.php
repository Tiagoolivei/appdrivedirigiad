<?php

include_once "conectar.php";


session_start();


$_SESSION['nome']='Juliana';

if(isset($_POST['btloguin'])){ ///1

          $usuario= $_POST['nameloguin'];
         $senha= $_POST['namesenha'];

                        $sqlverificar="SELECT * FROM usuarios WHERE nome='$usuario' and BINARY senha='$senha' ";      
                        $resultverificar= mysqli_query($conectar, $sqlverificar);  
                        
                        $usuarioexite = mysqli_num_rows($resultverificar);
                        if($usuarioexite>0){

                   $sqlloguisesion="SELECT * FROM usuarios WHERE nome='$usuario' and BINARY senha='$senha' ";      
                        $sqresultloguisession= mysqli_query($conectar, $sqlloguisesion);  
                        
                        $dados = mysqli_fetch_assoc($sqresultloguisession);
                        
                                 $_SESSION['idusuario'] = $dados['id'];
                                $_SESSION['logado']=true;
                                 $_SESSION['senhausuario'] = $senha;
                                
                                $_SESSION['nomeusuario'] = $usuario;
                               
         //   $erros[]="<a style='font:11pt arial;color:rgb(10,50,130);' href='home.php?id=".$_SESSION['idusuario']."&nome=".$_SESSION['nomeusuario']."'>Olá ".$_SESSION['nomeusuario'].", gotaria de acessar ?</a>";
                               header('Location:home.php');
                                mysqli_close($conectar);
                        }
            else{print"<script>alert('usuário não encontrado');</script>"; header('Location:index.php');}
}
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
    
<style>
   <style>
body {font-family: Arial, Helvetica, sans-serif;}

.container label{font:13pt arial;}
.container input{font:13pt arial;}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 600px) {
 
  span.psw {
     display: block;
     float: none;}
     
#btloguin{font:16pt arial;width:100%;height:16%;}
     
.container label{font:16pt arial;}
.container input{font:16pt arial; padding:10px;}
     
  
  .cancelbtn {
     width: 100%;
  }
}

</style>    
      
   
   
   
   
   
   
   
   
   
   
   
<h2>Logar no sistema</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Logar</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
      
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="avatar.png" alt="Avatar" class="avatar"style="width:10%;">
    </div>

    <div class="container">
      <label for="uname"><b>Nome de usuário</b></label>
      <input type="text" placeholder="Enter Username" id="nameloguin" name="nameloguin" 
      value="" autocomplete="of" required>

      <label for="psw"><b>Senha</b></label>
      <input  id="namesenha" name="namesenha" type="password"  value=""
      placeholder="Enter Password"  required>
        
      <button type="submit" id="btloguin" name="btloguin">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
       <a href="sesaoacessar.php">acessar sessão</a>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

   
   
       
      
       
       
    </body>
    </html>