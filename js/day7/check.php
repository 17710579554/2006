<?php
//验证

include "pdo.php";

$pdo = getPdo();

$username = $_GET['name'];

//查询
$sql = "select * from p_users where user_name='{$username}' or mobile='{$username}' or email='{$username}'";
$res = $pdo->query($sql);
$data = $res->fetch(PDO::FETCH_ASSOC);

if($data)
{
    $response = [
        'errno' => 40020,
        'msg'   => "用户名已存在"
    ];
}else{
    $response = [
        'errno' => 0,
        'msg'   => "ok"
    ];
}




echo json_encode($response);