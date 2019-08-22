function login()
{
    var loginurl = "http://bootstrap/api/index.php/login/login";
    var username="123";
    var password="123";

    if(username==""||password=="")
    {
        alert("用户名或密码为空！");
        return;
    }
    $.ajax({
        data:{username:username,password:password},
        type:"POST",
        url:"../api/index.php/login/login",
        error:function(msg){ //处理出错的信息
            var errormessage="再试一次";
            $(".loginerror").html(errormessage);
        },
        success:function(msg){  //处理正确时的信息
            //alert("success" + msg)
            if(msg!=''){
                var errormessage="登录成功";
                $(".loginerror").html(errormessage);
            }else{
                var errormessage="用户名或密码错误";
                $(".loginerror").html(errormessage);
            }
        }
         
    });
}
