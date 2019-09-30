<?

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

	class Mail
	{
		public $to, $theme, $name, $surname, $message, $phone, $email, $emailmess;
		public $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";

		function __construct($to, $theme, $name, $surname, $message, $phone, $email)
		{
			$this->to = $to;
			$this->theme = $theme;
			$this->name = $name;
			$this->surname = $surname;
			$this->message = $message;
			$this->phone = $phone;
			$this->email = $email;
			$this->emailmess = "<table>";
			if(!empty($this->name)){
				$this->emailmess .= "<tr><td style='border:1px solid;padding:6px;'>Имя: </td><td style='border:1px solid;padding:6px;'>".$this->name."</td></tr>";
			}
			if(!empty($this->surname)){
				$this->emailmess .= "<tr><td style='border:1px solid;padding:6px;'>Фамилия: </td><td style='border:1px solid;padding:6px;'>".$this->surname."</td></tr>";
			}
			if(!empty($this->message)){
				$this->emailmess .= "<tr><td style='border:1px solid;padding:6px;'>Сообщение: </td><td style='border:1px solid;padding:6px;'>".$this->message."</td></tr>";
			}
			if(!empty($this->phone)){
				$this->emailmess .= "<tr><td style='border:1px solid;padding:6px;'>Телефон: </td><td style='border:1px solid;padding:6px;'>".$this->phone."</td></tr>";
			}
			if(!empty($this->email)){
				$this->emailmess .= "<tr><td style='border:1px solid;padding:6px;'>Email: </td><td style='border:1px solid;padding:6px;'>".$this->email."</td></tr>";
			}
			$this->emailmess .= "</table>";
		}


		function sendMail()
		{
			if (isset($_POST['name']) && !empty($this->name))
                        {
                                $this->_send($this->to, $this->emailmess);
				//mail($this->to, $this->theme, $this->emailmess, $this->headers);
				header('Location: /index.php');
			}
			else
			{
				header("Location: /index.php");
			}
                }


                function _send($to, $body) {

		    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

		    try {
			//Server settings
			$mail->CharSet = 'UTF-8';
			$mail->SMTPDebug = 0;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'info@clubtandem.ru';                 // SMTP username
			$mail->Password = 'klub.tandem';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('info@clubtandem.ru', 'Mailer');
			$mail->addAddress($to);               // Name is optional

			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Заявка с сайта clubtandem.ru';
			$mail->Body    = $body;

			$mail->send();

		    } catch (Exception $e) {
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
		    }

                }

	}
?>
