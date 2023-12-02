<!DOCTYPE html>
<html lang="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('shauanlogin/style.css')}}">
    <title>shayan Login</title>
</head>
<body>
    <div class="circle-1"></div>
    <div class="login-page">
        <form action="" class="form-menu">
            <h1> برنامه ریز حرفه ای </h1>
            <div class="form-group">
                <label>نام کاربری</label>
                <input dir="rtl" type="text">
            </div>
            <div class="form-group">
                <label>رمز ورود</label>
                <input type="password" dir="rtl">
            </div>
            <div class="button-form">
                <button>ورود</button>
            </div>
            <div class="botton-form">
                <a href="">
                    ساخت اکانت جدید
                </a>
            </div>
        </form>
        <div class="login-img">
            <img src="{{asset('shauanlogin/img/IMG_7484.jpg')}}" width="300" height="550" alt="">
        </div>
    </div>
</body>
</html>