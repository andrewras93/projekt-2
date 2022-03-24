<?php
    $pageTitle = "Fortidsminder";
    include ('../partials/head.php');
    include ('../partials/nav.php');

    include ('prettydump.php');
    // include ('../../controllers/kommuneController.php');
    require ('../../models/cURL.php');


    $page = curlInit("https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde");
    $undertyper = curlInit("https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde&undertype=");
    
    // $kommuner = findKommune($page);
    ######## Find all names of regions with Fortidsminder ############
    $kommuneArray = [];
    
    // Find regions with fortidsminder
    for ($i = 0; $i < count($page); $i++) {        
        
        // declare value of $navne
        $navne = $page[$i]["kommuner"][0]["navn"]; 
        
        // push $navne to $kommuneArray
        $kommuneArray[] = $navne;     
    }

    // filter regions from dublicates
    $kommuner = array_unique($kommuneArray, SORT_STRING );
    // // print filtered regions
    // // pre($kommuner);

    ###################################################################

    ######## Find all names of regions with Fortidsminder ############
    $undertypeArray = [];
    
    // Find regions with fortidsminder
    for ($i = 0; $i < count($page); $i++) {        
        
        // declare value of $navne
        $undertype = $page[$i]["undertype"]; 
        
        // push $navne to $kommuneArray
        $undertypeArray[] = $undertype;     
    }

    // filter regions from dublicates
    $undertyper = array_unique($undertypeArray, SORT_STRING );
    // print filtered regions
    // pre($kommuner);

    ###################################################################

    ####################
    
    
    #################### 
    
    $selectedKommune = isset($_POST["selectedKommune"]) ? $_POST["selectedKommune"] : '';
    $selectedUndertype = isset($_POST["selectedUndertype"]) ? $_POST["selectedUndertype"] : '';
    $selectedMatch = isset($_POST["primærtnavn"]) ? $_POST["primærtnavn"] : '';

    //pre($selectedMatch);
    //pre($selectedKommune);
    //pre($selectedUndertype);
    
    //pre($selectedKommune);
    //pre($selectedUndertype);
    
    ##################################################################
?>
    <h3 class="text-center">Her finder du fortidsminder i landets regioner</h3>
    <div class="container d-flex my-5">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="dropdown">
                    <form action="" method="POST">
                        <h5>Vælg region</h5>
                        <select name="selectedKommune" class="mb-3 p-1 w-75">
                            <option selected><?= $selectedKommune ? $selectedKommune : 'Region navn' ?></option>
                            <!-- foreach funktion -->
                            <?php foreach ($kommuner as $kommune){ ?>
                                <option value="<?= $kommune ?>"> <?= $kommune ?></option>
                            <?php } ?>
                        </select>
                        <h5>Vælg undertype</h5>
                        <select name="selectedUndertype" class="mb-3 p-1 w-75">
                            <option selected><?= $selectedUndertype ? $selectedUndertype : 'Region navn' ?></option>
                            <!-- foreach funktion -->
                            <?php foreach ($undertyper as $undertype){ ?>
                                <option value="<?= $undertype ?>"> <?= $undertype ?></option>
                            <?php } ?>
                        </select>
                        <h5>Angiv radius</h5>
                        <select class="mb-3 p-1 w-75">
                            <option selected>Indtast værdi</option>
                            <!-- foreach funktion -->
                            <option value="3">Three</option>
                        </select>
                        <h5>Vælg forplejningsmuligheder</h5>
                        <select class="mb-3 me-3 p-1 w-75">
                            <option selected>Vælg forplejning i omregn</option>
                            <!-- foreach funktion -->
                            <option value="3">Three</option>
                        </select>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>

            <div class="col-4">
                <h5>Liste over matches</h5>
                <div class="border">
                    <form action="" method="POST">
                        <?php
                            for ($i = 0; $i < count($page); $i++) {
                                // if match, echo matches
                                if ($page[$i]["kommuner"][0]["navn"] == $selectedKommune && $page[$i]["undertype"] == $selectedUndertype) {
                                    echo '<input value="' . $page[$i]["primærtnavn"] . '"class="m-2" type="radio" name="primærtnavn">' . '<label for="idTest">' . $page[$i]["primærtnavn"] . '</input>' . '</label>' . '<br>';                                
                                }
                            }
                        ?>
                        <input type="submit">
                    </form>
                </div>
            </div>
            <div class="col-4">
                <h5>Specifikke detajler</h5>
                <div class="border">
                    <?php
                        if (!empty($selectedMatch)) {
                            for ($i = 0; $i < count($page); $i++) {
                                // if match, echo matches
                                if ($page[$i]["primærtnavn"] == $selectedMatch) {
                                    echo '<b>' . $page[$i]["primærtnavn"] . ':' . '</b>' . '<br>';
                                    echo '<p id="lng" >' . $page[$i]["visueltcenter"][0] . '</p><br>';
                                    echo '<p id="lat" >' . $page[$i]["visueltcenter"][1] . '</p><br>';
                                }
                            }
                        }
                    ?>
                    <div id="map"></div>

                    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
                    <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly&channel=2"
                    async
                    ></script>
                    <script>
                        let lng = document.getElementById("lng");
                        let lat = document.getElementById("lat");
                        // Initialize and add the map
                        function initMap() {
                        // The location of Uluru
                        const uluru = { lat: 55.55039929, lng: 8.17221991 };
                        // The map, centered at Uluru
                        const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 15,
                            center: uluru,
                        });
                        // The marker, positioned at Uluru
                        const marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                        });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>


<?php     
    include ('../partials/footer.php');
