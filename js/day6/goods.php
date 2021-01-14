<?php

// 用户信息入库
echo '<pre>';print_r($_POST);echo '</pre>';

$response = [
    'errno' => 0,
    'msg'   => 'ok'
];

echo json_encode($response);