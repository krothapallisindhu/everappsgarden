<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $lat = $_POST['latitude'];
  $lon = $_POST['longitude'];
  echo "User Has submitted the form and entered this name : <b> $name </b>";
  echo "<br>Latitude: $lat.";
  echo "<br>Longitude: $lon.";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
      var x = document.getElementById("demo");
      function getLocation()
      {
        if (navigator.geolocation)
        {
          navigator.geolocation.getCurrentPosition(bindPosition);
        }
        else {
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
      }
      function bindPosition(position) {
        $("input[name='latitude']").val(position.coords.latitude);
        $("input[name='longitude']").val(position.coords.longitude);
      }
    </script>
  </head>
  <body onload="getLocation()">


    <form id="form1" name="form1" method="post" action="">
      <p>Please complete this form and I will contact you as soon as possible. Thank you.</p>
      <p>
        <label for="name">Your Name</label>
        <input type="text" name="name" id="name" />
        <label for="phone">Contact Number</label>
        <input type="text" name="phone" id="phone" />
        <label for="message">Message to Owner</label>
        <textarea name="message" id="message" cols="45" rows="5"></textarea>
        <input type='hidden' value='' name='latitude'/>
        <input type='hidden' value='' name='longitude'/>
        <input type="submit" name="submit" id="submit" value="Submit Info" />
      </p>
    </form>

  </body>
</html>