<?php 
session_start();
	
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$bool = false;
		
	if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){
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
	    
	    $bool = true;
		    
		mail($to, $sujet, $msg, $headers);
	
	}
	
	echo json_encode($bool);
	
	}else{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
			if (!empty($_POST['name'])) {
				$name = $_POST['name'];
				$_SESSION['name'] = $name;
			}else{
				$_SESSION['name'] = "error";
			}
			
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){  
			    $email = $_POST['email'];
			    $_SESSION['email'] = $email; 
			}else{
				$_SESSION['email'] = 'error';
			}
			if (!empty($_POST['message'])){
				$message = $_POST['message'];
				$_SESSION['message'] = $message;
			}else{
				$_SESSION['message'] = 'error';
			}
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){
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
				
				session_unset();
			    session_destroy();
			    
			    header("Location: http://francoislongatte.be/wordpress/");	
			}else{
				
				header("Location: http://francoislongatte.be/wordpress/#form");	
				
			}
		
		}
	
	}