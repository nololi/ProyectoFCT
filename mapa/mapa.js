/* pasar esto a jquery */

var map;

	function initMap() { //utilizo coordenadas ficticias
	  map = new google.maps.Map(document.getElementById('mapa'), {
		center: {lat:  43.403401, lng: -8.50419},
		zoom: 10
	  });
		var marker = new google.maps.Marker({
		position: map.getCenter(),
		icon: {
		  path: google.maps.SymbolPath.CIRCLE,
		  scale: 5
		},
		draggable: true,
		map: map
	  });

	}
