<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
<script>
    //实例化 XHR
    var xhr = new XMLHttpRequest()

    //监听readystate
    xhr.onreadystatechange =function () {
        console.log(xhr.readyState)
        if(xhr.readyState === xhr.DONE){
            if(xhr.status === 200){
                var json_str =xhr.responseText
                console.log(obj)
                console.log(obj.name)
            }else{
                alert('xxxxxx')
            }
        }
    }
</script>
</html>