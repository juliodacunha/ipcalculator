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
function host ($mascara){
	if ($mascara == '/24') {
		echo '256';
	}elseif ($mascara =='/25') {
		echo '128';
	}elseif ($mascara == '/26') {
		echo '64';
	}elseif ($mascara  == '/27') {
		echo '32';
	}elseif ($mascara =='/28') {
		echo '16';
	}elseif ($mascara == '/29') {
		echo '8';
	}elseif ($mascara  == '/30') {
		echo '4';
	}elseif ($mascara  == '/31') {
		echo '2';
	}elseif ($mascara  == '/32') {
		echo '1';
	}

}

function priHost ($mascara){
	if ($mascara == '/24') {
		echo '0-255';
	}elseif ($mascara =='/25') {
		echo '0-127, 128-255';
	}elseif ($mascara == '/26') {
		echo '0-63, 64-127, 128-191, 192-255';
	}elseif ($mascara  == '/27') {
		echo '0-31, 32-63, 64-95, 96-127, 128-159, 160-191, 192-255';
	}elseif ($mascara =='/28') {
		echo '0-15, 16-31- 32-47, 48-63, 64-79, 80-95, 96-111, 112-127, 128-143, 144-159, 160-175, 176-191, 192-207, 208-223, 224-239, 240-255';
	}elseif ($mascara == '/29') {
		echo '0-7, 8-15, 16-23, 24-31, 32-39, 40-47, 48-55, 56-63, 64-71, 72-79, 80-87, 88-95, 96-103, 104-111, 112-119, 120-127, 128-135, 136-143, 144-151, 152-159, 160-167, 168-175, 176-183, 184-191, 192-199, 200-207, 208-215, 216-223, 224-231, 232-239, 240-247, 248-255';
	}elseif ($mascara  == '/30') {
		echo '0-3, 4-7, 8-11, 12-15, 16-19, 20-23, 24-27, 28-31, 32-35, 36-39, 40-43, 44-47, 48-51, 52-55, 56-59, 60-63, 64-67, 68-71, 72-75, 76-79, 80-83, 84-87, 88-91, 92-95, 96-99, 100-103, 104-107, 108-111, 112-115, 116-119, 120-123, 124-127, 128-131, 132-135, 136-139, 140-143, 144-147, 148-151, 152-155, 156-159, 160-163, 164-167, 168-171, 172-175, 176-179, 180-183, 184-187, 188-191, 192-195, 196-199, 200-203, 204-207, 208-211, 212-215, 216-219, 220-223, 224-227, 228-231, 232-235, 236-239, 240-243, 244-247, 248-251 252-255.';
	}elseif ($mascara  == '/31') {
		echo '2';
	}elseif ($mascara  == '/32') {
		echo '1';
	}

}
echo priHost('/30');
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/semantic.min.js"></script>    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Calculadora IP</title>
</head>
<body>
<article class="fonte">
	<h3>calculadora de IP</h3>
 <form class="centro" action="/">
  IP:	
  <div class="ui input" style="width: 28%;">
  <input type="text" name="ip1" placeholder="0000"  maxlength="4" style="margin: 4px;" >.
  <input type="text" name="ip2" placeholder="0000"  maxlength="4" style="margin: 4px;">.
  <input type="text" name="ip3" placeholder="0000"  maxlength="4" style="margin: 4px;">.
  <input type="text" name="ip4" placeholder="0000"  maxlength="4" style="margin: 4px;">
</div>
 
  Máscara:
  <div class="ui action input">
  <select class="ui compact selection dropdown" style="font-size: 15px; border-radius: 5px;">
    <option name="mascara">/24</option>
	  <option name="mascara">/25</option>
	  <option name="mascara">/26</option>
	  <option name="mascara">/27</option>
	  <option name="mascara">/28</option>
	  <option name="mascara">/29</option>
	  <option name="mascara">/30</option>
	  <option name="mascara">/31</option>
	  <option name="mascara">/32</option>
  </select>
</div><br>
  <button class="ui yellow button" type="submit" style="margin-top: 8px;">Pesquisar</button>
 <input type="submit" value="Enviar" class="fonte">
</form> 
</article>


<h4 class="ui horizontal divider header">
  <i class="bar chart icon"></i>
  Resultados
</h4>
<table class="ui definition table" style=" border-radius: 9px; width: 55%; height: 30%; margin-left: 25%;">
  <tbody>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Quantidade de sub-redes possíveis:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">00000</td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Endereços de rede e Broadcast de uma das cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">00000></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Quantidade de endereços de hosts em cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">00000></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Primeiro endereço de host de cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"> <?php echo priHost('/30') ?>;
</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Último endereço de host de cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">Not Much Usually</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Máscara da rede, em formato decimal:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">Not Much Usually</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Classe do IP:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">Not Much Usually</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 16sPX;">o IP é:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">Not Much Usually</td>
    </tr>
  </tbody>
</table>
</body>
</html>

     