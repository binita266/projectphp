<?php  
require_once '../../model/Database.php';
require_once '../../model/User.php';
session_start();
$dbcon = Database::getDb();
$l = new User();
$mylocation =  $l->getAllPLocations(Database::getDb());
$addresses= array();

foreach($mylocation as $location){
	array_push($addresses, $location->Address);
}
 	// echo json_encode($addresses);
?>

<?php
$page_title = "Locations";
include dirname( __FILE__) . "../../header.php";
 ?>
<body>
	<section class="section-content">
		<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div id="map"></div>
			</div>
		</div>
	</div>
	</section>
	
<script>
	var addresses = document.getElementById('addresses');
	var addressArray = <?php echo json_encode($addresses); ?>;
</script>
<script>
	var LocalAddress = '240 Donald Avenue, Toronto'; 
 	var map;
 	function initializeMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			zoom: 14
		});
	//current location----------------------------------------------------------
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			var marker = new google.maps.Marker({
				position: pos, 
				map: map,
				icon: 'markers/blue_MarkerA.png'
			});
			map.setCenter(pos);
		});
	}
	//----All users-------------------------------------------------------------

	for(var i = 0; i < addressArray.length; i++){
		var gcoder = new google.maps.Geocoder();
		gcoder.geocode(
		{ address: addressArray[i] },
		function (results, status) {
			if (status == "OK") {
				var localMarker = new google.maps.Marker(
				{
					position: results[0].geometry.location,
					map: map
				});
			}
		}
		);
	}
console.log(addressArray);
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkj8VSnWsQe9K1TBQOnSh1rJeXkIy1Lc&language=en&region=CA&&callback=initializeMap">
</script>	
<?php
include dirname( __FILE__) . "../../footer.php";
 ?>