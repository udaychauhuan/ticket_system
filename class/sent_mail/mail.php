<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'credentials.php';

class Php_mailer
{

	protected $rec_mail;
	protected $rec_pass;
	protected $nam;
	public function __construct($email,$password,$name)
	{
		$this->rec_mail = $email;
		$this->rec_pass= $password;
	  	$this->nam = $name;
	}
	public function SendMail()
	{

		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = USERNAME;                     //SMTP username
			$mail->Password   = PASSWORD;                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('FROM-EMAIL@mail.com', 'TicketManagments');
			$mail->addAddress($this->rec_mail, $this->nam);     //Add a recipient
			//$mail->addAddress('ellen@example.com');               //Name is optional
			$mail->addReplyTo('REPLY-TO@mail.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('demo.pdf');         //Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Welcome to Ticket Managment System';
			$mail->Body    = '<html>
		<head>
		  <style type="text/css">
			body
			{
			  background-color: #e4e2e287;
			  text-align: center;
			  color: #58585b;
			}
			.tbl1
			{
			  width: 600px; 
			  padding: 56px 81px; 
			  margin: auto; 
			  margin-top: 22px; 
			  background-color: #fff; 
			}
			</style>
		</head>
		<body>
		  <table border="0" cellpadding="0" cellspacing="0" class="tbl1">
			  <tr style="vertical-align: middle;">
				  <td colspan="2" style="width: 100%;text-align: center">
					  <span style="color:#03386F;font-size:50px;">Ticket management</span>
				  </td>
			  </tr>
			  <tr>
				  <td style="width: 100%; height:36px"></td>
			  </tr>
			
			  <tr style="text-align: center;">
				  <td colspan="2">
					  <span  style="font-size: 35px; font-weight: 100; line-height: 20px; margin: 0px;font-family: helvetica, arial, sans-serif;">welcome </span>
				  </td>
			  </tr>
				<tr>
				  <td style="width: 100%; height:24px"></td>
				</tr>
			  <tr style="text-align: center;">
				  <td colspan="2" style="height:62px; margin:0px;">
						<p style="font-size: 16px; line-height: 20px; margin:0px;">
						  <span style="font-family: helvetica, arial, sans-serif; font-weight: bolder; color:#049fd9;font-size: 21px; font-weight: 100; line-height: 48px; margin: 0px;">Service (24*7) available t&c apply.</span> 
						  <br>  
						  <span  style="font-size: 19px; font-weight: 100; line-height: 30px; margin: 0px;font-family: helvetica, arial, sans-serif; color: #03386F;">your email is : '.$this->rec_mail.'</span><br>
						  <span  style="font-size: 19px; font-weight: 100; line-height: 30px; margin: 0px;font-family: helvetica, arial, sans-serif; color: #03386F;">your password is : '.$this->rec_pass .' </span><br>  
						  <span  style="font-size: 15px; font-weight: 80; line-height: 25px; margin: 0px;font-family: helvetica, arial, sans-serif; color: #03386F;"><p>Don\'t share with any one.</p></span><br>                           
					  </p>
				  </td>
			  </tr>
				<tr>
				  <td style="width: 100%; height:48px"></td>
				</tr>
			   <tr style="text-align: center;">
				  <td colspan="2">
						<p style="font-size: 12px; line-height: 20px; margin: 0px;">
						  <span style="font-family: helvetica, arial, sans-serif;">
							Need help?<a href="https://www.learnvern.com/contact" style="color: #049fd9; text-decoration: none;" rel="noopener noreferrer">&nbsp;Contact support</a>.
						  </span>
						</p>
				  </td>
			  </tr>
			  <tr>
				  <td style="width: 100%; height:48px"></td>
			  </tr>
			
				<tr style="vertical-align: middle;">
				  <td colspan="2">
						<p style="font-size: 11px; color: #7F7F86;font-family: helvetica, arial, sans-serif;line-height: 15px; width:520px; text-align: left;">  Copyright © 2020 LearnVern, Inc. All rights reserved. LearnVern is a training portal where anyone can learn any course in vernacular languages for free. <br> Support Center: +91-8849004643 or email us at info@learnvern.com.
						</p>
				  </td>
			</tr>
			  
		  </table>
		  <div style="margin: auto;width: 680px; background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);height: 0.5vh;">
		  </div>
		</body>
	  </html>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			//echo 'Message has been sent';
			return true;
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			return false;
		}
	}
}

//Create an instance; passing `true` enables exception