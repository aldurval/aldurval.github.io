<?PHP
include("funcoes.php");
    session_start();
    if(!(isset($_SESSION['user']))) $_SESSION['user'] = false;
    
    $_SESSION['baixa'] = false;
?>


<!DOCTYPE html><!-- doctype do HTML5 -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="pt-BR" class="no-js"><!-- A classe 'no-js' é reconhecida pelo javascript modernizr, permitindo que browsers antigos reconheçam corretamente nossas tags -->
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
                
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Importante para habilitar os recursos de Responsividade em conjunto com o CSS -->
        
        <meta name="description" content="Intranet - CPN Alimentos" />
        
        <script src="js/jquery-1.8.1.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/modernizr-2.6.1.min.js"></script>
                
        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="css/main.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
    body {
    background-image: url(img/fundo.png);
    background-repeat: repeat;
}
    </style>
    </head>
<body>
<?php 
        
$con=conecta(); 

?>
        <!--[if lt IE 7]>
            <p class="chromeframe">Você está usando um brower desatualizado. <a href="http://browsehappy.com/">Atualize seu browser</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">instale Google Chrome Frame</a> para melhor visualizar este site.</p>
        <![endif]-->

        
        <!-- Início da barra de navegação -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><IMG  width="80px" height="20px" src="img/logo.png" ></a>
      <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#" title="Página inicial">INTRANET</a></li>
                            <li><a href='index.php' title="Home" rel="nofollow"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                            <li><a href='aempresa.php' title="Empresa" rel="nofollow">A Empresa</a></li>
                            <li><a href="fale_conosco.php" title="Fale Conosco" rel="nofollow">Fale Conosco</a></li>
                            <li><a href="almoco.php" title="Sua opnião - Almoço" rel="nofollow">Almoço</a></li>
                            <li><a href="cadastro.php" title="Login"> Cadastrar-se</a></li>






                        </ul>
                    </div><!--/.nav-collapse -->
               </div>
           </div>
        </div>
        <!-- Fim da barra de navegação -->
        <div id="fundo-externo">
    <div id="fundo">
        <img src='img/fundo.png' alt="" />
    </div>
</div>



      
     

<div class="container-fluid ">
<div id="site_center">
            <div class="panel panel-red trans-red">
                <div class="panel-heading">
                    <div class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                    </div>
                <div class="panel-body">
                    <div class='panel-group'>
                       
<fieldset>
                        <br>
                        <legend>Como está o nosso Almoço?</legend>
                    </fieldset>
       

       <div class="row-fluid">
            <div class="span12">
                
                    

                    <br><form method="post" action="almoco.php">
                    <label>Motivo:  </label>
                    <select name="motivo">
<?php

$buscando = odbc_exec($con, "select * from motivo");

while($linha = odbc_fetch_array($buscando)){

$idmotivo = $linha['idmotivo'];
$descricao = $linha['descricao'];

echo "<option value=\"$idmotivo\">$descricao</option>";

}

?>
</select><br>
                        <br>


               
                <div class="row-fluid">
                    <div class="span12">
                       
                        
                          
                        <div class="span2">
                            <img src="img/otimo.png" width="130" height="50"> <br>
                        <input type="radio" value="1" name="opcao"> Excelente
                        </div>
                        <div class="span1">
                        </div>
                        <div class="span2">
                            <img src="img/bom.png" width="130" height="50"><br>
                        <input type="radio" value="2" name="opcao"> Bom      
                        </div>
                        <div class="span1">
                        </div>
                        <div class="span2">
                         <img src="img/ruim.png" width="130" height="50"><br>
                        <input type="radio" value="3" name="opcao"> Ruim      
                        </div>
                        <div class="span1">
                        </div>
                        <div class="span3">
                            <img src="img/pessimo.png" width="130" height="50"><br>
                        <input type="radio" value="4" name="opcao"> P&eacute;ssimo     <br><br>
                        </div>
                         

                    </div>     
                </div> 
                
                <div class="row-fluid">
                    <div class="span9">


                   </div>
                <div class="span3">

<input type="submit" class="btn btn-mini btn-danger btn-lg  " name="enviar" 
                         value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enviar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
             </form>          

<?php

if($_POST['enviar']){

$idmot = $_POST['motivo'];
$idop = $_POST['opcao'];

$inserir = odbc_exec($con, "insert into avaliacao_hralmoco(idopcoes, idmotivo, data) values($idop, $idmot, getdate())");

if($inserir){
echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Obrigado pela colaboração!\"); </SCRIPT>";
}
else{
echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Houve um erro :( Entrar em contato com o TI!\"); </SCRIPT>";
}

}

?>
                   </div>      
                </div> 


            </div>
           

        </div>

            <br>
            <br><br> <form method="post" action="acompanhe.php">
<img src="img/cozinha.png" width="480" height="30">

 <input type="submit" class="btn btn-mini btn-danger btn-lg  " name="acompanhe" value="Acompanhe">

<img src="img/cozinha.png" width="480" height="30">
</form>


                </div>
            </div>
        </div>

            
       
</div>
</div>

 <!-- 
<footer id="rodape">
<div id = "cpn">
<p> <FONT color="gray"> CPN Alimentos Ltda.<BR>
Rua Antônio, nº 350 – Coelho da Rocha - São João de Meriti - RJ <BR>
CEP 25.550-100 | Telefone/Fax: (21) 2104-0800 <BR></p>
</div>
<div id="rsociais">
<p>  

<a href="http://www.facebook.com/cadorealimentos" target="_blank"><img src="facebook.png" width="40px" height="45px"></a>
<a href="https://twitter.com/MassasCadore" target="_blank"><img src="twitter.png"  width="40px" height="45px"></a>
<a href="http://www.youtube.com/channel/UCAXXZGGCMGqsFvAKYsloyrA" target="_blank"><img src="youtube.png"  width="40px" height="45px"></a>
<a href="http://www.linkedin.com/company/5003145?trk=tyah&trkInfo=tas%3Acadore%20a%2Cidx%3A1-1-1" target="_blank"><img src="linkedin.png" width="40px" height="45px"></a>
<a href="http://www.pinterest.com/cadorealimentos/" target="_blank"><img src="pinterest.png" width="40px" height="45px"></a>
<a href="http://instagram.com/cadorealimentos" target="_blank"><img src="instagram.png" width="40px" height="45px"></a>
</p></div>
</FONT> 
</footer>  --> 

            </div>
        </div>
</div> 

   
        
        <!-- Script para o Google Analytics-->
        <script>
            var _gaq=[['_setAccount','xxxxxxxxxxxxxx'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
