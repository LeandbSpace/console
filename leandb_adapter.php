<?php

    function httpPost($url, $data) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    $q = json_encode( $_POST['cmd'] );

    // fix ip address issue
    if( file_get_contents('./inc/ip.db') != $_POST['ip'] ){
        // Update ip address file
        file_put_contents( './inc/ip.db', $_POST['ip'] );
    }

    $url = "http://".$_POST['ip']."/query";

    $response = httpPost( $url, [ 'cmd' => $q ] );

    print_r( $response );

    // return json_decode($response);