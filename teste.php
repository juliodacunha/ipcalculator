<?php
$mascara = 26;
$a = -1;


for ($i=24; $i <= $mascara ; $i++) { 
     if($a <= 7) {
        $a++;
        if ($mascara >= $i){
            $resultado = pow(2,$a);
         
        }
    }
         

 }

 echo $resultado."\n";
?>
