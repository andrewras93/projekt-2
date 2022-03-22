<?php
    
    function curlInit($url){
        // Declare URL variable with API URL
        $url = $url;
        // Initiate the connection
        $cn = curl_init($url);

        // Use GET
        curl_setopt($cn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cn, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');

        // Execute
        $page = curl_exec($cn);

        // Decode string to json
        $page = json_decode($page, true);

        return $page;
    }