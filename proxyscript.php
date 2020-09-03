<?php
    header("Access-Control-Allow-Origin: *");

    echo get_page($_GET['url']);
    //echo get_page("http://www.google.com");
    function get_page($url){
        
        $proxy = 'http://tor.dastpour.ge:9050';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5 );
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        
        return $data;
    }


?>
