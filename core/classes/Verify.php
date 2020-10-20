<?php 
	class Verify{
		protected $db;

        public function __construct() {            
         	$this->db =  Database::instance();
   		}

		public function generateLink(){
			return str_shuffle(substr(md5(time().mt_rand().time()), 0, 25));
		}

        public function sendToMail($email, $message){
			$mail  = new PHPMailer\PHPMailer\PHPMailer(true);
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPDebug = 0;
			$mail->Host = M_HOST;
			$mail->Username = M_USERNAME;
			$mail->Password = M_PASSWORD;
			$mail->SMTPSecure = M_SMTPSECURE;
            $mail->Port = M_PORT;
        

            if(!empty($email)){
                $mail->From = "support@edynakdemo.com";
                $mail->FromName = "SiteMaster";
                $mail->addReplyTo('support@edynakdemo.com');
                $mail->addAddress($email);

                $mail->Subject = "Account Verification";
                $mail->Body = $message;
                $mail->AltBody = $message;

                if(!$mail->send()){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
?>
