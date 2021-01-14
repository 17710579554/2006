<?php
include "pdo.php";

$user_name = $_POST['username'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

//判断密码是否一致
if($pass1 != $pass2){
    $response =[
        'error' =>4000001,
        'msg'=> '密码不一致'
    ];
    die(json_encode($response));
}
// 验证密码长度 > 6
if( strlen($pass1) < 6)
{
    $response = [
        'errno' => 400002,
        'msg'   => '密码长度不够'
    ];

    die( json_encode($response) );
}

// 验证用户名是否存在
$pdo = getPdo();
$sql = "select * from p_users where user_name='$user_name'";
$res = $pdo->query($sql);
$data = $res->fetch(PDO::FETCH_ASSOC);

if($data)
{
    $response = [
        'errno' => 400003,
        'msg'   => '已存在'
    ];

    die( json_encode($response) );
}

// 用户信息入库
//生成用户密码
$password = password_hash($pass1,PASSWORD_BCRYPT);

$sql = "insert into p_users(user_name,mobile,email,password) value ('$user_name','$mobile','$email','$password')";

$res = $pdo->exec($sql);
$id = $pdo->lastInsertId();
if($res){
    $response = [
        'errno' => 0,
        'msg'   => 'ok'
    ];

}else{
    $response = [
        'errno' => 500,
        'msg'   => '注册失败，请重试'
    ];

}




echo json_encode($response);

