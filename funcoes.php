
<?php
ini_set('display_errors', 0 );
error_reporting(0);

function odbc_insert_id()
{
$con=conecta();
$result = odbc_exec($con, "select @@identity");
$id = odbc_result($result, 1);
return $id;
}

function sessao () {

	$_SESSION['idusuario'] = $campos['idusuario'];
					$_SESSION['email'] = $campos['email'];
					$_SESSION['login'] = $campos['login'];
					$_SESSION['nome']=$campos['nome'];
					$_SESSION['senha']=$campos['senha'];
					$_SESSION['celular']=$campos['celular'];
					$_SESSION['idsetor']=$campos['idsetor'];
					$_SESSION['data_nasc']=$campos['datanasc'];
					$_SESSION['matricula']=$campos['matricula'];
					$_SESSION['ramal']=$campos['ramal'];
					$_SESSION['foto']=$campos['foto'];
				

}

function move_excel ($arquivo) {
			
			preg_match("/\.(csv){1}$/i", $arquivo["name"], $ext);
					
        	$nome_excel = md5(uniqid(time())) . "." . $ext[1];
        	
			$caminho_excel = "planilhas/".$nome_excel;
            
			move_uploaded_file($arquivo["tmp_name"], $caminho_excel);

			return $nome_excel;
}

function move_video ($arquivo) {
			
			preg_match("/\.(webm|mp4){1}$/i", $arquivo["name"], $ext);
					
        	$nome_video = md5(uniqid(time())) . "." . $ext[1];
        	
			$caminho_video = "videos/".$nome_video;
            
			move_uploaded_file($arquivo["tmp_name"], $caminho_video);

			return $nome_video;
}

function move_img ($foto) {
			
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	// Gera um nome único para a imagem
			$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/".$nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem); 
			return $nome_imagem;
}

function conecta () {

$con = odbc_connect("DRIVER={SQL Server}; SERVER=192.168.0.108; 
DATABASE=INTRANET;", "usr_intranet" , "intracadore");
return $con;
}

function menu () {
echo "<ul >";

echo "<li><a href='empresa.php'>A empresa</a></li>";
if($_SESSION['user'] == true){
echo "<li><a href='pesquisar_usuario.php'>Equipe</a>";
	           echo " <ul>";
			
			$con=$con=conecta();
			   
      $sql = "select * from setor";

     $result = odbc_exec($con, $sql);
     
    while ($row = odbc_fetch_array($result)){
       	$id = $row['idsetor'];
        $name = $row['nome'];
        echo	"<li><a href='equipe.php?idsetor=$id&nome_setor=$name'>".$name."</a></li>";				    
    }
	
			
					  
            echo "    </ul></li>";
echo "<li><a>Servi&ccedil;os</a>
	            <ul>
                      <li><a href='reservas.php'>Reservas Corporativas</a></li>
                       
                      <li><a href='helpdesk.php'>Help Desk</a></li> 
					<li><a href='formularios.php'>Formulários</a></li> 					  
                </ul></li>
<li><a href='convenios.php'>Conv&ecirc;nios</a></li>
<li><a href='receitas.php'>Receitas</a>
<ul>
<li><a href='receitas.php?idcategoria=1'>Pratos Principais</a> </li>
<li><a href='receitas.php?idcategoria=2'>Lanches</a></li>
<li><a href='receitas.php?idcategoria=3'>Doces</a> </li>

</ul>
</li>
<li><a href='mural.php'>Mural</a></li>
 <!-- <li><a href='clube.php'>Clube do Livro</a></li> -->
<li><a href='noticias.php'>Not&iacute;cias</a>
<ul >";

$con=conecta();
			   
      $comando = "select * from tipo";

     $roda = odbc_exec($con, $comando);
     
    while ($linha = odbc_fetch_array($roda)){
       	$id = $linha['idtipo'];
        $name = $linha['nome'];
		
		
		
        echo	"<li><a href='noticias.php?idtipo=$id&nome_tipo=$name'>".$name."</a></li>";		
		
		
        
    }

echo "</ul></li>";

echo "<li><a href=''>Mídia</a>

<ul >

<li><a href='inicial_albuns.php'>Imagens</a></li>

<li><a href='videos.php'>Videos</a></li>

</ul>

</li>";

$dia = date(d);
$mes = date(m);
$query = odbc_exec($con, "select data_nasc from usuario where idusuario='".$_SESSION['idusuario']."'");



while ($day=odbc_fetch_array($query)){
       	$date = $day['data_nasc'];
		
		$array=parse($date);
		$dia_niver=$array['day'];
        $mes_niver=$array['month'];
		}
$query = odbc_exec($con, "select * from parabenizacao where idparabenizado='".$_SESSION['idusuario']."' and year(data)=year(getdate())");
$quant=odbc_num_rows($query);

		
				echo '<li><a href="meuperfil.php" title="Meu Cadastro">Meu Cadastro</a></li>';
				echo '<li><a href="seguranca_trab.php" title="Seguranca do Trabalho">Segurança do Trabalho</a></li>';
				IF ($dia_niver<=$dia and $mes_niver==$mes) {
				echo '<li><a href="parabenizacao.php" title="Parabenizações ($quant)">Parabéns ('.$quant.')</a></li>';}
				echo '<li><a href="destroi.php" title="Sair">Sair</a>';
				
				
				} else { 
				echo '<li><a href="cadastro.php" title="Cadastro">Cadastro</a></li>';
				echo '<li><a href="fale_conosco.php" title="Fale Conosco">Fale Conosco</a></li>';
				echo '<li><a href="almoco.php">Almoço</a></li>';
				echo '<li><a href="login.php" title=>Login</a></li>'; }
			
			

echo "</ul>";
}

function parse($date) {
list($year, $month, $day) = split('-', $date);
return array('year'=>$year, 'month'=>$month, 'day'=>$day);
}

function barra_empresa() {
echo "
<div id='cssmenu'> <!-- começa barra-->



<ul>
   <li class='active'><a href='empresa.php'><span>Empresa</span></a></li>

   <li ><a href='visao.php'><span>Visão</span></a></li>
   <li ><a href='missao.php'><span>Missão</span></a></li>
   
      <li ><a href='valores.php'><span>Valores</span></a></li>
   <li ><a href='politica.php'><span>Política de Qualidade</span></a></li>
   
   <li><a href='historico.php'><span>Histórico</span></a></li>   
   
</ul>



</div> <!-- fim barra-->";

}

function avaliando($idhelpdesk) {

echo "<form id='formAvaliar' name='formAvaliar' method='POST' action='avaliar.php'>";
echo "<input type='hidden' name='helpdesk' value='$idhelpdesk' />"; 

echo	"<label for='avaliacao'></label>
				 <select name='avaliacao' id='avaliacao'>
				<BR><BR>";
	 $con=conecta();
    
    $sql = "SELECT * FROM avaliacao where idavaliacao=1 or idavaliacao=2 or idavaliacao=3;";

    $consulta_status = odbc_exec($con, $sql)
    or die ("Não foi possível construir a combo box. Erro no banco de dados:<br><br>".odbc_error());
          
    while ($row = odbc_fetch_array($consulta_status)){
       	$id = $row['idavaliacao'];
        $name = $row['nome'];
        
        echo ("<option value='".$id."'>".$name."</option>");
		
    }
  
			
				
      
            echo "    </select>
				
				<br><br><textarea placeholder='Justifique sua avaliação!' name=comentario></textarea><br><br>
				     
     <input type='SUBMIT' value='Avaliar' id='buttonMudar' name='buttonMudar'>
	 
	 
	</form><BR><BR>";



}


function responder($idsolicitacao, $idlivro) {

echo "<form id='formResponder' name='formResponder' method='POST' action='responder.php'>";
echo "<input type='hidden' name='solicitacao' value='$idsolicitacao' />"; 
echo "<input type='hidden' name='idlivro' value='$idlivro' />"; 
echo	"<label for='resposta'></label>
				 <select name='resposta' id='resposta'>
				<BR><BR>";
	 $con=conecta();
    
    $sql = "SELECT * FROM resposta where idresposta!=3;";

    $consulta_status = odbc_exec($con, $sql)
    or die ("Não foi possível construir a combo box. Erro no banco de dados:<br><br>".odbc_error());
          
    while ($row = odbc_fetch_array($consulta_status)){
       	$id = $row['idresposta'];
        $name = $row['nome'];
        
        echo ("<option value='".$id."'>".$name."</option>");
		
    }
  
            echo "    </select>
				
				
				     
     <input type='SUBMIT' value='Responder' id='buttonMudar' name='buttonMudar'>
	 
	 
	</form>";

	

}



?>

