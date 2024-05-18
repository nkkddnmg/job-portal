<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("$_SERVER[DOCUMENT_ROOT]/job-portal/vendor/PHPMailer/vendor/autoload.php");
class SendEmail
{
  private $host = "smtp.gmail.com";
  private $userName = "email.jobportal.west@gmail.com";
  private $password = "ndrs dzpv hflc vrbn";
  public $response = array("success" => false, "message" => "");

  function __construct($emailTo, $body, $name, $subject)
  {
    $mail = new PHPMailer();

    try {
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = $this->host;
      $mail->SMTPAuth = true;
      $mail->Username = $this->userName;
      $mail->Password = $this->password;
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;

      $mail->setFrom('email.jobportal.west@gmail.com', 'Job Portal');
      $mail->addAddress($emailTo, $name);
      $mail->addReplyTo('no-reply@jobportal.com');

      //   $mail->addAddress('designs@primeenergysolar.com', 'Prime Design');
      //   $mail->addAddress('dybarra@primeenergysolar.com', 'David Ibarra');
      //   $mail->addAddress('rolandmiranda@primeenergysolar.com', 'Roland Miranda');
      //   $mail->addAddress('lklein@primeenergysolar.com', 'Lhiz Klein');
      //   $mail->addReplyTo('designs@primeenergysolar.com');

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $body;

      if ($mail->send()) {
        $this->response["success"] = true;
      } else {
        $this->response["success"] = false;
        $this->response["message"] = "Internal Server Error!";
      }
    } catch (Exception $e) {
      $this->response["success"] = false;
      $this->response["message"] = $e->getMessage();
    }

    return $this->response;
  }
}
