var color = "#9bc8ce"; //Set your tint color. Needs to be a hex value.

function multipleMap()
{
	jQuery('.googleMap').each(function(e)
	{
		geocoder = new google.maps.Geocoder();
		var address = jQuery(this).data('address');
		var mapId = jQuery(this).attr('id');
		geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
    		latitude = results[0].geometry.location.lat();
			longitude = results[0].geometry.location.lng(); 
			initGoogleMap(mapId,latitude,longitude,address);   
    	} 
	});
	  geocoder = null;
	  delete geocoder;
	
	})
}
function initGoogleMap(mapId,lat,long,address) {
	var styles = [
	    {
	      stylers: [
	        { saturation: -100 }
	      ]
	    }
	];
	
	var options = {
		mapTypeControlOptions: {
			mapTypeIds: ['Styled']
		},
		center: new google.maps.LatLng(lat, long),
		zoom: 13,
		scrollwheel: false,
		navigationControl: false,
		mapTypeControl: false,
		zoomControl: true,
		disableDefaultUI: true,	
		mapTypeId: 'Styled'
	};
	var div = document.getElementById(mapId);
	var map = new google.maps.Map(div, options);
	var marker = new google.maps.Marker({
	    map:map,
	    draggable:false,
	    animation: google.maps.Animation.DROP,
	    position: new google.maps.LatLng(lat,long)
	});
	var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
	map.mapTypes.set('Styled', styledMapType);
	
	var infowindow = new google.maps.InfoWindow({
	      content: "<div class='iwContent'>"+address+"</div>"
	});
	google.maps.event.addListener(marker, 'click', function() {
	    infowindow.open(map,marker);
	  });
	  	  
	
	bounds = new google.maps.LatLngBounds(
	  new google.maps.LatLng(-84.999999, -179.999999), 
	  new google.maps.LatLng(84.999999, 179.999999));
	rect = new google.maps.Rectangle({
	    bounds: bounds,
	    fillColor: color,
	    fillOpacity: 0.2,
	    strokeWeight: 0,
	    map: map
	});
	
	/*marker = map = null;
	delete 	marker;
	delete 	map;*/
}
google.maps.event.addDomListener(window, 'load', multipleMap);


