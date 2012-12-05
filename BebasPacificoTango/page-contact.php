<?php
/*
Template Name: Contact
*/
?>
<section id="contact">
        <?php $pageContact_id = '20';
				$pagecontact_data[1] = get_page($pageContact_id);
				$descriptionPageContact = get_post_meta($pageContact_id, 'description');
			?>
        <header>
            <h1><?php echo($pagecontact_data[1]->post_name); ?></h1><span><?php echo($descriptionPageContact[0]); ?></span>
        </header>
        <span id="img" class="map"></span>
        
        <?php
			 $idInfo = 145;
			 $billetInfo = get_post($idInfo);
			 $titleInfo = $billetInfo->post_title;
			 $contenuInfo = $billetInfo->post_content;
		?>
		<?php
			 $idQR = 146;
			 $billetQR = get_post($idQR);
			 $titleQR = $billetQR->post_title;
			 $contenuQR = $billetQR->post_content;
		?>
        
        <div id="information">
            <h1><?php echo $titleInfo ?></h1>

            <?php echo $contenuInfo ?>

            <div id="QR">
                <a href="vcard/vCard.vcf" class="qr-code"></a>
                <p title="<?php echo $titleQR ?>"><?php echo $contenuQR ?></p>
            </div>
        </div>
        <div></div>
        <form id="form" method="post" action="<?php bloginfo('wpurl'); ?>/wp-content/themes/BebasPacificoTango/form-contact.php">
            <h1>Or use this form</h1>
            <div>
                <label for="name">Name</label>
                <?php if(isset($_GET["name"]) && $_GET["name"] == 'error'): ?>
                	<span class="error" >N'oubliez pas ce champs</span>
                	<input type="text"  id="name" value="" name="name">
                <?php elseif(isset($_GET["name"])): ?>
                	<input type="text"  id="name" value="<?php echo $_GET["name"]; ?>" name="name">
                <?php else: ?>
                	<input type="text"  id="name" value="" name="name">
                <?php endif; ?> 
            </div>

            <div>
                <label for="email">E-mail</label> 
                <?php if(isset($_GET["email"]) && $_GET["email"] == 'error'): ?>
                	<span class="error" >Cette email est incorrecte ou mal ecrite</span>
                	<input type="text"  id="email" value="" name="email">
                <?php elseif(isset($_GET["email"])): ?>
                	<input type="text"  id="email" value="<?php  echo $_GET["email"]; ?>" name="email">
                <?php else: ?>
                	<input type="text"  id="email" value="" name="email">
                <?php endif; ?> 
            </div>

            <div>
                <label for="message">Message</label>
                <?php if(isset($_GET["message"]) && $_GET["message"] == 'error'): ?>
                	<span class="error" >N'oubliez pas d'ecrire votre message</span>
                	<textarea rows="10" cols="20" id="message" name="message"></textarea>
                <?php elseif(isset($_GET["message"])): ?>
                	<textarea rows="10" cols="20" id="message" name="message"></textarea>
                <?php else: ?>
                	<textarea rows="10" cols="20" id="message" name="message" ><?php echo $_GET["email"]; ?></textarea>
                <?php endif; ?>

            </div>
             <script type="text/javascript">
            var RecaptchaOptions = {
			    theme : 'custom',
			    custom_theme_widget: 'recaptcha_widget'
			 };

			</script>
            <div id="recaptcha_widget" style="display:none">

			   <div id="recaptcha_image"></div>
			   <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
			
			   <span class="recaptcha_only_if_image">Enter the words above:</span>
			   <span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>
			
			   <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
			   <div><a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a></div>
			
			 </div>
			  <script type="text/javascript"
			    src="http://www.google.com/recaptcha/api/challenge?k=6LctxNkSAAAAAAHaXXATocHoaXTzK2bIzvfysJIH">
			 </script>
			 <noscript>
			   <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LctxNkSAAAAAAHaXXATocHoaXTzK2bIzvfysJIH"
			        height="300" width="500" frameborder="0"></iframe><br>
			   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
			   </textarea>
			   <input type="hidden" name="recaptcha_response_field"
			        value="manual_challenge">
			 </noscript>
           
            <p><input type="submit" id="submit" value="submit"></p>
        </form>
    </section>
