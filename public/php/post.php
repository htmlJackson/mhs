<?php

session_start();

require 'Mail.class.php';
require 'varDefine.php';

$to = "info@clubtandem.ru";

$theme  = "Заявка с сайта 'Эксперт-клуб Тандем'";

if ($_SESSION['secpic'] == $captcha) {
    $objMail = new Mail($to, $theme, $name, $surname, $message, $phone, $email);
    $objMail->sendMail();
} else {
    header("Location: /captcha.html");
}
?>
