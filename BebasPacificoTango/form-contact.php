<?php 
	
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	echo 'This is an ajax request!';
	
	}else{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$param =  array();
			
			require_once('recaptchalib.php');
			
			$privatekey = "6LctxNkSAAAAAAjfFZLWAtH_i2JuCAfAdBZ7UJ0H";
			
			$resp = recaptcha_check_answer (
				$privatekey,
				$_SERVER["REMOTE_ADDR"],
				$_POST["recaptcha_challenge_field"],
				$_POST["recaptcha_response_field"]
			);
			
			if(!$resp->is_valid ){
				$ErrorCaptcha = "captcha=error";
				array_push($param, sprintf($ErrorCaptcha));
			}
			
			if (!empty($_POST['name'])) {
				$name = $_POST['name'];
				$getname = "name=" . $name;
				array_push($param, sprintf($getname));
				
			}else{
				$ErrorName = "name=error";
				array_push($param, sprintf($ErrorName));
				
			}
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){  
			    $email = $_POST['email']; 
			    $getemail = "email=" . $email;
				array_push($param, sprintf($getemail));
				
			}else{
				$ErrorEmail = "email=error";
				array_push($param, sprintf($ErrorEmail));
			}
			if (!empty($_POST['message'])){
				$message = $_POST['message'];
				$getmessage = "message=" . $message;
				array_push($param, sprintf($getmessage));
			}else{
				$ErrorMessage = "message=error";
				array_push($param, sprintf($ErrorMessage));
			}
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']) && $resp->is_valid){
				$to = 'francois.longatte@gmail.com';
				$sujet = 'Message-Portfolio de ' . $name ;
				$msg  = 'Bonjour,';
				$msg .= 'Ce mail a été envoyé depuis mon portfolio par ' . $name . ' ,';
				$msg .= 'Voici le message qui vous est adressé :'. ' ' ;
				$msg .= '***************************'."\r\n";
				$msg .= $message."\r\n";
				$msg .= '***************************'."\r\n";
				$msg .= $email;
				 
				$headers = 'From: ' . $name . "  " . $email   . "\r\n". 'Reply-To: Portfolio-LongatteFrancois '  . "\r\n" . 'X-Mailer: PHP/' . phpversion();
			    
				mail($to, $sujet, $msg, $headers);
			}else{
				
				
				$imParam =  implode("&",$param);
				
				
				header("Location: http://francoislongatte.be/wordpress/?" . $imParam . "#form");	
			}
		
		}
	
	}