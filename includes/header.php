<?php
    include_once("analyticstracking.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Online Dressing Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.6" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/popup.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap core CSS-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popup.js"></script>
    <script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="js/prettify.js"></script>
    <script type="text/javascript">
        // Detect whether device supports orientationchange event, otherwise fall back to
        // the resize event.
        var supportsOrientationChange = "onorientationchange" in window,
            orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";

        window.addEventListener(orientationEvent, function() {
            if(window.orientation==0)
            {
                document.getElementById('portrait').style.display = '';
                document.getElementById('landscape').style.display = 'none';
            }
            else if(window.orientation==90)
            {
                document.getElementById('portrait').style.display = 'none';
                document.getElementById('landscape').style.display = '';
            }
        }, false);
    </script>
</head>
