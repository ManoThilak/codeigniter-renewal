<?php
// $locations[0] = array("lat"=>"9.9240495", "long"=>"78.1222224", "info" => "Bondi Beach");
// $locations[1] = array("lat"=>"8.8017471", "long"=>"78.138421", "info" => "Coogee Beach");
// $locations[2] = array("lat"=>"-34.028249", "long"=>"151.157507", "info" => "Cronulla Beach");
// $locations[3] = array("lat"=>"-33.80010128657071", "long"=>"151.28747820854187", "info" => "Manly Beach");
// $locations[4] = array("lat"=>"-33.950198", "long"=>"151.259302", "info" => "Maroubra Beach");
?>

<?php
 $conn= mysqli_connect("localhost","root","","real");
 $query="SELECT *, category.title as category,city.title as city,area.title as area
 FROM suppliers 
 LEFT JOIN category ON category.id = suppliers.category_id AND category.deleted=0 
 LEFT JOIN city ON city.id = suppliers.city_id AND city.deleted=0 
 LEFT JOIN area ON area.id = suppliers.area_id AND area.deleted=0 
 where suppliers.status = 'enabled' and suppliers.deleted = 0";
$result=mysqli_query($conn, $query);
while ($row=mysqli_fetch_array($result)) {
    $group_list = "";
    $group_list .= "<li> Title      : " . $row['company_name'] . "</li>";
    $group_list .= "<li> Category   : " . $row['category'] . "</li>";
    $group_list .= "<li> Sq.ft      : " . $row['sqft'] . "</li>";
    $group_list .= "<li> City       : " . $row['city'] . "</li>";
    $group_list .= "<li> Area       : " . $row['area'] . "</li>";
    $group_list .= "<li> Party Name : " . $row['partyname'] . "</li>";
    $group_list .= "<li> Party Phone: " . $row['phone'] . "</li>";


    $locations[] = array("lat"=>$row['latitude'], "long"=>$row['longitude'], "info" => $group_list);
}
?>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <style type="text/css">
            body { font: normal 10pt Helvetica, Arial; }
            #map { width: 1150px; height: 570px; border: 0px; padding: 0px; }
        </style>
        <script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
       
        <script type="text/javascript">


        var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
        new google.maps.Size(32, 32), new google.maps.Point(0, 0),
        new google.maps.Point(16, 32));
        var center = null;
        var map = null;
        var currentPopup;
        var bounds = new google.maps.LatLngBounds();

        function addMarker(lat, lng, info)
        {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker(
            {
                position: pt,
                icon: icon,
                map: map
            });
            var popup = new google.maps.InfoWindow(
            {
                content: info,
                maxWidth: 300
            });

            google.maps.event.addListener(marker, "click", function()
            {
                if (currentPopup != null)
                {
                    currentPopup.close();
                    currentPopup = null;
                }
                popup.open(map, marker);
                currentPopup = popup;
            });
            google.maps.event.addListener(popup, "closeclick", function()
            {
                // map.panTo(center);
                currentPopup = null;
            });
        }

        function initMap()
        {
            map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(0, 0),
            zoom: 0,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            mapTypeControlOptions:
            {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
            },
            navigationControl: true,
            navigationControlOptions:
            {
                style: google.maps.NavigationControlStyle.SMALL
            }
            });
            <?php foreach($locations AS $loc) { //you could replace this with your while loop query ?>
                addMarker(<?php echo $loc["lat"]; ?>, <?php echo $loc["long"]; ?>, '<?php echo $loc["info"]; ?>');
            <?php } ?>
            center = bounds.getCenter();
            map.fitBounds(bounds);
        }
        </script>
    </head>
    <body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
    <div id="map"></div>
</html>