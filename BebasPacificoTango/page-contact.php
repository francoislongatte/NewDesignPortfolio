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
        <form id="form" method="post" action="<?php bloginfo('wpurl'); ?>/wp-content/themes/BebasPacificoTango/form-contact.php">
            <h1>Où utiliser ce formulaire</h1>
            <p id="messageOk">Votre message a bien été envoyer</p>
            <div>
                <label for="name">Votre nom</label>
                <?php if($_SESSION['name'] == 'error'): ?>
                	<span class="error" >N'oubliez pas d'indiquée votre nom</span>
                	<input type="text"  id="name" value="" name="name">
                <?php elseif(isset($_SESSION['name'])): ?>
                	<input type="text"  id="name" value="<?php echo $_SESSION['name']; ?>" name="name">
                <?php else: ?>
                	<input type="text"  id="name" value="" name="name">
                <?php endif; ?> 
            </div>

            <div>
                <label for="email">Votre e-mail</label> 
                
                <?php if($_SESSION['email'] == 'error'): ?>
                	<span class="error" >N'oubliez pas votre email ou cette email est incorrecte</span>
                	<input type="text"  id="email" value="" name="email">
                <?php elseif(isset($_SESSION['name'])): ?>
                	<input type="text"  id="email" value="<?php  echo $_SESSION['name']; ?>" name="email">
                <?php else: ?>
                	<input type="text"  id="email" value="" name="email">
                <?php endif; ?> 
            </div>

            <div>
                <label for="message">Votre message</label>
                <?php if($_SESSION['message'] == 'error'): ?>
                	<span class="error" >N'oubliez pas d'ecrire votre message</span>
                	<textarea rows="10" cols="20" id="message" name="message"></textarea>
                <?php elseif(isset($_SESSION['message'])): ?>
                	<textarea rows="10" cols="20" id="message" name="message"><?php echo $_SESSION['message']; ?></textarea>
                <?php else: ?>
                	<textarea rows="10" cols="20" id="message" name="message" ></textarea>
                <?php endif; ?>

            </div>
            <span id="ajaxLoader"><img src="<?php bloginfo('wpurl'); ?>/wp-content/themes/BebasPacificoTango/images/30.gif" alt="ajaxLoader" width="40" height="5" /></span>
            <p><input type="submit" id="submit" value="submit"></p>
        </form>
    </section>
    <?php unset($_SESSION); ?>