<?php



function google_geocode($address) {

// takes in address as a string and returns a 3 part array longitude / latitude / altitude

$address = urlencode($address);
// Google Maps API key for eastbeachnorfolk.com
$key = "ABQIAAAAi-gAAz-wuBj08f5UBVbHoRSgO24XnWyE606b43Z-eCkOaQXOqBSMDRpFaazjVeYN9lj6dpBOfgdF1Q";
$webaddress = "http://maps.google.com/maps/geo?q=$address&output=xml&key=$key";
// Retrieve the URL contents
$page = file_get_contents($webaddress);
// Parse the returned XML file
$xml = new SimpleXMLElement($page);
// Retrieve the desired XML node
return $xml->Response->Placemark->Point->coordinates;

}

//assumes a connection, assumes fields address, city, state, zip, longitude, latitude

function geocode_row($tablename, $id, $idcolname="id") {

// uncomment the below echos to watch how this works

$g_query = "SELECT * FROM $tablename where $idcolname = $id";
//echo $g_query . "<br/>";
$g_result = mysql_query($g_query) or die(mysql_error());
$row = mysql_fetch_assoc($g_result);
$address = $row['address'] . " " . $row['city'] . " " . $row['state'] . " " . $row['zip']; 
//echo $address . "<br/>";
$coordinates = google_geocode($address);
//echo $coordinates . "<br/>";
list($longitude, $latitude, $altitude) = explode(",", $coordinates);
$update_query = "UPDATE $tablename SET longitude = $longitude, latitude = $latitude where $idcolname = $id";
//echo $update_query . "<br/>";
$update_result = mysql_query($update_query) or die(mysql_error());
}


?>
