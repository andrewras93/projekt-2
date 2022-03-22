<?php
    
    include ('../../models/cURL.php');

    
    ## Find all names of regions with Fortidsminder ##
    function findKommune($page){
        
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
        return $kommuner;
        // print filtered regions
        // pre($kommuner);
    }
    