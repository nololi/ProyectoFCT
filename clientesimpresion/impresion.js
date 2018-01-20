$(document).ready(function(){
	/*pongo el pointer a los enlaces */
	$("p#imprimir").css("cursor","pointer");
	$("p#pdf").css("cursor","pointer");
	
	
	
	/*
	*imprimir
	*
	*/
	$("#imprimir").click(function(){
		//alert("OK");		
		$("#imprimirtodo").print({
        	globalStyles: true,
        	mediaPrint: false,
        	stylesheet: null,
        	noPrintSelector: ".no-print",
        	iframe: true,
        	append: null,
        	prepend: null,
        	manuallyCopyFormValues: true,
        	deferred: $.Deferred(),
        	timeout: 750,
        	title: null,
        	doctype: '<!doctype html>'
		});		
	});	
	
	
	
	/*
	*	PDF: centrar esto 
	*
	*/
			
			var specialElementHandlers = {
					'#editor': function (element,renderer) {
						return true;
			}
			};
			$('#pdf').click(function () {				
				var doc = new jsPDF();
				$(".img-responsive").remove(); //voler a mostrar
				doc.fromHTML(
					//margen 15
					$('#imprimirtodo').html(), 15, 15, 
					{ 'width': 75, 'elementHandlers': specialElementHandlers }, 
					function(){ doc.save('contrato.pdf'); }
				);
				
			});  
		

      
	
	
});