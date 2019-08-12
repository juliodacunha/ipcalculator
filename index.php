<?php

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
  <input type="text" name="ip" placeholder="0000.0000.0000.0000"  maxlength="19">
 
  Máscara:
  <select class="fonte">
	  <option name="24">/24</option>
	  <option name="25">/25</option>
	  <option name="26">/26</option>
	  <option name="27">/27</option>
	  <option name="28">/28</option>
	  <option name="29">/29</option>
	  <option name="30">/30</option>
	  <option name="31">/31</option>
	  <option name="32">/32</option>
 </select><br>
  <input type="submit" value="Enviar" class="fonte">
</form> 
</article>

<section class="resultado">
	<section class="fonteresultado">
	<p>quantidade de sub-redes possíveis: </p>
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

     