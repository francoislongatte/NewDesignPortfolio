/* ria.exos.flatland.be - Notes de cours en ligne pour le cours de RIA - Applications Internet Riches
 * JS Document - /html5/test_one/js/script.js
 * coded by PRENOM NOM (GROUPE)
 * october 2012
 */
/*jslint regexp: true, vars: true, white: true, browser: true */
/*global jQuery */
(function($) {
	"use strict";
	var meter = $('.meterSkills'),
		alreadyDone = false;

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
	$(function() {
		meter.hide();
		jauges();
		/*if (alreadyDone === false) {
			$(window).on('', function() {
				if ($(window).scrollTop() > 1500) {
					
					alreadyDone = true;
				}
			});
		}*/
	});
}(jQuery));