<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/mylogo.png" />
    <title>Document</title>
    <style>
        body {
            font-family: "Roboto", sans-serif;
            padding: 0;
            margin: 0;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('../images/home/hero.jpg') no-repeat center fixed;     
            background-size: cover;
        }

        .cookiesContent {
            width: 320px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            color: #000;
            text-align: center;
            border-radius: 20px;
            padding: 30px 30px 70px;
        }

        button.close {
            width: 30px;
            font-size: 20px;
            color: #c0c5cb;
            align-self: flex-end;
            background-color: transparent;
            border: none;
            margin-bottom: 10px;
        }

        img {
            width: 82px;
            margin-bottom: 15px;
        }

        p {
            margin-bottom: 40px;
            font-size: 18px;
        }

        button.accept {
            background-color: #45a049;
            border: none;
            border-radius: 5px;
            width: 200px;
            padding: 14px;
            font-size: 16px;
            color: white;
            box-shadow: 0px 6px 18px -5px rgba(237, 103, 85, 1);
        }
    </style>
</head>

<body>
    <form action="../php/index.php" method="get">
        <div class="container">
            <div class="cookiesContent" id="cookiesPopup">
                <button class="close">✖</button>
                <img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="cookies-img" />
                <p>We use cookies on your website to give you the most relevant by remembering your preferences and repeat visits. <br><br>By clicking <b>“Accept Cookies”</b>, you consent to the use of ALL the cookies.</p>
                <button class="accept">Accept Cookies!</button>
            </div>
        </div>
    </form>
</body>

</html>