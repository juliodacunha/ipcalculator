<?php
$ip1 = $_POST['ip1'];
$ip2 = $_POST['ip2'];
$ip3 = $_POST['ip3'];
$ip4 = $_POST['ip4'];
$mascara = $_POST['mascara'];

function subredes($mascara){

	if ($mascara == '/24') {
		echo '1';
	}elseif ($mascara =='/25') {
		echo '2';
	}elseif ($mascara == '/26') {
		echo '4';
	}elseif ($mascara  == '/27') {
		echo '8';
	}elseif ($mascara =='/28') {
		echo '16';
	}elseif ($mascara == '/29') {
		echo '32';
	}elseif ($mascara  == '/30') {
		echo '64';
	}elseif ($mascara  == '/31') {
		echo '128';
	}elseif ($mascara  == '/32') {
		echo '256';
	}
}
//teste function
//echo subredes('/25');

?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Calculadora IP</title>
</head>
<body>
<article class="fonte">
	<h3>calculadora de IP</h3>
 <form class="centro" action="/">
  IP:	
  <input type="text" name="ip1" placeholder="0000"  maxlength="4" >.
  <input type="text" name="ip2" placeholder="0000"  maxlength="4">.
  <input type="text" name="ip3" placeholder="0000"  maxlength="4">.
  <input type="text" name="ip4" placeholder="0000"  maxlength="4">

 
  Máscara:
  <select class="fonte">
	  <option name="mascara">/24</option>
	  <option name="mascara">/25</option>
	  <option name="mascara">/26</option>
	  <option name="mascara">/27</option>
	  <option name="mascara">/28</option>
	  <option name="mascara">/29</option>
	  <option name="mascara">/30</option>
	  <option name="mascara">/31</option>
	  <option name="mascara">/32</option>
 </select><br>
  <input type="submit" value="Enviar" class="fonte">
</form> 
</article>


<section class="resultado">
	<section class="fonteresultado">
	<p>quantidade de sub-redes possíveis: <?php echo subredes($mascara); ?> </p> 
	<p>endereços de rede e broadcast de uma das cada sub-rede:</p>
	<p>quantidade de endereços de hosts em cada sub-rede: </p>
	<p>primeiro endereço de host de cada sub-rede: </p>
	<p>último endereço de host de cada sub-rede: </p>
	<p>máscara da rede, em formato decimal: </p>
	<p>classe do IP: </p>
	<p>o IP é: </p>
</section>
</section>
</body>
</html>

     