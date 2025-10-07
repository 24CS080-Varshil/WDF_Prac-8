<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="style_d.css">
</head>
<body>
<h1>Event Records</h1>
<?php
    include "store.php";
    $sql="SELECT event_no, event_name, event_date, venue, organizer FROM event ORDER BY event_date DESC LIMIT 5";
    $result = $connect->query($sql);

        if($result->num_rows > 0){
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Event No</th>";
            echo "<th>Event Name</th>";
            echo "<th>Event Date</th>";
            echo "<th>Venue</th>";
            echo "<th>Organizer</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" .$row['event_no']."</td>";
                echo "<td>" .$row['event_name']."</td>";
                echo "<td>" .$row['event_date']."</td>";
                echo "<td>" .$row['venue']."</td>";
                echo "<td>" .$row['organizer']."</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            $result->free();
        } else{
            echo "No records matching your query were found.";
        }
        $connect->close();
?>
</body>
</html>