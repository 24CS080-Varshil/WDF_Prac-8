<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Registration Form</h1>
  <form action="store.php" method="POST" onsubmit="return ValidateForm()">
    <h1>Event Data</h1>
    <input type="text" name="event_name" id="event_name" placeholder="Event Name">
    <label for="event_date">Event Date<input type="date" name="event_date" id="event_date"></label>
    <input type="text" name="venue" id="venue" placeholder="Location">
    <input type="text" name="organizer" id="organizer" placeholder="Organizer">
    <input type="submit" value="Upload">
  </form>
  <script src="script.js"></script>
</body>
</html>
