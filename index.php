<?php
require ('logica.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="semantic/semantic.min.js"></script><link rel="stylesheet" type="text/css" href="style.css">
<script language='javascript'>
    <?php if ($error) { ?>
    window.onload = function() {
        alert('<?php echo $error?>');
    }
    <?php } ?>
</script>
    <title>Calculadora IP</title>
</head>
<body>
<article class="fonte">
	<h3>calculadora de IP</h3>
<form class="centro" action="index.php" method="post">
  IP:	
  <div class="ui input" style="width: 28%;">
  <input type="text" name="ip1" placeholder="000"  maxlength="3" max="256" style="margin: 4px; font-size: 12px;" >.
  <input type="text" name="ip2" placeholder="000"  maxlength="3" max="256" style="margin: 4px; font-size: 12px;">.
  <input type="text" name="ip3" placeholder="000"  maxlength="3" max="256" style="margin: 4px; font-size: 12px;">.
  <input type="text" name="ip4" placeholder="000"  maxlength="3" max="256" style="margin: 4px; font-size: 12px;">
</div>
 
  Máscara:
  <div class="ui action input">
  <select class="ui compact selection dropdown" style="font-size: 12px; border-radius: 5px;" name="mascara">
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
  Resultados do IP
</h4>


<?php
if (filter_var($ip_completo, FILTER_VALIDATE_IP)) {
    echo '<div class="mx-auto"> <p style=" text-align: center;"class="text-center"> Você digitou: '.$ip_completo.$mascara.'</p></p></div>';
} else {
    echo '<div class="mx-auto"> <p style=" text-align: center;"class="text-center">O RESULTADO EXIBIDO PARA O IP '.$ip_completo.$mascara.' É INVÁLIDO!</p></p></div>';
    echo "<head><script>alert('O nome de usuario que você \n Digitou já existe tente outro!');</script></head>";

}
?>



<table class="ui definition table" style=" border-radius: 9px; width: 55%; height: 30%; margin-left: 25%;">
  <tbody>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Quantidade de sub-redes possíveis:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo subredes($mascara); ?></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Endereços de rede de uma das cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo $ip1.".".$ip2.".".$ip3.".".endereco($mascara); ?></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Endereços de broadcast de uma das cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo broadcast($mascara); ?></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Quantidade de endereços de hosts em cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo host($mascara); ?></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Primeiro e último endereço de host de cada sub-rede:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"> <?php echo priHost($mascara); ?>
</td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Máscara da rede, em formato decimal:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo mascaraRede($mascara); ?></td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20PX;">Classe do IP:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo classeIp($ip1); ?></td>
    </tr>
     <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20px;">O IP é:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo publicoprivado($ip1, $ip2, $ip3, $ip4); ?></td>
    </tr>
    <tr>
      <td style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 20px;">O Endereço de rede em que o IP está localizado:</td>
      <td style="font-family: 'Times New Roman'; font-size: 20px;"><?php echo $ip1.".".$ip2.".".$ip3.".".descobre_rede($mascara, $ip4); ?></td>
    </tr>
  </tbody>
 
</table>
</body>
</html>

     