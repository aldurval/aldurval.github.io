<?PHP
include("funcoes.php");
    session_start();
    if(!(isset($_SESSION['user']))) $_SESSION['user'] = false;
    
    $_SESSION['baixa'] = false;

    if(empty($_SESSION['user'])){
    $_SESSION['direcionar'] = $_SERVER['REQUEST_URI'];
    header("location:login.php");
    }
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
        

       
        <script type='text/javascript' src='js/menu_jquery.js'></script>
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

$idusu=$_SESSION['idusu'];
$mat=$_SESSION['mat'];
$foto=$_SESSION['foto'];

$select="select * from dados where matricula='" . $mat ."'";
$query=odbc_exec($con, $select);
$campos=odbc_fetch_array($query);
$nome=$campos['nome'];

$explode_nome = explode (" ", $nome);
$primeiro_nome=$explode_nome[0];
$segundo_nome=$explode_nome[1];
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
                    <div class="row-fluid">

                <div class="span9">
                
        <div id="fundo-externo">
    <div id="fundo" style='padding-left:35px;'>
        <img src='img/int.png'  width="890" />
    </div>
                 <div class="span2">
                
                </div>
</div>
</div>


<div style="padding-top:130px;">
<div id="site_center">
    <div class="row-fluid">

                <div class="span12">
                </div>
            </div>
    <div class="row-fluid">
                <div class="span12">
      
       </div>  </div>

            <div class="row-fluid">
                <div class="span3 teste" style="padding-left:20px;">
                </html><?php echo"<img  class='imagem_perfil' src='img/".$foto."' width='180px' height='50px'><br>";   ?><html>
               
                </div>
                <div class="span9">
                    
                </div>
                <div class="span1">
                </div>
            </div>
            
            <div class="row-fluid">

                <div class="span12">
                </div>
            </div>
            <div class="row-fluid">

                <div class="span12">
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span9 teste" style="padding-top: 10px; padding-left: 20px;">
                     </html><?php echo"<h3 style='font-family:sans-serif; font-size: 30px; color:white; font-weight: bold;'>".$primeiro_nome." ".$segundo_nome."</h3>";?><html>
                </div>
            </div>            
            <div class="row-fluid">

                <div class="span12">
                </div>
            </div>
            <div class="row-fluid">
              <!-- <!-- BAIXO aqui, temos a barra vertical, o menu e o conteudo da pagina
<table cellspacing="5" width=100%>
<tr >
<td width=20%>
<br><BR><br>
</td>
<td width=100%>-->


                <div class="span9 teste">
               
                        <div class="navbar navbar-inverses">
                            <div class="navbar-inners">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="nav-collapse collapse">
                                            <ul class="nav menu" style="padding-left:220px;">

                                                <li ><a href="interno.html" title="Notícias">Notícias</a>
                                                    </html><?php
                                                    echo " <ul>";               
                                                    $comando = "select * from tipo";

                                                    $roda = odbc_exec($con, $comando);
     
                                                    while ($linha = odbc_fetch_array($roda)){
                                                        $id = $linha['idtipo'];
                                                        $name = $linha['nome'];
                                                        echo    "<li>
                                                                <a href='noticias.php?idtipo=$id&nome_tipo=$name'>".$name."</a>
                                                                </li>";     
                                                    }
                                                    echo "    </ul>";
                                                    ?><html>
                                                </li>
                                                <li><a href="#" title="" rel="nofollow">Votações</a>
                                                    <ul>
                                                        <li><a href='func_mes.php'>Funcionário do Mês</a></li>
                                                        <li><a href='rec_mes.php'>Receita do Mês</a></li>                     
                                                    </ul>
                                                </li>
                                                <li><a href=" href='pesquisar_usuario.php" title="" rel="nofollow">Equipe</a>
                                                    </html><?php
                                                    echo " <ul>";
                                                    $con=$con=conecta();
                                                    $sql = "select * from setor";
                                                    $result = odbc_exec($con, $sql);
                                                    while ($row = odbc_fetch_array($result)){
                                                        $id = $row['idsetor'];
                                                        $name = $row['nome'];
                                                        echo "<li>
                                                                <a href='equipe.php?idsetor=$id&nome_setor=$name'>".$name."</a>
                                                            </li>";                 
                                                    }
                                                    echo "    </ul>";
                                                    ?><html>
                                                </li>
                                                <li><a href="#" title="" rel="nofollow">Serviços</a>
                                                    <ul>
                                                        <li><a href='reservas.php'>Reservas Corporativas</a></li>
                                                        <li><a href='helpdesk.php'>Help Desk</a></li> 
                                                        <li><a href='formularios.php'>Formulários</a></li>                    
                                                    </ul>
                                                </li>
                                                <li><a href="#" title="" rel="nofollow">Convêncios</a></li>
                                                <li><a href="#" title="" rel="nofollow">Mídias</a>
                                                    <ul>
                                                        <li><a href='foto.php'>Fotos</a></li>
                                                        <li><a href='video.php'>Vídeos</a></li>                
                                                    </ul>
                                                </li>     
                                            
                                            </ul>
                                        </div>
                                   </div>
                                </div>
                            </div>
                            <div class="container-fluid" style="padding: 0px;"> 
                                <div class="panel panel-red trans-red">
                                    <div class="panel-body">
                                        <div class='panel-group'>
                       

                        <div class="row-fluid">
                            <div class="span12">
                            <fieldset>
                                <legend>Notícias</legend>
                            </fieldset>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">




<?php

$permirtir="select * from usu where mat='" . $mat ."' and permissoes like '%1%'";
$permitir_exe=odbc_exec($con, $permitir);

$permitido = odbc_num_rows($permitir_exe);




if($_SESSION['user'] == true){
if(($permitido==1)){
?>
<h2>Adicionar Notícia</h2>

<form action='noticias.php' method='POST' enctype="multipart/form-data">


<label for="titulo">Título:</label>
<input type="text" name="titulo" id="titulo" /><br><br>

<label for="arquivo">Imagem:</label>
<input type="file" name="arquivo" /><br><br>


    <label for="setor">Categoria</label>
                 <select name="tipo" id="tipo">
                <BR><BR>
                <?php
    $con=conecta();

    $sql = "SELECT * FROM tipo";

    $result = odbc_exec($con, $sql)
    or die ("Não foi possível construir a combo box. Erro no banco de dados:<br><br>".odbc_error());
          
    while ($row = odbc_fetch_array($result)){
        $id = $row['idtipo'];
        $name = $row['nome'];
        
        echo ("<option value='".$id."'>".$name."</option>");
    }
  
                
                ?>
                
      
                </select>
                <BR><BR>

                


<label for="corpo">Corpo da Notícia</label><br>
<textarea rows="10" cols="50" name="corpo" id="corpo"></textarea> <br><br>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'corpo' );
            </script>

<label for="fonte">Fonte:</label>
<input type="text" name="fonte" id="fonte" /><br><br>


<input type="submit" value="Enviar"/>
</form>



<?php

if ((isset($_POST['titulo'])) and (isset($_POST['corpo'])) ){



if ($_FILES['arquivo']['name'])  {
$foto =  $_FILES['arquivo'];
$nome_imagem=move_img($foto);
unset($_FILES['arquivo']);
}
else {  
$nome_imagem=NULL;}

 
$titulo=$_POST['titulo'];
$corpo=$_POST['corpo'];
$contando=strlen($corpo);
$idtipo=$_POST['tipo'];
$fonte=$_POST['fonte'];
$con=conecta();
                $insert = odbc_exec($con, "insert into noticia ( caracteres, titulo, corpo, img, idusuario, idtipo, quando, fonte) 
                values('" .$contando. "','" .$titulo. "', '" .$corpo. "','".$nome_imagem."','".$_SESSION['idusuario']."','".$idtipo."', getdate(), '".$fonte."' )");
                if($insert) header("location: noticias.php");
                else {
                echo "<br><br>Houve um erro na inserção! ";
                
                }



}



}}


if (!empty($_GET['idtipo'])) {
$idtp=$_GET['idtipo'];
$condicao="where idtipo=$idtp";
} else {
$condicao=" ";
}

//verifica a página atual caso seja informada na URL, senão atribui como 1ª página      
        if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
        }
        else{
        $pagina = 1;
        }
        
    $con=conecta();
 
    //seleciona todos os itens da tabela
        $cmd = "SELECT * FROM noticia $condicao";
        $usuario = odbc_exec($con, $cmd);
   
    //conta o total de itens
        $total = odbc_num_rows($usuario);
   
    //seta a quantidade de itens por página, neste caso, 2 itens
        $registros = 10;
   
    //calcula o número de páginas arredondando o resultado para cima
        $numPaginas = ceil($total/$registros);
   
    //variavel para calcular o início da visualização com base na página atual
        $ini = ($registros*$pagina)-$registros;

        $sql = "SELECT idnoticia, titulo,  img, idtipo, quando, chamada, foto_chamada FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY quando desc) as row FROM noticia $condicao) a WHERE row > $ini and row <= $ini+$registros";

     $resulta = odbc_exec($con, $sql);
     if(odbc_num_rows($resulta)==0) { echo "<BR>Não há noticias cadastradas nessa categoria!";} else {
     
     $conta=0;
     
        while ($row = odbc_fetch_array($resulta)){
        $id = $row['idnoticia'];
        $titulo= $row['titulo'];
        $img=$row['img'];
        $foto_chamada=$row['foto_chamada'];
        $idtipo=$row['idtipo'];
        $quando=$row['quando'];
        $chamada=$row['chamada'];
        $user=$row['idusuario'];
        $conta = $conta +1;

        if ($conta%2!=0) {
             echo "
                        <div class=\"row-fluid\">
                            <div class=\"span6\">
                                    <div class=\"row-fluid\">
                                        <div class=\"span12\">
                                            <h4>";echo $titulo; echo "</h4>

                                        </div>
                                    </div>
                                    <div class=\"row-fluid\">
                                        <div class=\"span12\"> ";
                                            echo "<CENTER><img width=900 height=300 src='img/$foto_chamada'/> </CENTER>";
                                            echo "                                        
                                        </div>
                                        
                                    </div>
                                    <div class=\"row-fluid\">
                                        <div class=\"span12\">";
                                            if($chama!=NULL){echo $chamada;}
                                            echo"
                                            
                                        </div>
                                        
                                    </div>
                                    <div class=\"row-fluid\">
                                        <div class=\"span12\">";
                                       
                                            echo"
                                            <p><a class=\"btn\" href=\"noticias_vermais.php?idnoticia=$id'\" title=\"\">Veja mais &raquo;</a></p>
                                        </div>
                                        <hr>
                                        
                                    </div>
                         
                            
                            </div> 
                        ";
        }else{
                         echo "
                        
                            <div class=\"span6\">
                                    <div class=\"row-fluid\">
                                        <div class=\"span12\">
                                            <h4>";echo $titulo; echo "</h4>
                                        </div>
                                    </div>
                                    <div class=\"row-fluid\">
                                        <div class=\"span12\"> ";
                                            echo "<CENTER><img width=900 height=300 src='img/$foto_chamada'/> </CENTER>";
                                            echo "                                        
                                        </div>
                                        
                                    </div>
                                    <div class=\"row-fluid\">
                                        <div class=\"span12\">";
                                            echo $chamada;
                                            echo"
                                            
                                        </div>
                                        
                                    </div>
                                    <div class=\"row-fluid\">
                                        <div class=\"span12\">";
                                       
                                            echo"
                                            <p><a class=\"btn\" href=\"noticias_vermais.php?idnoticia=$id'\" title=\"\">Veja mais &raquo;</a></p>
                                        </div>
                                        <hr>
                                        
                                    </div>
                         
                            
                            </div>
                        </div>
                            
                        ";
        }
      
       
        
        

}
echo "</div></div>";

if($numPaginas <= 10){
$inicio=1;
$final = $numPaginas;
}
else

if($pagina>=1 && $pagina<10) { 
$inicio=1; $final=10;
$_SESSION['inicio'] = 1;
$_SESSION['final'] = 10;
}
else{

$inicio=$_SESSION['inicio'];
$final=$_SESSION['final'];

if($pagina == $final && $pagina != $numPaginas){
$inicio += 9;
$final += 9; 
$_SESSION['inicio'] +=9;
$_SESSION['final'] +=9;

} else if($pagina == $inicio && $pagina != 1){
$inicio -= 9;
$final -= 9; 
$_SESSION['inicio'] -=9;
$_SESSION['final'] -=9;

}


}

}
echo "<div class=\"row-fluid\">
        <div class=\"span12\"> <center>";

for($y = $inicio; $y <= $final ; $y++){
                        
                    

echo "<a href=\"noticia.php?pagina=$y&idtipo=$idtp\">".$y."</a>"; 
       
if ($y==$numPaginas) { break;}
if($y != $final) echo "- ";
}
echo "</center></div>
    </div>";


?>


                         
                                        </div>
                                    </div>
                                </div>
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

   
        
        <!-- Script para o Google Analytics-->
        <script>
            var _gaq=[['_setAccount','xxxxxxxxxxxxxx'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>