<?php
error_reporting(0);
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
//echo priHost('/30');
function ultimoEndHostSubRede($ip1, $ip2, $ip3, $ip4, $mascara){

    if($mascara=='/24'){
        return $ip1.".".$ip2.".".$ip3.".255";
    }elseif ($mascara=='/25'){
        return $ip1.".".$ip2.".".$ip3.".127";
    }elseif ($mascara=='/26'){
        return $ip1.".".$ip2.".".$ip3.".63";
    }elseif ($mascara=='/27'){
        return $ip1.".".$ip2.".".$ip3.".31";
    }elseif ($mascara=='/28'){
        return $ip1.".".$ip2.".".$ip3.".15";
    }elseif ($mascara=='/29'){
        return $ip1.".".$ip2.".".$ip3.".7";
    }elseif ($mascara=='/30'){
        return $ip1.".".$ip2.".".$ip3.".3";
    }elseif ($mascara=='/31'){
        return $ip1.".".$ip2.".".$ip3.".1";
    }elseif ($mascara=='/32'){
        return $ip1.".".$ip2.".".$ip3.".0";
    }else{
        return "Não identificado";
    }
}

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

function publicoprivado($ip1, $ip2, $ip3, $ip4){

    if ($ip1==10 and $ip2<256 and $ip3<256 and $ip4<256){
        return "Privado";
    }elseif ($ip1==172 and $ip2>15 and $ip2<32 and $ip3<256 and $ip4<256){
        return "Privado";
    }elseif ($ip1==192 and $ip2==168 and $ip3<256 and $ip4<256){
        return "Privado";
    }else{
        Return "Público";
    }
}

?>