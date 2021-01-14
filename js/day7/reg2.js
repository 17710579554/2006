function ajax(param,node)
{
    // 1 实例化 xhr
    var xhr = new XMLHttpRequest()
    // 2 监听 readyState
    xhr.onreadystatechange = function(){
        if(xhr.readyState==4 && xhr.status==200)
        {
            var json_str = xhr.responseText
            console.log(json_str)
            //判断错误码
            var json_obj = JSON.parse(json_str)
            if(json_obj.errno>0)
            {
                alert(json_obj.msg)
                node.value = ""
                node.focus()
            }
        }
    }
    // 3 open
    xhr.open("GET","check.php?name="+ param );
    // 4 send
    xhr.send()
}
// mobile
document.getElementById("email").addEventListener('blur',function(){
    if(this.value == "")
    {
        return
    }
    var email = this.value
    ajax(email,this)
})
// mobile
document.getElementById("mobile").addEventListener('blur',function(){
    if(this.value == "")
    {
        return
    }
    var mobile = this.value
    ajax(mobile,this)
})
// username
document.getElementById("username").addEventListener('blur',function(){
    var username = this.value
    if(username=="")
    {
        return
    }
    ajax(username,this)
})
