<?PHP
include("funcoes.php");
	session_start();
	if(!(isset($_SESSION['user']))) $_SESSION['user'] = false;
	
	$_SESSION['baixa'] = false;
	
	$direcionar = $_SESSION['direcionar'];
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
</html>
         		<?php 
            $login = $_POST['login'];
			$senha = $_POST['senha'];
			$con=conecta();
			$select="select idusu, login, senha, celular, ramal, mat, foto from usu where login='" . $login ."' and status='ativo'";
			$query=odbc_exec($con, $select);
			
			$resposta = odbc_num_rows($query);
			
			if( $resposta == 1 )
				{   $campos=odbc_fetch_array($query);

					if($campos['senha'] == $senha){
					echo "Logado com sucesso!";
					session_start('user');
					$_SESSION['user'] = true;
					//$_SESSION['clube']=$campos['clube'];
					$_SESSION['idusu'] = $campos['idusu'];
					$_SESSION['login'] = $campos['login'];
					$_SESSION['celular']=$campos['celular'];
					$_SESSION['ramal']=$campos['ramal'];
					$_SESSION['mat']=$campos['mat'];
					$_SESSION['foto']=$campos['foto'];
                    $_SESSION['id_noticia']=0;
					
					if(!empty($direcionar)){
					unset($_SESSION['direcionar']);
					header ("location: $direcionar");
					}
					else{
					header ("location: interno.php"); }
					}
			      

			     ?> <html>
        <div id="fundo-externo">
    <div id="fundo">
        <img src='img/fundo_inde.png' alt="" />
    </div>
</div>



<!-- Submenu
        <div class="container-fluid ">
            
        <div class="navbar navbar-inverses">
            <div class="navbar-inners">
                <div class="container-fluid">
                    
   
                    <div class="nav-collapse collapse">
                        <ul class="nav ">
                            <li ><a href="index.html" title="Página inicial">Home</a></li>
                            <li><a href="#" title="" rel="nofollow">Link 1</a></li>
                            <li><a href="#" title="" rel="nofollow">Link 2</a></li>
                            <li><a href="#" title="" rel="nofollow">Link 3</a></li>
                            <li><a href="#" title="#">Contato</a></li>
                        </ul>
                    </div>
               </div>
           </div></div>       
 -->  <!-- <img class="img_fundo" width='1300' height='200' src='img/fundo_inde.png' alt='temp'/>
      <div class='container-fluid '>
    <div class='row'>
    <!-- Início do container para a classe 'hero-unit' -->          


<div id="site" class='span4 col-lg-4 '>
            <div class="panel panel-red trans-red">
                <div class="panel-heading">
                    <div class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                </div>
                <div class="panel-body">
                    <div class='panel-group'>
                    <form method="POST" action="valida.php" id="formLogin" name="formLogin">
        <fieldset>
            <br>
            <legend>
                Entrar            </legend>
            <div class='form-danger'>
                <label for='login'>Login</label>
                <input type='text' name='login' id='login' class='form-control' value='' autofocus required>
            </div><br>
            <div class='form-danger'>
                <label for='senha'>Senha</label>
                <input type='password' name='senha' id='senha' class='form-control' value='' autofocus required>
                
                <a style="float:left; font-size: 11px; color: black;" href="senha.php">Esqueci meus dados</a><br>
              



            </div><br>

            <br>
        
            <input class="btn btn-mini btn-danger btn-lg  pull-right"type="submit" value="&nbsp;Entrar&nbsp;" id="buttonLogar" name="buttonLogar"><br>
        </fieldset>
         	</html>	<?php 


			        if ($campos['senha'] != $senha){
					echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Senha inválida!\"); ";
					echo "window.location.href=\"index.php\"</SCRIPT>";
					}

			
			}else{
			?> <html>
        <div id="fundo-externo">
    <div id="fundo">
        <img src='img/fundo_inde.png' alt="" />
    </div>
</div>
<div id="site" class='span4 col-lg-4 '>
            <div class="panel panel-red trans-red">
                <div class="panel-heading">
                    <div class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                </div>
                <div class="panel-body">
                    <div class='panel-group'>
                    <form method="POST" action="valida.php" id="formLogin" name="formLogin">
        <fieldset>
            <br>
            <legend>
                Entrar            </legend>
            <div class='form-danger'>
                <label for='login'>Login</label>
                <input type='text' name='login' id='login' class='form-control' value='' autofocus required>
            </div><br>
            <div class='form-danger'>
                <label for='senha'>Senha</label>
                <input type='password' name='senha' id='senha' class='form-control' value='' autofocus required>
                
                <a style="float:left; font-size: 11px; color: black;" href="senha.php">Esqueci meus dados</a><br>
              



            </div><br>

            <br>
        
            <input class="btn btn-mini btn-danger btn-lg  pull-right"type="submit" value="&nbsp;Entrar&nbsp;" id="buttonLogar" name="buttonLogar"><br>
        </fieldset>
         	</html>	<?php
				echo "<script LANGUAGE=\"Javascript\"> window.alert(\"Usuário inválido!\"); ";
				echo "window.location.href=\"index.php\"</SCRIPT>";					
				}

?>
<html>


                    
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
 </div>

          <!-- Administração Funcionário -->


        
		
            </div>
        </div>
        
		<!-- Script para o Google Analytics-->
        <script>
            var _gaq=[['_setAccount','xxxxxxxxxxxxxx'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(documaent,'script'));
        </script>
    </body>
</html>

