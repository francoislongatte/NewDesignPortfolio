	/* ria.exos.flatland.be - Notes de cours en ligne pour le cours de RIA - Applications Internet Riches
	 * JS Document - /html5/test_one/js/script.js
	 * coded by PRENOM NOM (GROUPE)
	 * october 2012
	 */
	/*jslint regexp: true, vars: true, white: true, browser: true */
	/*global jQuery */
	(function($) {
			"use strict";
		
			function validEmail(email) {
				var verif = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return verif.test(email);
			}
		
			function validFormContact(e) {
				e.preventDefault();
				var name = $('#name').val();
				var labelName = $("label[for=name]");
				var ErrorName = "<span class='error' >N'oubliez pas ce champs</span>";
				var email = $('#email').val();
				var labelEmail = $('label[for=email]');
				var ErrorEmail = "<span class='error' >Cette email est incorrecte ou mal ecrite</span>";
				$('#message').value = "";
				var message = $('#message').val();
				var labelMessage = $('label[for=message]');
				var ErrorMessage = "<span class='error' >N'oubliez pas d'ecrire votre message</span>";
				var mailSuccess = "<div id='success'>Message bien envoyés</div>";
				var span = "span[class=error]";
				
				if (name === '') {
					if (labelName.next(span).size() < 1) {
						labelName.after(ErrorName);
					}
				} else {
					labelName.next(span).remove();
				}
				
				if (validEmail(email) === false) {
					if (labelEmail.next(span).size() < 1) {
						labelEmail.after(ErrorEmail);
					}
				} else {
					labelEmail.next(span).remove();
				}
				
				if (message === '') {
					if (labelMessage.next(span).size() < 1) {
						labelMessage.after(ErrorMessage);
					} 
				}else {
						labelMessage.next(span).remove();
				}
				if (name !== '' || validEmail(email) === true || message !== '') {
					$.ajax({
						type: "POST",
						url: $("#form").attr("action"),
						data: $("#form").serialize(),
						dataType: "json",
						success: function(msg) {
							
						},
						error: function() {
							
						}
					});
				}
			}
		$(function() {
		
			$("#form").on("submit", validFormContact);
		});
	}(jQuery));