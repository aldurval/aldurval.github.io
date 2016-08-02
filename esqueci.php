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
                <div class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </div>
            </div>
            <div class="panel-body">
                <div class='panel-group'>
                       
                    <fieldset>
                        <br>
                        <legend>Recuperando Dados</legend>
                    </fieldset>
       

       <div class="row-fluid">
            <div  class="span4" style="background-color: red; padding-right:1px;">
                <div style="padding:5px;padding-top:40px;background-color: white;">
                 <form method="POST" action="" id="formLogin" name="formLogin">
                    <div class='form-danger'>
                        <label for='lnome'>Nome Completo: <br><label style="float:left; font-size: 11px; color: black;">(Ex: Maria Cristina Silva)</label> </label><br>
                        <input type='text' name='nome' id='nome' class='form-control' value='' autofocus required>
                    </div><br>
                    <div class='form-danger'>
                        <label for="nascimento">Data de Nascimento:</label>
                        <input type="date"  name="nascimento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="1900-01-01" max="2014-02-18" />

                    <br><br>

                    <div class="row-fluid">
                        <div  class="span9" >
                        </div>
                        <div  class="span1" >
                            <input class="btn btn-mini btn-danger btn-lg  pull-right"type="submit" value="&nbsp;&nbsp;&nbsp;Enviar&nbsp;&nbsp;&nbsp;" id="proximo" name="proximo"><br>
                        </div>
                        <div  class="span2" >
                        </div>
                        
                    </div>

                    
                    </div>
                      <br>
                </div>
              
            


        </div>                

                </div>
            </div>     
        </div>
    </div>
</div> 

            <?php 
           if($_POST['proximo']){
            $nome = $_POST['nome'];
            $nascimento = $_POST['nascimento'];


            $con=conecta();
            $select="select id, matricula, nome, nascimento, idsetor from dados where nome='" . $nome ."' and nascimento='" . $nascimento ."'";


            $query=odbc_exec($con, $select);
            
            $resposta = odbc_num_rows($query);
             
            if( $resposta == 1 ){ 
                    $campos=odbc_fetch_array($query);
                    $matricula=$campos['matricula'];

                    $select1="select * from usu where nome='" . $nome ."' and nascimento='" . $nascimento ."'";

                    $teste1=odbc_exec($con, "select * from usu where login='$login'");
                    $teste2=odbc_exec($con, "select * from usu where mat=$matricula");

                    if(odbc_num_rows($teste1)>0){
                        echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Campo Login indisponível! Tente novamente.\") ;";
                        echo "window.location.href=\"cadastro.php\"</SCRIPT>";
                    }
                    else if(odbc_num_rows($teste2)>0){
                        echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Campo Matricula indisponível! Entre em contato com o T.I.\") ;";
                        echo "window.location.href=\"cadastro.php\"</SCRIPT>";
                    }else

                        if($senha==$csenha){
                            $insert="insert into usu (mat, login, senha, foto, status) values(" . $matricula .",'" . $login ."','" . $senha ."', 'who.jpg','ativo')"; 
                            $logando=odbc_exec($con, $insert);
                            echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Cadastro Realizado com Sucesso. \"); ";
                            echo "window.location.href=\"cadastro.php\"</SCRIPT>";
                        }else{
                            echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Senhas diferentes! Tente Novamente\"); ";
                            echo "window.location.href=\"cadastro.php\"</SCRIPT>";
                        }
                    
            }
            else {
                    echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Dados Inválidos!\"); ";
                    //echo "window.location.href=\"cadastro.php\"</SCRIPT>";
                 } 

            }
                

                ?>
        
        <!-- Script para o Google Analytics-->
        <script>
            var _gaq=[['_setAccount','xxxxxxxxxxxxxx'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>



