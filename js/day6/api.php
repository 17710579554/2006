<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="goods.php" method="post">
    用户名： <input type="text" name="username"> <br>
    手机号: <input type="text" name="mobile"> <br>
    Email: <input type="email" name="email"> <br>
    密码： <input type="password" name="pass1" autocomplete=""> <br>
    确认密码: <input type="password" name="pass2" autocomplete=""> <br>
    <input type="submit" value="注册">
</form>

<script>

    document.getElementById("btn1")     //
    var f = document.forms[0]
    f.addEventListener('submit',function(e){
        e.preventDefault()      //阻止表单提交的默认行为
        var username = f.username.value  //获取 username的input值
        var mobile = f.mobile.value         //获取手机号
        var email = f.email.value       //获取 email
        var pass1 = f.pass1.value       //获取密码
        var pass2 = f.pass2.value       //获取确认密码

        //通过Ajax将表单的数据发送给服务器
        // 1 实例化
        var xhr = new XMLHttpRequest()

        // 2 监听 readyState == 4
        xhr.onreadystatechange = function(){
            if(xhr.readyState==4 && xhr.status==200)
            {
                //接收服务器的响应数据
                var json_str = xhr.responseText
                console.log(json_str)

                var data = JSON.parse(json_str)
                //判断接口返回的状态码
                if(data.errno==0){      //成功
                    alert("OK")
                }else{
                    alert("失败")
                }

            }
        }

        // 3 open
        xhr.open("POST","goods.php")


        // 4 send
        //var inputs = f.elements         //获取所有input
        var inputs = f.querySelectorAll("input")
        console.log(111111111111)
        console.log(inputs)

        var form_param = ""
        for(var i=0;i<inputs.length;i++)
        {
            if(inputs[i].getAttribute("name")===null ){
                continue;
            }

            console.log(inputs[i].getAttribute("name"))
            console.log(inputs[i].value)


            form_param += inputs[i].getAttribute("name") + "=" + inputs[i].value + "&"
        }
        console.log(form_param)

        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded")
        xhr.send("n="+ username + "&m=" + mobile)

    })




</script>
</body>
</html>