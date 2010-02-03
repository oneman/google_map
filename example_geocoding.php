<?php

/*

example table used

CREATE TABLE properties (
   id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   address VARCHAR(100) NOT NULL,
   city VARCHAR(50) NOT NULL,
   state CHAR(2) NOT NULL,
   zip CHAR(5) NOT NULL,
   latitude FLOAT(8,6),
   longitude FLOAT(8,6),
   description VARCHAR(250) NOT NULL
)


*/


// database connection

$conn = mysql_connect("db2170.perfora.net", "dbo310900179", "funworld");
$db = mysql_select_db("db310900179");

// end database connection




require('google_geocode.php');


// ****************
// TYPE 1 get geocode from an address string and display it

$an_address = "3229 Derby Lane Williamsburg VA 23185";

echo $an_address . " is the address<br/>";

$coordinates = google_geocode($an_address);

// echo coordinates

echo $coordinates . " this is the coordinates lat/long/alt<br/>";

list($longitude, $latitude, $altitude) = explode(",", $coordinates);

echo $longitude . " this is the longitude<br/>";

echo $latitude . " this is the latitude<br/>";


// *****************
// TYPE 2 give the function a tablename and id to geocode and store coordinates

$a_row_id = "3";

$a_table_name = "properties";

geocode_row($a_table_name, $a_row_id);


?>
