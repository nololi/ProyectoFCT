$(document).ready(function(){	
	if(!$.cookie("faminsurance")){
		//$("#cookie").removeClass("oculto");			
		var capa = '<div class="container-fluid"><div class="row" id="cookie"><div class="col-xs-12 text-center">';
			capa +='<p>Nuestra web utiliza cookies propias para ofrecerle un mejor servicio. Si continúa navegando, consideramos que acepta su uso.</p>';
			capa +=	'<p>Puede cambiar la configuración u obtener más información <a href="politicaprivacidad.php" target="_blank">aquí</a></p>';
			capa +='<p><a class="btn btn-default" id="acepto">Aceptar</a><a class="btn btn-default" id="info">Más información</a> </p>';
			capa += '</div></div></div>';			
		var posicion = $(".container-fluid").eq(0);//como puedo tener varios container-fluid sólo primer 
			$(capa).insertBefore(posicion);
	}else{//si ya existe sobreescribo
		$.cookie("faminsurance", 1, { expires : 10 });		
	}
	$("#acepto").click(function(){//creo cookie	
		$.cookie("faminsurance", 1, { expires : 10 });
		$("#cookie").toggle(5000);
	});	
	$("#info").click(function(){
		$(location).attr('href',"politicaprivacidad.php");	
	});
});