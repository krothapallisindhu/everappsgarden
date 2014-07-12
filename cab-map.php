<?PHP
require_once("./dbaccess/membersite_config.php");
if (!$fgmembersite->CheckLogin()) {

    $fgmembersite->StartSession();
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta charset="utf-8" />

        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width" />

        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>

        <title>Welcome to Taxi Booking</title>

        <link rel="STYLESHEET" type="text/css" href="stylesheets/fg_membersite.css" />

        <!-- Included CSS Files -->
        <link rel="stylesheet" href="stylesheets/foundation.css">

            <!--<link rel="stylesheet" href="stylesheets/left-menu.css">-->

            <link rel="stylesheet" href="stylesheets/app.css">

                <link rel="STYLESHEET" type="text/css" href="stylesheets/pwdwidget.css" />

                <script type='text/javascript' src='javascripts/gen_validatorv31.js'></script>

                <script src="javascripts/pwdwidget.js" type="text/javascript"></script>      

                <script src="javascripts/modernizr.foundation.js"></script>

                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

                <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

                <!--[if lt IE 9]>
                    <link rel="stylesheet" href="stylesheets/ie.css">
                <![endif]-->


                <!-- IE Fix for HTML5 Tags -->
                <!--[if lt IE 9]>
                 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->   

                   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
                <?php
                if (isset($_GET['lattitude'])) {
                    $lattitude= $_GET['lattitude'];
                }
                 if (isset($_GET['longitude'])) {
                    $longitude= $_GET['longitude'];
                }
                ?>  
                   <script>
                    function initialize()
                    {

                        var LatLng = new google.maps.LatLng(<?php echo $lattitude; ?>, <?php echo $longitude; ?>);
                        var mapProp = {
                            center: LatLng,
                            zoom: 5,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                        var myMarker = new google.maps.Marker({position: LatLng, title: 'Hello World!', map: map, icon: 'http://maps.google.com/mapfiles/marker.png'});
                        var request = {
                            placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'
                        };

                        var infowindow = new google.maps.InfoWindow();
                        var service = new google.maps.places.PlacesService(map);

                        service.getDetails(request, function(place, status) {
                            if (status == google.maps.places.PlacesServiceStatus.OK) {
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: place.geometry.location
                                });
                                google.maps.event.addListener(myMarker, 'click', function() {
                                    infowindow.setContent(place.name);
                                    infowindow.open(map, this);
                                });
                            }
                        });
                    }

                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>
                </head>  


                <body>

                    <!-- Header Section --> 
                    <?php include "header.inc" ?>   

                    <!--Body middle content start-->
                    <div class="row" style="padding-left: 15px;" >
                        <!--Left Navigation Starts Here-->
                        <div class="two columns" style="background: #4d4d4d;" >
                            <ul class="nav-bar"  >
                                <li style="width: 100%;"><a href="company-home.php"><b>Bookings</b></a></li>
                                <li  style="width: 100%;" class="active"><a href="cabs.php"><b>Cabs</b></a></li>
                                <li style="width: 100%;"><a href="drivers.php"><b>Drivers</b></a></li>
                                <li style="width: 100%;"><a href="company-users.php"><b>Users</b></a></li>
                                <li style="width: 100%;"><a href="company-settings.php"><b>Settings</b></a></li>
                            </ul>
                        </div><!--Left Navigation Ends Here-->


                        <!--Navigation details content start-->
                        <div class="row" style="padding-left: 15px;padding-right: 15px;" >
                            <div class="ten columns" >  

                                <div id="googleMap" style="width:100%;height:200px;"></div>


                            </div>
                        </div>
                    </div>
                    <!--Footer Section --> 
                    <?php include "footer.inc" ?>   

                </body>
                </html>