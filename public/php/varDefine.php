<?
	$name  = (isset($_POST['name'])) ? trim(strip_tags($_POST['name'])) : "";
	$message = (isset($_POST['message'])) ? trim(strip_tags($_POST['message'])) : "";
  $email = (isset($_POST['email'])) ? trim(strip_tags($_POST['email'])) : "";
  $captcha = (isset($_POST['captcha'])) ? trim(strip_tags($_POST['captcha'])) : "";
?>
