<?php

session_start();

require 'Mail.class.php';
require 'varDefine.php';

//$to = "info@1mhs.pro";
$to = "fiend.jackson@gmail.com";

$theme  = "Заявка с сайта '1mhs.pro'";

if ($_SESSION['secpic'] == $captcha) {

    $objMail = new Mail($to, $theme, $name, $surname, $message, $phone, $email);
    $a = $objMail->sendMail();

} else {
    header("Location: /index.php");
}
?>
