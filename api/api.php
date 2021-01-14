<?php
    //使用 file_get_contents发送HTTP GET请求
    $cont = file_get_contents("https://devapi.qweather.com/v7/weather/now?location=101010100&key=65dc760b834048798e74d4d777f7ebdb&gzip=n");
    echo $cont;