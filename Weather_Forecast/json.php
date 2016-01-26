<?php
  	if($_SERVER["REQUEST_METHOD"]="GET"){
  		$street=$_GET["address"];
  		$city=$_GET["city"];
  		$state=$_GET["state"];
  		$degree_type=$_GET["degree"];
  		$url="https://maps.googleapis.com/maps/api/geocode/xml?address=". urlencode($street.",".$city.",".$state)."&key=AIzaSyCakFWolxAu8anc6a6betqlplgMfduQhNg";
		$content_xml=simplexml_load_string(file_get_contents($url));
		$lat= $content_xml->result->geometry->location->lat;
		$lng= $content_xml->result->geometry->location->lng;
		$apikey="28b1770cec07d5a3903ff51efbeb28d6";
		$units_value=$degree_type=="Fahrenheit"?"us":"si";
		$url="https://api.forecast.io/forecast/".$apikey."/".urlencode($lat.",".$lng)."?units=".$units_value."&exclude=flags";
		$json=(string)file_get_contents($url);
		echo $json;
  	}
?>