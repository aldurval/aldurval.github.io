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
            <div class="panel panel-red trans-red">
                <div class="panel-body">
                    <div class='panel-group'>
                        <form action="">

                <fieldset><br><legend>A Empresa</legend> </fieldset>
                <div class="row-fluid">
                    <div class="span6">
                        <div ><center><IMG src='img/empresaf.png'  ></center></div><br>
                        <br><p>Combinando tradi&ccedil;&atilde;o e tecnologia, a Cadore* produz alimentos com elevado padr&atilde;o de qualidade e busca constantemente a satisfa&ccedil;&atilde;o do cliente. Foi fundada em 1945, no Rio de Janeiro, por imigrantes italianos rec&eacute;m-chegados ao Brasil, que trouxeram do seu pa&iacute;s de origem todo o conhecimento na produ&ccedil;&atilde;o de massas aliment&iacute;cias.</p>
                        <br><p>Inicialmente com uma pequena f&aacute;brica de macarr&atilde;o totalmente artesanal, hoje a Cadore &eacute; uma ind&uacute;stria moderna que se destaca entre as empresas l&iacute;deres no setor de massas no estado do Rio de Janeiro. Al&eacute;m disso, vem ampliando seu portif&oacute;lio, oferecendo tamb&eacute;m biscoitos e farinha de trigo.</p>
                        <br><p>Localizada em um complexo industrial de 60 mil m&sup2;, em S&atilde;o Jo&atilde;o de Meriti, Rio de Janeiro, atende pequeno varejo, grandes mercados, hipermercados, food service e &oacute;rg&atilde;os institucionais. Tamb&eacute;m mant&eacute;m parceria com diversas ind&uacute;strias, atacadistas e hipermercados com produ&ccedil;&atilde;o de marcas pr&oacute;prias.</p>
                  
                    <br><br>
                    <p><i>* O nome Cadore refere-se ao Vale Di Cadore, na It&aacute;lia. Foi escolhido pela beleza desta regi&atilde;o.</i></p>
                    </div>
                    
                    <div class="span6">
                        <div class="imagem"><center><IMG src='img/empresa.jpg'></center></div>
                    </div>
                </div>
                

                <br><br>
                <div class="row-fluid">
                    <div class="span6">
                        <fieldset><br><legend>Visão</legend></fieldset> 
                        <p> Ser refer&ecirc;ncia em crescimento sustent&aacute;vel atuando em todo o estado do Rio de Janeiro at&eacute; 2014.</p>
                        <img src="img/crescer.jpg" width="500" height="300">
                    </div>

                    <div class="span6">
                        <fieldset><br><legend>Missão</legend></fieldset> 
                    
                       <p>Oferecer amplo mix de produtos que satisfa&ccedil;am aos diversos paladares com tradi&ccedil;&atilde;o, alto n&iacute;vel de servi&ccedil;o e qualidade.</p>
                       <br><img src="img/bonequinhos.jpg" width="500" height="300">
                    </div>
                 </div>


                <br><br>
                <div class="row-fluid">
                    <div class="span6">
                        <fieldset><br><legend>Missão</legend></fieldset> 
                        <div class="row-fluid">
                        <div class="span5">
                            <p>* Saudabilidade<br>
                           * Valorização do colaborador<br>
                           * Sustentabilidade<br>
                           * Ética<br>
                           * Tradição<br>
                           * Investimento em tecnologia<br></p>
<br><br>                    </div>
                            <div class="span6">
                        <img src="img/alvo.jpg" width="500" height="300">
                            </div>
                            <div class="span1">
                            </div>   
                </div>
                        </div>
                    <div class="span6">
                        <fieldset><br><legend>Política de Qualidade</legend></fieldset> 
                        <div class="row-fluid">
                        <div class="span6">
                        <p> Fornecer produtos e serviços que satisfaçam as expectativas e necessidades de clientes/consumidores, atendendo os requisitos legais pertinentes e promovendo a melhoria contínua do Sistema de Gestão da Qualidade.
</p>
                        </div>
                        <div class="span6">
                        <img src="img/qualidade.jpg" width="500" height="300">
                        </div>
                    </div>
                </div>

                <br><br>
                <div class="row-fluid">
                    <div class="span12">
                        <fieldset><br><legend>Histórico</legend></fieldset> 
                        <img src="img/hist.jpg" width="1200" >
                    </div>

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
</FONT>--> 
</footer>

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
