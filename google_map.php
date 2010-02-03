<?php

// database connection

$conn = mysql_connect("db2170.perfora.net", "dbo310900179", "funworld");
$db = mysql_select_db("db310900179");

// end database connection


// map keys

$my_key = "ABQIAAAAi-gAAz-wuBj08f5UBVbHoRTo8fWxrVnavESrtFoqnp-tbCZR0RTirFcMhD7vxDhXblLBDB2qXUrXbA";
$east_beach_key = "ABQIAAAAi-gAAz-wuBj08f5UBVbHoRSgO24XnWyE606b43Z-eCkOaQXOqBSMDRpFaazjVeYN9lj6dpBOfgdF1Q";

//$key = $east_beach_key;
$key = $my_key;


// Get properties from db

$properties_table = "properties";

$p_query = "SELECT * FROM $properties_table";
$p_result = mysql_query($p_query) or die(mysql_error());



// Your probably wont need any of the above code except for the google map api key


?>





<html>
  <head>

    <title>Google Map</title>

<!-- these two javascripts are the important part -->

    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $key; ?>&sensor=false"
            type="text/javascript"></script>
    <script type="text/javascript">

    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(36.928053,-76.188630), 9);   /// SET YOUR MAP CENTER AND ZOOM LEVEL HERE
        map.setUIToDefault();

<?php

while ($property = mysql_fetch_assoc($p_result)) { 

// skip properties w/o geocode info
if ($property['latitude'] != "") {

?>


var marker<?php echo $property['id']; ?>  = new GMarker(new GLatLng(<?php echo $property['latitude']; ?>,<?php echo $property['longitude']; ?>),{title : "<?php echo $property['address']; ?>" });

GEvent.addListener(marker<?php echo $property['id']; ?>, 'click', function() {  
 marker<?php echo $property['id']; ?>.openInfoWindowHtml('<?php echo $property['description']; ?>');  
});  

map.addOverlay(marker<?php echo $property['id']; ?>);


<?php }} ?>



      }
    }

</script>
</head>
  

<!-- note the onload here -->

<body onload="initialize()" onunload="GUnload()">
 

This is the map div.<br/>

<div id="map_canvas" style="width: 800px; height: 600px"></div>

<br/><br/>


Show the list of properties in the database table:<br/>
<?php

mysql_data_seek($p_result, 0);

while ($property = mysql_fetch_assoc($p_result)) {

echo $property['id'] . " " . $property['address'] . " " . $property['city'] . " " . $property['state'] . " " . $property['zip'] . " " . $property['longitude'] . " " . $property['latitude'] . " " . $property['description'] . "<br/>"; 

} 

?>





</body>
</html>





