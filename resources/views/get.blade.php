<?php
    function eksekusi_get($url){
        $header = array(
            "Content-Type: application/json"
        );
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST  ,'GET');        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
         
        $returned =  curl_exec($ch);
         
        return($returned);
    }
     
    $url="http://localhost:8000/api/pegawai";//merupakan url rest api server untuk method get
    $curl=eksekusi_get($url);
    $rest=json_decode($curl);
     
    foreach($rest as $b => $val){
        echo "Nama : ".$rest[$b]->pegawai->name."<br>";
        echo "Alamat : ".$rest[$b]->pegawai->address."<br>";
        echo "No Urut : ".$rest[$b]->pegawai->no_reg."<br>";
    }
 
?>