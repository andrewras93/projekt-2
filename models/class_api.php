<?php 

    class api{

        public static function loadData(){
            return curlInit("https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde");

        }
        
        public static function getKommuner($page){
            
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
            return $kommuner;
        }

        


        public static function getKommuneUndertyper($page, $kommune){
            
            
            $undertypeArray = [];
    
            // Find regions with fortidsminder
            for ($i = 0; $i < count($page); $i++) {        
                
                // declare value of $navne
                $navn = $page[$i]["kommuner"][0]["navn"]; 
                if ($kommune == $navn){
                    $undertypeArray[] = $page[$i]["undertype"];  
                }
                 
            }

            // filter regions from dublicates
            $undertyper = array_unique($undertypeArray, SORT_STRING );
            // // print filtered regions
            // // pre($kommuner);
            return $undertyper;
        
        }
        
        
        public static function getUndertyper($page, $selectedUndertype){
            $page = curlInit("https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde&undertype=" . $selectedUndertype);
            
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
            // // print filtered regions
            // // pre($kommuner);
            return $undertyper;
        }
    }