<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New homepage</title>
    <link rel="stylesheet" href="./common.css">
    <link rel="stylesheet" href="./slide.css">
</head>
<body>
    <div id="header-box">
        <div id="header-box-text"><a href="./index.php">Home</a></div>
    </div>
    <div id="menu-box">
        <ul id="menu">
            <li class="main-menu">
                1번
                <ul>
                    <li>1번. 1번</li>
                    <li>1번. 2번</li>
                    <li>1번. 3번</li>
                </ul>
            </li>
            <li class="main-menu">2번</li>
            <li class="main-menu">3번</li>
        </ul>
    </div>
    <div id="slide-box-wrap">
        <div id="slide-box">
            <img src="map.png" alt="">
            <img src="map.png" alt="">
            <img src="map.png" alt="">
        </div>
        <button type="button" id="slide-left-btn" class="slide-btn" onclick="backSlide()">이전</button>
        <button type="button" id="slide-right-btn" class="slide-btn" onclick="nextSlide()">다음</button>

        <div id="slide-pos-box">
            <button class="slide-box-btn active" type="button" onclick="changeSlidePos(0)">1</button>
            <button class="slide-box-btn" type="button" onclick="changeSlidePos(1)">2</button>
            <button class="slide-box-btn" type="button" onclick="changeSlidePos(2)">3</button>
        </div>
    </div>