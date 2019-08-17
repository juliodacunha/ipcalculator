<?php
require ('logica.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="semantic/semantic.min.js"></script><link rel="stylesheet" type="text/css" href="style.css">
    <title>Calculadora IP</title>
</head>
<body>
<article class="fonte">
	<h3>calculadora de IP</h3>
 <form class="centro" action="index.php" method="post">
  IP:	
  <div class="ui input" style="width: 28%;">
  <input type="text" name="ip1" placeholder="0000"  maxlength="4" style="margin: 4px;" >.
  <input type="text" name="ip2" placeholder="0000"  maxlength="4" style="margin: 4px;">.
  <input type="text" name="ip3" placeholder="0000"  maxlength="4" style="margin: 4px;">.
  <input type="text" name="ip4" placeholder="0000"  maxlength="4" style="margin: 4px;">
</div>
 
  Máscara:
  <div class="ui action input">
  <select class="ui compact selection dropdown" style="font-size: 15px; border-radius: 5px;" name="mascara">
      <option value="/24">/24</option>
      <option value="/25">/25</option>
      <option value="/26">/26</option>
      <option value="/27">/27</option>
      <option value="/28">/28</option>
      <option value="/29">/29</option>
	  <option value="/30">/30</option>
	  <option value="/31">/31</option>
	  <option value="/32">/32</option>
  </select>
</div><br>
  <button class="ui yellow button" type="submit" style="margin-top: 8px;">Calcular</button>
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
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo subredes($mascara); ?></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Endereços de rede e Broadcast de uma das cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">fazer função</td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Quantidade de endereços de hosts em cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo host($mascara); ?></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Primeiro endereço de host de cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"> <?php echo priHost($mascara); ?>
</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Último endereço de host de cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">fazer função</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Máscara da rede, em formato decimal:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">fazer função</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Classe do IP:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">fazer função</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 16sPX;">o IP é:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;">fazer função</td>
    </tr>
  </tbody>
</table>
</body>
</html>

     