<?php
    $pageTitle = "Fortidsminder";
    include ('../partials/head.php');
    include ('../partials/nav.php');
    
    include ('prettydump.php');
    // include ('../../controllers/kommuneController.php');
    require ('../../models/cURL.php');
    require ('../../models/class_api.php');



    // $page = curlInit("https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde");
    // $undertyper = curlInit("https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde&undertype=" . $selectedUndertype);
    
    // // $kommuner = findKommune($page);
    // ######## Find all names of regions with Fortidsminder ############
    // $kommuneArray = [];
    
    // // Find regions with fortidsminder
    // for ($i = 0; $i < count($page); $i++) {        
        
    //     // declare value of $navne
    //     $navne = $page[$i]["kommuner"][0]["navn"]; 
        
    //     // push $navne to $kommuneArray
    //     $kommuneArray[] = $navne;     
    // }

    // // filter regions from dublicates
    // $kommuner = array_unique($kommuneArray, SORT_STRING );
    // // // print filtered regions
    // // // pre($kommuner);

    $selectedKommune = isset($_POST["selectedKommune"]) ? $_POST["selectedKommune"] : '';
    $selectedUndertype = isset($_POST["selectedUndertype"]) ? $_POST["selectedUndertype"] : '';

    $data = api::loadData();
    $kommuner = api::getKommuner($data);
    $undertyper = api::getKommuneUndertyper($data, $selectedKommune);
    //$undertyper = api::getUndertyper($selectedUndertype);

  
    // pre($kommuner);
    // pre($selectedKommune);

    ###################################################################

    // ######## Find all names of regions with Fortidsminder ############
    // $undertypeArray = [];
    
    // // Find regions with fortidsminder
    // for ($i = 0; $i < count($page); $i++) {        
        
    //     // declare value of $navne
    //     $undertype = $page[$i]["undertype"]; 
        
    //     // push $navne to $kommuneArray
    //     $undertypeArray[] = $undertype;     
    // }

    // // filter regions from dublicates
    // $undertyper = array_unique($undertypeArray, SORT_STRING );
    // // print filtered regions
    // // pre($kommuner);

    ###################################################################
    
    
    
    // pre($selectedKommune);
    // pre($selectedUndertype);



    ######## Match selected kommune with fortidsminder ############
    
    // Find all fortidsminder that matches with selected value
    // for ($i = 0; $i < count($kommuner); $i++) {
    //     // if match, echo matches
    //     if ($kommuner[$i] == $selectedKommune) {   
    //         echo $kommuner[$i] . '<br>';
    //     }
    // }

    foreach($kommuner as $kommune){
        if ($kommune == $selectedKommune) { 
            echo $kommune . '<br>';
        }
    }
    
    ##################################################################
?>

    <div class="container d-flex my-5">
        <div class="row align-items-center">
            <div class="col">
                <h1>Titel til test side</h1> 
                <form action="/pages/views/testside.php" method="POST">
                    <select name="selectedKommune">
                    <?php foreach ($kommuner as $kommune){ ?>
                        <option value="<?= $kommune ?>"> <?= $kommune ?></option>
                    <?php } ?>
                    
                    </select>
                    <select name="selectedUndertype">
                    <?php foreach ($undertyper as $undertype){ ?>
                        <option value="<?= $undertype ?>"> <?= $undertype ?></option>
                    <?php } ?>
                    </select>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>


<?php     
    include ('../partials/footer.php');
