<?php
$conn = new mysqli("localhost" ,"root", "","dronfikamap");
$result = mysql_query($conn,"SELECT latitude,longitude FROM maps WHERE latitude is not NULL or longitude is not NULL");
echo "<table>";
while($row=mysql_fetch_assoc($result)){
    echo "<tr>";
    echo "<td align='center' width='200'>" . $row['latitude'] . "</td>";
    echo "<td align='center' width='200'>" . $row['longitude'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysql_free_result($result);
mysql_close($conn
>?