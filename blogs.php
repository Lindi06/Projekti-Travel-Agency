<?php
session_start();
include 'dbConnect.php';
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\blogRepository.php';

$blogRepository = new blogRepository();
$blogs = $blogRepository->getBlog();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Slider</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .slider-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 100vh;
            overflow: hidden;
            box-sizing: border-box;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(20%) opacity(0.7);
        }

        .nav-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
            z-index: 1;
        }

        button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }

        #name {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 24px;
            text-align: center;
            z-index: 1;
        }

        #paragraph {
            position: absolute;
            bottom: 20%;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 18px;
            text-align: center;
            max-width: 80%;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="slider-container">
        <div class="slider">
            <div class="slide">
                <img src="https://c0.wallpaperflare.com/preview/245/607/781/malaysia-sabah-bajau-malaysia-tourism.jpg" id="image" alt="Slide 1">
                
                <div id="name">RD TRAVEL</div>
                <div id="paragraph">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quibusdam possimus a nisi ipsam saepe nulla ipsum error exercitationem reprehenderit. Ullam, dignissimos doloremque. Asperiores iste odio id minima molestiae ipsam.</p>
                </div>
            </div>

    <div class="nav-buttons">
        <button onclick="prevSlide()"><</button>
        <button onclick="nextSlide()">></button>
    </div>

    <script>

let slides = [<?php
    foreach ($blogs as $blog) {
        echo "{";
        echo "image: '{$blog['photo']}',";
        echo "name: '{$blog['emri']}',";
        echo "paragraph: '{$blog['description']}'";
        echo "},";
    }
?>];

let currentIndex = 0;
const image = document.getElementById('image');
const name = document.getElementById('name');
const paragraph = document.getElementById('paragraph');

function showSlide(index) {
    currentIndex = index;
    const item = slides[currentIndex];
    image.src = item.image;
    name.innerHTML = item.name;
    paragraph.innerHTML = item.paragraph;
}

function nextSlide() {
    if (currentIndex < slides.length - 1) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }
    showSlide(currentIndex);
}

function prevSlide() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = slides.length - 1;
    }
    showSlide(currentIndex);
}

function startSlider() {
    setInterval(function () {
        nextSlide();
    }, 3000);
}


startSlider();


</script>
