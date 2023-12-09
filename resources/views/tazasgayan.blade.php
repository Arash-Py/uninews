<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('tazashayan/style.css')}}">
    <title>Document</title>
</head>
<body>
    <header class="header-cpontainer">
        <div class="section-nav">
        <div class="logo-nav">
            <a href="#">
                Learning
            </a>
        </div>
        <nav ">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">About Us</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Courses</a>
            </li>
            <li>
                <a href="#">Blog</a>
            </li>
            <li>
                <a href="#" class="active">Register</a>
            </li>

        </nav>
        </div>
        <div class="section-content-header">
            <div class="left-content-header">
                <h1>
                  <span> Best Learning</span>
                    <br>
                    <span>Education Platform</span>
                    <br>
                    <span>in The World</span>
                </h1>
                <p>
                    Shayan Rostam Vand is one of the best instructors in the front sector
                    You can learn web development with them in the best way
                </p>
                <form action="">
                    <input type="text" placeholder="What do you want to learn">
                    <button>
                        Search Courses
                    </button>
                </form>
            </div>
            <div class="right-content-header">
                <img src="{{asset('tazashayan/img/header-1.jpg')}}" alt="">
                <img src="{{asset('tazashayan/img/header-2.jpg')}}" alt="">
                <div class="content-img-text">
                    <ul>
                        <li>Get 30% off on every 1st month</li>
                        <li>Expert teachers</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
