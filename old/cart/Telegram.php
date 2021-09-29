<?php

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$name = $_POST['userName'];
$phone = $_POST['userPhone'];

$token = "1076429531:AAFY6BzGfQXp-skRDsbk6T1l4zzBP-uGjT4";
$chat_id = "722210044";
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone
  
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  echo "Работает"
} else {
  echo "Error";
}
?>