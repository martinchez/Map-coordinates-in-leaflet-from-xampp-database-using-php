<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drone fika</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<style>
    #map {
        height: 500px;
    }
</style>

<body>
    <div>
        <!--map display  -->
        <div id="map"></div>
        <?php
        $conn = new mysqli("localhost", "root", "", "dronfikamap");
        $result = mysqli_query($conn, "SELECT latitude,longitude FROM maps WHERE latitude is not NULL or longitude is not NULL");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        echo "<table>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td align='center' width='200'>" . $row['latitude'] . "</td>";
            echo "<td align='center' width='200'>" . $row['longitude'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        // mysqli_close($conn);
        ?>
    </div>
        


    <!-- mappinmjdkljsdljscript -->
    <script>
        var map = L.map('map').setView([-0.390771, 36.968123], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-0.390771, 36.968123]).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();
            <?php
        $conn = new mysqli("localhost" ,"root", "","dronfikamap");
        $result = mysqli_query($conn,"SELECT latitude,longitude FROM maps WHERE latitude is not NULL or longitude is not NULL");
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
             var marker = L.marker([<?php echo $row['latitude']?>,<?php echo $row['longitude'] ?>]).addTo(map); 
             <?php
        }
        ?>    
    </script>
    
</body>

</html>