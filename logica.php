<?php
//DEFININDO INPUTS
error_reporting(0);
$ip1 = $_POST['ip1'];
$ip2 = $_POST['ip2'];
$ip3 = $_POST['ip3'];
$ip4 = $_POST['ip4'];
$mascara = $_POST['mascara'];
$ip_completo = $ip1.'.'.$ip2.'.'.$ip3.'.'.$ip4;


//FUNCTION "Quantidade de sub-redes possíveis"
function subredes($mascara){
    $a = -1;
    for ($i='/24'; $i <= $mascara ; $i++) { 
         if($a <= 7) {
            $a++;
            if ($mascara >= $i){
                $resultado = pow(2,$a);
            }
        }
     }
     return $resultado;
}


//FUNCTION "Quantidade de endereços de hosts em cada sub-rede"
function host($mascara){
    $a = 9;
    for ($i='/24'; $i <= $mascara ; $i++) { 
         if($a >= 0)  {
            $a--;
            if ($mascara >= $i){
                $resultado = pow(2,$a) - 2;
            }
        }          
     }
     return $resultado;
}


//FUNCTION "Primeiro endereço de host de cada sub-rede"
function priHost($mascara){
    $um = 1;
    $rede = endereco($mascara);
    $rede_resultado = explode(" - ", $rede, -1);
    $broad = broadcast($mascara);
    $broad_resultado = explode(" - ", $broad, -1);
    $tamanho = sizeof($broad_resultado);

        for ($x=0; $x<=$tamanho; $x++){
            echo $rede_resultado[$x]+$um;
            echo ' - ';
            if($broad_resultado[$x]>=2){
                echo $broad_resultado[$x] - $um . ' / ';
            }else{
                echo 254;
            }
        }
}


//FUNCTION "Máscara da rede, em formato decimal"
function mascaraRede($mascara){
    if($mascara=='/24'){
        return "255.255.255.0";
    }elseif ($mascara=='/25'){
        return "255.255.255.128";
    }elseif ($mascara=='/26'){
        return "255.255.255.192";
    }elseif ($mascara=='/27'){
        return "255.255.255.224";
    }elseif ($mascara=='/28'){
        return "255.255.255.240";
    }elseif ($mascara=='/29'){
        return "255.255.255.248";
    }elseif ($mascara=='/30'){
        return "255.255.255.252";
    }elseif ($mascara=='/31'){
        return "255.255.255.254";
    }elseif ($mascara=='/32'){
        return "255.255.255.255";
    }else{
        return "Não identificado";
    }
}


//FUNCTION "Classe do IP"
function classeIp ($ip1){
    if ($ip1<=127){
        return "Classe A";
    }elseif ($ip1>127 and $ip1<=191){
        return "Classe B";
    }elseif($ip1>191 and $ip1<224){
        return "Classe C";
    }elseif ($ip1>223 and $ip1<240){
        return "Classe D";
    }elseif ($ip1>239 and $ip1<256){
        return "Classe E";
    }else{
        return "Não identificado";
    }
}


//FUNCTION "O IP é publico ou privado:"
function publicoprivado($ip1, $ip2, $ip3, $ip4){

    if ($ip1==10 and $ip2<256 and $ip3<256 and $ip4<256){
        return "Privado";
    }elseif ($ip1==172 and $ip2>15 and $ip2<32 and $ip3<256 and $ip4<256){
        return "Privado";
    }elseif ($ip1==192 and $ip2==168 and $ip3<256 and $ip4<256){
        return "Privado";
    }else{
        return "Público";
    }
}


//FUNCTION Endereços de rede de uma das cada sub-rede:	
function endereco($mascara){
    $host1 = host($mascara);
    $masc = mascaraRede($mascara);
    $a = 0;
    $ret =  ' 0 ';
    for ($i='/24'; $i <= $mascara; $i++) { 
        for ($c=0; $c <= substr($masc, 12,14); $c++) {             
            if ($a <= substr($masc, 12,14)) {
                $a = $a + $host1;
                $ret = $ret." - ". $a;                
            } 
        }
     }
     return $ret;
}


//FUNCTION Endereço de rede em que o IP está localizado:
function descobre_rede($mascara, $ip4) {
    $end_rede = endereco($mascara);
    $tam_rede = host($mascara);
    $format = explode(' - ', $end_rede);
    return $format[$ip4/$tam_rede];
}


//FUNCTION Endereços de broadcast de uma das cada sub-rede:	
function broadcast($mascara){
    $host1 = host($mascara);
    $masc = mascaraRede($mascara);
    $a = 0;
    $lala = 1;
    $resultado = array();
    for ($i='/24'; $i <= $mascara; $i++) { 
        for ($c=0; $c <= substr($masc, 12,14); $c++) {             
            if ($a <= substr($masc, 12,14)) {
                $a = $a + $host1;
                $resultado[$c] = $a - $lala;
            }
        }
     }
    $resultado_implode = implode(" - ", $resultado);
    return $resultado_implode;
}


?>