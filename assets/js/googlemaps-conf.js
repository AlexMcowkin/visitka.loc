/* this is default GoogleMap Options*/
function myCords()
{
	var latitude = 46.9804536;
	var longitude = 28.8378614;

	var mapOptions = {
			center: new google.maps.LatLng(latitude,longitude),
			zoom: 15,
			panControl: true,
			zoomControl: true,
			zoomControlOptions: {style: google.maps.ZoomControlStyle.SMALL},
			mapTypeControl: false,
			streetViewControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
	};
			
	var map = new google.maps.Map(document.getElementById("goole_map_position"), mapOptions);
	
// To add the marker to the map, use the 'map' property
var marker = new google.maps.Marker({
    position: new google.maps.LatLng(latitude,longitude),
    map: map,
    title:"ул.Пушкина, д.Колотушкина, MD-2019, Кишинев, Молдова"
});
	
}

google.maps.event.addDomListener(window, 'load', myCords);