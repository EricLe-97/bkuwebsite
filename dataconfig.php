<?php

    $get_data = json_decode(file_get_contents("assets/test.json"),true);
    
    $name = "macbook";
    $value = 255;
    echo print_r($get_data,true);

    $get_data[] = array(
        'id' => 123 ,
        'name' => $name,
        'description' => 123,
        'quantity' => 123,
        'path' => 123,
        'price' => 123,

    );

    file_put_contents("assets/test.json",json_encode($get_data,JSON_PRETTY_PRINT));
    // foreach($get_data as $key => $value ){
    //     echo $get_data[$key]['path'];
    //     echo $value['id'];
    // }
?>