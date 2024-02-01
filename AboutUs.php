<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            background-color: rgba(173, 216, 230, 0.3);
            margin: 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .about-us {
            width: 80%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .about-us-1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .text {
            padding: 0 20px;
        }

        .text h1 {
            color: #2980b9;
            font-size: 2em;
            margin-bottom: 20px;
        }

        .text p {
            color: #333;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .text a {
            background-color: #2980b9;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .text a:hover {
            background-color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="about-us">
            <div class="about-us-1">
                <div class="text">
                    <h1>ABOUT US</h1>
                    <p>Since 1975, RD TRAVEL has been focused on bringing our customers the best in esteem and quality travel arrangements. We are passionate about travel and sharing the world’s wonders on the leisure travel side, and providing corporate travelers hi-touch services to facilitate their business travel needs.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
