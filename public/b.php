<?php



$ch = curl_init();

curl_setopt($ch , CURLOPT_URL , "https://d37sllu4v82hsd.cloudfront.net/20220819TBL");
curl_setopt($ch , CURLOPT_HEADER , false);

curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

$tmp = curl_exec($ch);

print_r($tmp);

curl_close($ch);


?>
