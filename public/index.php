<?php
?>
<html>
    <head>
        <title>Mike Welsh - Kytschi</title>
        <link rel="icon" href="/assets/favicon.ico" sizes="64x64">
        <style>
            @font-face {
                font-family: 'body';
                src: url("/assets/Minecraft.ttf") format("truetype");
            }

            html, body {
                padding: 0;
                margin: 0;
                background-color: #686e81;
                min-height: 900px;
                font-family: 'body', sans-serif;
                color:#55343F;
            }

            a {
                display: inline-block;
                padding-top: 35px;
                font-size: 18pt;
                color: #fff;
                text-align: center;
                width: 300px;
                height: 104px;
                text-decoration: none;
                margin-right: 60px;
                background-image: url("/assets/button.png");
                background-repeat: no-repeat;
            }
            .container {
                max-width: 1240px;
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
                margin-top: 20px;
            }
            h1, h2 {
                font-family: 'body', sans-serif;           
            }
            h1 {
                color: #93EEFF;
                font-size: 48pt;
                margin: 0;
            }
            h2 {
                color: #fff;
                font-size: 36pt;
                margin: 0;
            }
            p {
                text-align: center;
            }
            table {
                width: 100%;
            }
            table td {
                padding: 0;
                vertical-align: top;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Kytschi</h1>
            <h2>Where do you want to go?</h2>
            <img src="/assets/illustration-gustavo-viselner-03.jpg">
            <p>
                <a href="https://past.kytschi.com">The Past</a>
                <a href="https://future.kytschi.com">The Future</a>
            </p>
            <small>art by Gustavo Viselner</small>
        </div>
        <audio controls autoplay>
            <source src="/assets/gigawatts.mp3" type="audio/mpeg">
            Your browser can't play the background tune :-(
        </audio> 
    </body>
</html>