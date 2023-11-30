<?php
   $url = "https://jsonplaceholder.typicode.com/users";

   $data_array = array(
'name' => 'Saral',
   'email' => 'sarala@gmail.com',

   );

   $data = http_build_query($data_array);
   $ch = curl_init();

   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

   $resp = curl_exec($ch);

   if($e = curl_error($ch)){
    echo $e;
   }
   else{
    $decode = json_decode($resp, true);
    foreach($decode as $key => $value){
        echo $key. ":" . $value .'<br>';
    }
   }

curl_close($ch);

?>