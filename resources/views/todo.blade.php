<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="SabzLearn TodoList" />
    <meta name="author" content="SabzLearn" />
    <title></title>

    <!-- Bootstrap -->
    <link href="{{asset('todo/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('todo/css/style.css')}}" rel="stylesheet" />
  </head>
  <body>
    <div class="container" dir="rtl">
      <div class="profile-container">
      <img src="{{asset('todo/img/img-1.jpg')}}" class="profile-img" alt="">
      <h3 class="text-center">شایان رستم وند</h3>
    </div>
    
      <div class="form-group" dir="rtl">
        <label for="itemInput"  class="add-lable">+ اضافه کردن آیتم جدید</label>
        <input type="text" dir="rtl" class="form-control" name="" id="itemInput" />

        <button id="addButton" class="btn btn-primary">اضافه شود</button>
        <button id="clearButton" class="btn btn-danger">پاکسازی لیست</button>
      </div>
      <h3>لیست برنامه ها</h3>
      <ul id="todoList">
        
      </ul>
    </div>

    <script type="text/javascript" src="{{asset('todo/js/app.js')}}"></script>
  </body>
</html>
