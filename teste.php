<?php
//Endereços de rede e Broadcast de uma das cada sub-rede:	

//$eae = 'eu sou programador';
//echo substr($eae, 4, 7);

$mascara = 26;
$host = 64;
$masc = '255.255.255.192';
$a = 0;
$ip1 = 124;
$ip2 = 49;
$ip3 = 19;

for ($i=24; $i <= $mascara; $i++) { 
    if ($a < substr($masc, 12,14)) {
        $a = $a + $host;
        echo $ip1.".".$ip2.".".$ip3.".".$a . "\n";
    } 
 }
 
?>


//FUNCTION Endereços de rede e Broadcast de uma das cada sub-rede:	
function endereco($mascara){
    $host1 = host($mascara);
    $masc = mascaraRede($mascara);
    $a = 0;
    $lala = 1;
    for ($i='/24'; $i <= $mascara; $i++) { 
        for ($c=0; $c <= substr($masc, 12,14); $c++) {             
            if ($a <= substr($masc, 12,14)) {
                $a = $a + $host1;
                $resultado = $a - $lala;
                echo $resultado;
            }    
        }
     }
}