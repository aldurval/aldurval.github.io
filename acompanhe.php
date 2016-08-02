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
                       
           <div class="row-fluid">
            <div class="span12">
               
                    <fieldset>
                        <br>
                        <legend>Como está o nosso Almoço?</legend>
                    </fieldset>
                </div><br>
            </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span4">

                    <form method="post" action="acompanhe.php">
                    Motivo:   <select name="motivo">
<?php

$buscando = odbc_exec($con, "select * from motivo");

while($linha = odbc_fetch_array($buscando)){

$idmotivo = $linha['idmotivo'];
$descricao = $linha['descricao'];

echo "<option value=\"$idmotivo\">$descricao</option>";

}

?>

</select>           
                        </div>
                        <div class="span4">

Mês: <select name='mes'>
<?php

$month=date("m");
$meses = odbc_exec($con, "select count(idaa) as num_votos, MONTH(data) as mes, year(data) as ano from avaliacao_hralmoco group by month(data), year(data)");

while($mes_vot = odbc_fetch_array($meses)){

$m = $mes_vot['mes'];
$a = $mes_vot['ano'];

$par = "$m-$a";

$sql=odbc_exec($con, "Select * from mes where num = $m");
while($row=odbc_fetch_array($sql)) { 
if ($row['num'] > $month) {break;} 

?>
<option value=<?php echo $par; ?>> <?php echo $row['nome']." - ".$a; ?> </option>
<?php }} ?>
<option value="geral">Geral</option>
</select>
                                </div>
                        <div class="span4">
  <input type="submit" class="btn btn-mini btn-danger btn-lg " name="pesq" value="Pesquisar">
               </form></div>
                     </div>
                 </div> <br> <br> <br>

                    
                   
<?php
           

echo "<div class=\"row-fluid\">";
echo "<div class=\"span12\">";
$data_op = $_POST['mes'];
$motivu = $_POST['motivo'];

if($data_op != 'geral'){
$opcao = explode('-', $data_op);
$mes_op = $opcao[0];
$ano_op = $opcao[1];
}

if(($motivu==10 || empty($motivu)) && ($data_op=='geral' || empty($data_op))){

$condicao = " ";
}
else if(($motivu!=10 || !empty($motivu)) && $data_op=='geral'){
$bla = odbc_exec($con, "select * from motivo where idmotivo = $motivu");
while($linha = odbc_fetch_array($bla)){
$motivo = $linha['descricao'];
}
echo "<h3>$motivo</h3><br><br>";
$condicao = "where idmotivo = $motivu";
}
else if(($motivu==10 || empty($motivu)) && $data_op!='geral'){

echo "<h3>Geral - $data_op</h3><br><br>";
$condicao = "where month(data) = '$mes_op' and year(data)='$ano_op'";
}
else{
$bla = odbc_exec($con, "select * from motivo where idmotivo = $motivu");
while($linha = odbc_fetch_array($bla)){
$motivo = $linha['descricao'];
}
echo "<h3>$motivo - $data_op</h3><br><br>";
$condicao = "where idmotivo = $motivu and month(data) = '$mes_op' and year(data)='$ano_op'";
}

$select = odbc_exec($con, "select COUNT(idaa) as votos, idopcoes from avaliacao_hralmoco $condicao group by idopcoes");
$select_total= odbc_exec($con, "select * from avaliacao_hralmoco $condicao");
$total= odbc_num_rows($select_total);

echo "<div id=\"opcoes_r\">";

while($one=odbc_fetch_array($select)) { 
$idopcao=$one['idopcoes'];
$num_votos=$one['votos'];

$select_op= odbc_exec($con, "select * from opcoes where idopcoes=$idopcao");

while ($ops=odbc_fetch_array($select_op)) {
$descricao=$ops['descricao'];
$arquivo=$ops['arquivo'];
$idopcao_r=$ops['idopcoes'];

if($idopcao_r == $idopcao){
$pcnt_grande = ($num_votos*100)/$total;
$pcnt = number_format($pcnt_grande, 2);

echo "<div class=\"span3\">";
echo "<img src=\"img/$arquivo\" width=\"130px\" height=\"50px\"><br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;$descricao <br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;$pcnt% ";

echo "</div>";
}
}
}
echo " </div>";
echo "</div> ";
?>
                <div class="row-fluid">
                   <div class="span12">
<br> <br> <br> <br> <br> 

               </div>    
                </div> 
                
<img src="img/cozinha.png" width="480" height="30">

<img src="img/cozinha.png" width="480" height="30">
<img src="img/cozinha2.png" width="130" height="20">
 
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
