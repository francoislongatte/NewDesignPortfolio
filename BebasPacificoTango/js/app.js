/* ria.exos.flatland.be - Notes de cours en ligne pour le cours de RIA - Applications Internet Riches
 * JS Document - /html5/test_one/js/script.js
 * coded by PRENOM NOM (GROUPE)
 * october 2012
 */
/*jslint regexp: true, vars: true, white: true, browser: true */
/*global jQuery */
(function($) {
	"use strict";
	
	var loader,timer;
	
	function validEmail(email) {
		var verif = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return verif.test(email);
	}
	
	function validFormContact(e) {
		e.preventDefault();
		var name = $('#name');
		var nameVal = name.val();
		var labelName = $("label[for=name]");
		var ErrorName = "<span class='error' >N'oubliez pas d'indiquez votre nom</span>";
		var email = $('#email');
		var emailVal = email.val();
		var labelEmail = $('label[for=email]');
		var ErrorEmail = "<span class='error' >N'oubliez pas votre email ou cette email est incorrecte</span>";
		
		var message = $('#message');
		message.value = "";
		var messageVal = message.val();
		var labelMessage = $('label[for=message]');
		var ErrorMessage = "<span class='error' >N'oubliez pas d'ecrire votre message</span>";
		var mailSuccess = "<div id='success'>Message bien envoyés</div>";
		var span = "span[class=error]";
		
		if (nameVal === '') {
			if (labelName.next(span).size() < 1) {
				labelName.after(ErrorName);
			}
		} else {
			labelName.next(span).remove();
		}
		
		if (validEmail(emailVal) === false) {
			if (labelEmail.next(span).size() < 1) {
				labelEmail.after(ErrorEmail);
			}
		} else {
			labelEmail.next(span).remove();
		}
		
		if (messageVal === '') {
			if (labelMessage.next(span).size() < 1) {
				labelMessage.after(ErrorMessage);
			} 
		}else {
				labelMessage.next(span).remove();
		}
		if (nameVal!==''||validEmail(emailVal)===true||messageVal!=='') {
			loader.css({ opacity: 1 });
			$.ajax({
				type: "POST",
				url: $("#form").attr("action"),
				data: $("#form").serialize(),
				dataType: "json",
				success: function(msg) {
					if(msg){
						$('#messageOk').fadeIn();
						name.val("");
						email.val("");
						message.val("");
						mailSuccess.insertAfter('#ajaxLoader');
					}
					loader.css({ opacity: 0 });
				},
				error: function() {
					loader.css({ opacity: 0 });
				}
			});
		}
	}
	
	
	var meter = $('.meterSkills');

	function jauges() {
		meter.wrap('<div class="round" />').each(function() {
			var $compteur, monInterval;
			var $meter = $(this);
			var $div = $meter.parent();
			var min = $meter.attr('min');
			var max = $meter.attr('max');
			var ratio = ($meter.val() - min) / (max - min);
			var $color = $('<canvas width="150px" height="150px" />');
			$div.append($color);
			$compteur = 0.01;
			
			monInterval = setInterval(function() {
				var ctxCiColorReplace = $color[0].getContext('2d');
				if ($compteur <= ratio) {
					ctxCiColorReplace.clearRect(0, 0, 200, 200);
					ctxCiColorReplace.beginPath();
					ctxCiColorReplace.arc(75, 75, 60, -1 / 2 * Math.PI, ($compteur + 0.01) * 2 * Math.PI - 1 / 2 * Math.PI);
					$compteur += 0.005;
				} else {
					clearInterval(monInterval);
				}
				ctxCiColorReplace.lineWidth = 10;
				ctxCiColorReplace.strokeStyle = "#f3714f";
				ctxCiColorReplace.stroke();
			}, 10);
		});
	}
	
	function scroll(event){
		var link = event.target.href;
		var the_id = link.split("#");
		var the_id_modif = "#" + the_id[1];
			$('html, body').animate({
				scrollTop: $(the_id_modif).offset().top
			}, 650);
		event.preventDefault();
	}
	function ControlJauge(){
			if ($(window).scrollTop() >= 1500) {
				jauges();
				clearInterval(timer);
			}
	}

	function filter(e){
		$(".taxonomie").show();
		var filterId = e.target.attr("id");
		
		$(".taxonomie").hide();
		$("."+ filterId).prependTo( $(".taxonomie").parent() );
		$("."+ filterId).show();
		$("#btnAll").css({ top: "0", zIndex: "0" });
	}
	function filterAll(){
		$(".taxonomie").show();
		$("#btnAll").css({ top: "-42px", zIndex: "-1" });
	}
	
	$(function() {
		var currentLocation =  document.location.href;
		loader = $('#ajaxLoader').css({ opacity: 0 });
		$("#form").on("submit", validFormContact);
		
		meter.hide();
		
		timer = setInterval(ControlJauge,1000);

		if(currentLocation!=="http://francoislongatte.be/blog/"){
				$('nav a[title^="#"]').on('click', scroll);
		}
		
		
		$('#fieldFilter a').on('click', filter);
		$('#btnAll').on('click', filterAll);
	});
}(jQuery));
