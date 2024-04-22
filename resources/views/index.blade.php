<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icon.png" type="image/x-icon">
    <title>EtecTunes</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        #video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1000;
        }
        #content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 1000;
        }
        #login-btn, #register-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <video autoplay muted loop id="video-background">
        <source src="assets/video.mp4" type="video/mp4">
    </video>
    <div id="content">
        <a href="{{ route('login') }}" id="login-btn">Logar</a>
        <a href="{{ route('register') }}" id="register-btn">Criar Conta</a>
    </div>
</body>
</html>