<?php
//DEFININDO INPUTS
error_reporting(0);
$ip1 = $_POST['ip1'];
$ip2 = $_POST['ip2'];
$ip3 = $_POST['ip3'];
$ip4 = $_POST['ip4'];
$mascara = $_POST['mascara'];

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
                $resultado = pow(2,$a);        
            }
        }          
     }
     return $resultado;
}


//FUNCTION "Primeiro endereço de host de cada sub-rede"
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
    for ($i='/24'; $i <= $mascara; $i++) { 
        for ($c=0; $c <= substr($masc, 12,14); $c++) {             
            if ($a <= substr($masc, 12,14)) {
                $a = $a + $host1;
                $resultado = $a - $lala;
                echo $resultado. " - ";
            }    
        }
     }
}


?>