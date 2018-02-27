<!DOCTYPE html>
<!--
    Google Maps API: https://developers.google.com/maps/documentation/embed/guide
    src="https://www.google.com/maps/embed/v1/directions?key=&origin=&waypoints=&destination=">
-->
<html>
    <head>
        <title>Pineland Tours: Tours</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Author" content="Chris Meyers" />

        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />

        <link rel="stylesheet" href="css_elements.css">
        <link rel="stylesheet" href="css_elements_839-.css">

        <script src="scripts/js/jquery.1.10.2.min.js"></script>

        <script type="text/javascript">
            $(function() {
                $("#north").each(function() {
                    $(this).click(function() {
                        $(this).siblings(".northDiv").slideToggle("fast");
                    });
                });
            });
            
            $(function() {
                $('#southEast').each(function() {
                    $(this).click(function() {
                        $(this).siblings('.southeastDiv').slideToggle("fast");
                    });
                });
            });
            
            $(function() {
                $('#south').each(function() {
                    $(this).click(function() {
                        $(this).siblings('.southDiv').slideToggle("fast");
                    });
                });
            });
        </script>
    </head>

    <body>
        <div id="bannercontainer">
            <p id="banner">
                <a href="index.html" class="fancytxt">about</a>  &nbsp; &bull; &nbsp;
                <a href="tours.php" class="fancytxt">tours</a>   &nbsp; &bull; &nbsp;
                <a href="contact.php" class="fancytxt">contact</a>
            </p>
        </div>

        <div id="main">
            <h2 class="header">Pinelands Tour Maker</h2>
            
            To create your custom tour, select one or more Pinelands regions below.  Then, choose the
            destinations you would like to visit within each region. Once all desired points have been
            selected, click the "Get Directions" button.  To reset your current tour, simply 
            click the "Reset" button.
            
            <form method="get">
                <h2 id="north" style="width:225px;"><a class="fancytxt">North Pinelands</a></h2>
                <div class="northDiv">
                    <label>
                        Historic Whitesbog Village:
                        <input type="checkbox"
                               name="whitesbog"
                               class="cboxes"
                               <?php if (isset($_GET['whitesbog'])) echo "checked='checked'"; ?>> 
                    </label> <br />

                    <label>
                        Pineland Center at Mt. Misery:
                        <input type="checkbox"
                               name="misery"
                               class="cboxes"
                               <?php if (isset($_GET['misery'])) echo "checked='checked'"; ?>>
                    </label> <br />

                    <label>
                        Brenden T. Byrne State Park (Pakim Pond):
                        <input type="checkbox"
                               name="pakim"
                               class="cboxes"
                               <?php if (isset($_GET['pakim'])) echo "checked='checked'"; ?>> 
                    </label> <br />

                    <label>
                        Pygmy Pines (Dwarf pines):
                        <input type="checkbox"
                               name="pygmy"
                               class="cboxes"
                               <?php if (isset($_GET['pygmy'])) echo "checked='checked'"; ?>> 
                    </label><br /> 
                </div>

                <h2 id="southEast" style="width:280px;"><a class="fancytxt">Southeast Pinelands</a></h2>
                <div class="southeastDiv">
                    <p></p>
                    <label>
                        Wharton State Forest:
                        <input type="checkbox"
                               name="wharton"
                               class="cboxes"
                               <?php if (isset($_GET['wharton'])) echo "checked='checked'"; ?>> 
                    </label> <br />

                    <label>
                        Bass River State Park:
                        <input type="checkbox"
                               name="bass"
                               class="cboxes"
                               <?php if (isset($_GET['bass'])) echo "checked='checked'"; ?>> 
                    </label> <br />

                    <label>
                        Tuckerton Seaport:
                        <input type="checkbox"
                               name="seaport"
                               class="cboxes"
                               <?php if (isset($_GET['seaport'])) echo "checked='checked'"; ?>> 
                    </label> <br />
                </div>

                <h2 id="south" style="width:225px;"><a class="fancytxt">South Pinelands</a></h2>
                <div class="southDiv">
                    <p></p>
                    <label>
                        Belleplain State Forest (Lake Nummy):
                        <input type="checkbox"
                               name="nummy"
                               class="cboxes"
                               <?php if (isset($_GET['nummy'])) echo "checked='checked'"; ?>> 
                    </label> <br />

                    <label>
                        Heislerville Wildlife Management Area (Maurice Lake):
                        <input type="checkbox"
                               name="maurice"
                               class="cboxes"
                               <?php if (isset($_GET['maurice'])) echo "checked='checked'"; ?>> 
                    </label> <br />

                    <label>
                        Egg Island Fishland Wildlife Management Area:
                        <input type="checkbox"
                               name="egg"
                               class="cboxes"
                               <?php if (isset($_GET['egg'])) echo "checked='checked'"; ?>> 
                    </label> <br />

                    <label>
                        Fortescue Fish & Wildlife Management Area:
                        <input type="checkbox"
                               name="fish"
                               class="cboxes"
                               <?php if (isset($_GET['fish'])) echo "checked='checked'"; ?>> 
                    </label> <br />
                </div>

                <hr>

                <input type="submit"
                       name="submit" 
                       value="Get Directions"
                       style="width:auto;" 
                       class="submit-button"
                       onClick="location = '#map'"
                       >
                <input type="submit"
                       name="submit" 
                       value="Reset"
                       class="submit-button"
                       onclick="clearChecks();
                                location = '#bannercontainer';"
                       >
                <br />

                <script type="text/javascript">
                    function clearChecks() {
                        var f = document.forms[0];
                        for (i = 0; i < f.elements.length; i++) {
                            if (f[i].type === "checkbox") {
                                f[i].checked = false;
                            }
                        }
                    }
                </script>

            </form>

            <a name='map'></a>
            <iframe
                height="450" 
                class="mapmodule"
                src="<?php
                /*
                 *   Origin & Destination:
                 *      Wyndham Philadelphia - Mount Laurel, New Jersey 73, Mount Laurel, NJ
                 *   Pinelands North:
                 *      -Historic Whitesbog village:[whitesbog] 39.882252, -74.511192
                 *      -Pineland Center @ Mt Misery:[misery] 39.921421, -74.524879
                 *      -Brenden T. Byrne State Park (Pakim Pond):[pakim] 39.879535, -74.531533
                 *      -Pygmy Pines (Dwarf pines, Rt 72 & Rt 539):[pygmy] 39.796125, -74.374702
                 * 
                 *   Pinelands Southeast:
                 *      -Wharton State Forest (31 Batsto rd)(Carranza Memorial, Batsto Village):[wharton] 39.644049, -74.644027
                 *      -Bass River State Park (762 Stage Rd Tuckerton NJ):[bass] 39.620494, -74.424644
                 *      -Tuckerton Seaport:[seaport] 39.601722, -74.342954
                 * 
                 *   Pinelands South:
                 *      -Belleplain State Forest (Woodbine NJ)(Lake Nummy):[nummy] 39.245544, -74.854308
                 *      -Heislerville Wildlife Mgmt Area (Heislerville NJ)(Maurice Lake):[maurice] 39.216284, -75.008239
                 *      -Egg Island Fishland Wildlife Mgmt Area (Downe, NJ):[egg] 39.218481, -75.142900
                 *      -Fortescue Fish & Wildlife Mgmt Area (Downe, NJ):[fish] 39.251414, -75.180815
                 *  
                 */
                $mapurl = "https://www.google.com/maps/embed/v1/";
                $apikey = "AIzaSyACMpziE8owXAlXbhyXyHWgYYwxCCOjLEc";
                $maporigin = "Wyndham Philadelphia - Mount Laurel, New Jersey 73, Mount Laurel, NJ";
                $mapwaypoints = "";
                $mapdest = "Wyndham Philadelphia - Mount Laurel, New Jersey 73, Mount Laurel, NJ";
                $firstWaypoint = true;
                $numOfWaypoints = sizeof($_GET);

                if ($numOfWaypoints > 1) {
                    // Begin building string with origin.
                    $mapurl .= 'directions?key=' . $apikey . '&origin='
                            . $maporigin . '&waypoints=';

                    // Pinelands North waypoints
                    if (!empty($_GET['whitesbog'])) {
                        $mapwaypoints .= '39.882252, -74.511192';
                        $firstWaypoint = false;
                    }
                    if (!empty($_GET['misery'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.921421, -74.524879';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.921421, -74.524879';
                    }
                    if (!empty($_GET['pakim'])) {
                        if ($firstWaypoint) {
                            $mapurl .= '39.879535, -74.531533';
                            $mapwaypoints = false;
                        }
                        $mapwaypoints .= '|39.879535, -74.531533';
                    }
                    if (!empty($_GET['pygmy'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.796125, -74.374702';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.796125, -74.374702';
                    }

                    // Pinelands Southeast waypoints
                    if (!empty($_GET['wharton'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.644049, -74.644027';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.644049, -74.644027';
                    }
                    if (!empty($_GET['bass'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.620494, -74.424644';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.620494, -74.424644';
                    }
                    if (!empty($_GET['seaport'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.601722, -74.342954';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.601722, -74.342954';
                    }

                    // Pinelands South waypoints
                    if (!empty($_GET['nummy'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.245544, -74.854308';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.245544, -74.854308';
                    }
                    if (!empty($_GET['maurice'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.216284, -75.008239';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.216284, -75.008239';
                    }
                    if (!empty($_GET['egg'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.218481, -75.142900';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.218481, -75.142900';
                    }
                    if (!empty($_GET['fish'])) {
                        if ($firstWaypoint) {
                            $mapwaypoints .= '39.251414, -75.180815';
                            $firstWaypoint = false;
                        }
                        $mapwaypoints .= '|39.251414, -75.180815';
                    }

                    // Finish url at the destination (same as origin)
                    echo $mapurl .= $mapwaypoints . "&destination=" . $mapdest;
                } else {
                    // If no points are selected, show default view of NJ.
                    echo $mapurl .= 'place?key=' . $apikey . '&amp;q=New+Jersey';
                }
                ?>">

            </iframe>
            <?php
            // Shows "Take this Tour" button if there is at least one waypoint selected.
            // If the form was reset, the destination remains in the array and counts as
            // a waypoint.  Because of this, $numOfWaypoints > 1 is used as the condition
            // rather than $numOfWaypoints > 0.
            if ($numOfWaypoints > 1) {
                echo'<input type="submit" 
                            name="submit" 
                            value="Take this Tour" 
                            style="width:auto; display: block; margin: 0 auto;" 
                            class="submit-button"
                            onclick="javascript:alert(&#39;This feature is not yet implemented.&#39;)"
                            >' . "\n";
            }
            ?>
        </div>

        <div id="footer">
            Designed and Developed by 
            <a href="http://elvis.rowan.edu/~meyers42/web/hw1/hw1.html" class="fancytxt" target="_blank">
                Chris Meyers</a>
            <p></p>
            Valid:
            <a href="http://validator.w3.org/check/referer" class="fancytxt">HTML5</a>
            &bull;
            <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3" class="fancytxt">
                CSS3</a>
        </div>

    </body>
</html>
