<?php
/*
Template Name: Contact
*/
?>
<section id="contact">
        <header>
            <h1>Contact</h1><span>How contact me</span>
        </header>
        <span id="img" class="map"></span>
        <div id="information">
            <h1>My Information</h1>

            <p>Phone : 0494 / 05.54.42</p>

            <p>E-mail : Francois.longatte@gmail.com</p>

            <div id="QR">
                <a href="vcard/vCard.vcf" class="qr-code"></a>

                <p>Save time. Scan this QR code Or click to add me to your contact.</p>
            </div>
        </div>
        <form id="form" method="post" action="#">
            <h1>Or use this form</h1>

            <div>
                <label for="nom">Name</label> <input type="text" size="20" id="nom" value="" name="nom">
            </div>

            <div>
                <label for="email">E-mail</label> <input type="text" size="20" id="email" value="" name="email">
            </div>

            <div>
                <label for="message">Message</label> 
                <textarea rows="10" cols="20" id="message" name="message">
</textarea>
            </div>

            <p><input type="submit" id="submit" value="submit"></p>
        </form>
    </section>
