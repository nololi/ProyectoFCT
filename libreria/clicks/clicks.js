$(document).ready(function(){

	$("#enviar").click(function(){
		ga('send', 'event', {
			eventCategory: 'Contacto',
			eventAction: 'click',
			eventLabel: event.target.href
		});	
	}); 
 });