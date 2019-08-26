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
    if($mascara >= '/24' and $mascara <='/29'){
    for ($i='/24'; $i <= $mascara ; $i++) { 
         if($a <= 7) {
            $a++;
            if ($mascara >= $i){    
                $resultado = pow(2,$a);
            }
        }
     }
    }elseif ($mascara == '/30') {
        $resultado = pow(2, 6);
    }elseif ($mascara == '/31') {
        $resultado = pow(2, 7);
    }elseif ($mascara == '/32') {
        $resultado = pow(2, 8);
    }
     return $resultado;
}


//FUNCTION "Quantidade de endereços de hosts em cada sub-rede"
function host($mascara){
    $a = 9;
    if($mascara >= '/24' and $mascara <='/29'){
    for ($i='/24'; $i <= $mascara ; $i++) { 
         if($a >= 0)  {
            $a--;
            if ($mascara >= $i){
                $resultado = pow(2,$a) - 2;
            }
        }          
     }
    }elseif ($mascara == '/30') {
        $resultado = pow(2, 2);
    }elseif ($mascara == '/31') {
        $resultado = pow(2, 1);
    }elseif ($mascara == '/32') {
        $resultado = pow(2, 0);
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
    if($mascara >= '/24' and $mascara <='/29'){
        for ($x=0; $x<=$tamanho; $x++){
            echo $rede_resultado[$x]+$um;
            echo ' - ';
            if($broad_resultado[$x]>=2){
                echo $broad_resultado[$x] - $um . ' / ';
            }else{
                echo '254';
            }
        }
    }elseif ($mascara == '/30') {

    }elseif ($mascara == '/31') {
         return 'Não vai ter host.';
    }elseif ($mascara == '/32') {
         
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
    if($mascara >= '/24' and $mascara <='/29'){
    for ($i='/24'; $i <= $mascara; $i++) { 
        for ($c=0; $c <= substr($masc, 12,14); $c++) {             
            if ($a <= substr($masc, 12,14)) {
                $a = $a + $host1;
                $ret = $ret." - ". $a;                
            }
        }
     }
    }elseif ($mascara == '/30') {
        $ret = '0 - 4 - 8 - 12 - 16 - 20 - 24 - 28 - 32 - 36 - 40 - 44 - 48 - 52 - 56 - 60 - 64 - 68 - 72 - 76 - 80 - 84 - 88 - 92 - 96 - 100 - 104 - 108 - 112 - 116 - 120 - 124 - 128 - 132 - 136 - 140 - 144 - 148 - 152 - 156 - 160 - 164 - 168 - 172 - 176 - 180 - 184 - 188 - 192 - 196 - 200 - 204 - 208 - 212 - 216 - 220 - 224 - 228 - 232 - 236 - 240 - 244 - 248 - 252';
    }elseif ($mascara == '/31') {
        $ret = '0 - 2 - 4 - 8 - 10 - 12 - 14 - 16 - 18 - 20 - 22 - 24 - 26 - 28 - 30 - 32 - 34 - 36 - 38 - 40 - 42 - 44 - 46 - 48 - 50 - 52 - 54 - 56 - 58 - 60 - 62 - 64 - 66 - 68 - 70 - 72 - 74 - 76 - 78 - 80 - 82 - 84 - 86 - 88 - 90 - 92 - 94 - 96 - 98 - 100 - 102 - 104 - 106 - 108 - 110 - 112 - 118 - 120 - 122 - 124 - 126 - 128 - 130 - 132 - 134 - 136 - 138 - 140 - 142 - 144 - 146 - 148 - 150 - 152 - 154 - 156 - 158 - 160 - 162 - 164 - 166 - 168 - 170 - 172 - 174 - 176 - 178 - 180 - 182 - 184 - 186 - 188 - 190 - 192 - 194 - 196 - 198 - 200 - 202 - 204 - 208 - 210 - 212 - 214 - 216 - 218 - 220 - 222 - 224 - 226 - 228 - 230 - 232 - 234 - 236 - 238 - 240 - 242 - 244 - 246 - 248 - 250 - 252 - 254';
    }elseif ($mascara == '/32') {
        $ret = 'Não possui endereço de rede.'; 
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
    if($mascara >= '/24' and $mascara <='/29'){
    for ($i='/24'; $i <= $mascara; $i++) { 
        for ($c=0; $c <= substr($masc, 12,14); $c++) {             
            if ($a <= substr($masc, 12,14)) {
                $a = $a + $host1;
                $resultado[$c] = $a - $lala;
            }
        }
     }
    }elseif ($mascara == '/30') {
        return '3 - 7 - 11 - 15 - 19 - 23 - 27 - 31 - 35 - 39 - 43 - 47 - 51 - 55 - 59 - 63 - 67 - 71 - 75 - 79 - 83 - 87 - 91 - 95 - 99 - 103 - 107 - 111 - 115 - 119 - 123 - 127 - 131 - 135 - 139 - 143 - 147 - 151 - 155 - 159 - 163 - 167 - 171 - 175 - 179 - 183 - 187 - 191 - 195 - 199 - 203 - 207 - 211 - 215 - 219 - 223 - 227 - 231 - 235 - 239 - 243 - 247 - 251 - 255'; 
    }elseif ($mascara == '/31') {
        for($x=1; $x<=255;$x=$x+2){
            $resultado[$x] = $x;
         }
    }elseif ($mascara == '/32') {
        return 'Não possui endereço de broadcast.'; 
    }
    $resultado_implode = implode(" - ", $resultado);
    return $resultado_implode;
}


?>

