<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="style_d.css">
</head>
<body>
<?php
    include "store.php";
    $sql="SELECT event_no, event_name, event_date, location, organizer FROM event ORDER BY event_date DESC LIMIT 5";
    $result = $connect->query($sql);

        if($result->num_rows > 0){
            echo "<table>";
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" .$row['event_no']."</td>";
                echo "<td>" .$row['event_name']."</td>";
                echo "<td>" .$row['event_date']."</td>";
                echo "<td>" .$row['location']."</td>";
                echo "<td>" .$row['organizer']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            $result->free();
        } else{
            echo "No records matching your query were found.";
        }
        $connect->close();
?>
</body>
</html>