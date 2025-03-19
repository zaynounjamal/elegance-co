<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="fashion, elegance, style, about us" />
    <meta name="description" content="Learn more about Elegance & Co - Our mission, values, and team." />
    <meta name="author" content="Elegance & Co" />
    <link rel="shortcut icon" href="home/images/favicon.jpeg" type="image/jpeg">
    <title>About Us - Elegance & Co</title>
    <link rel="icon" href="home/images/logo-removebg-preview.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .about-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
            text-align: center;
        }
        .about-title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .about-text {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }
        .team-section {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .team-member {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
        }
        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .social-links a {
            color: #e04040;
            margin: 0 10px;
            font-size: 24px;
        }
        .social-links a:hover {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    <div class="about-container">
        <h1 class="about-title">About Elegance & Co</h1>
        <p class="about-text">Elegance & Co is more than just fashion; it's a lifestyle. Our goal is to bring you the latest trends with a touch of sophistication and timeless beauty.</p>

        <h2>Our Team</h2>
        <div class="team-section">
            <div class="team-member">
                <img src="home/images/testing.webp" alt="Team Member 1">
                <h3>John</h3>
                <p>Founder & CEO</p>
            </div>
            <div class="team-member">
                <img src="home/images/tester.webp" alt="Team Member 2">
                <h3>Jane</h3>
                <p>Creative Director</p>
            </div>
        </div>

        <h2>Follow Us</h2>
        <div class="social-links">
            <a href="https://www.facebook.com/profile.php?id=61563804186535&mibextid=LQQJ4d" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/the_z_agency?igsh=eTg2YXp6Yno3eTQ4" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://wa.me/+96176658203" target="_blank"><i class="fa fa-whatsapp"></i></a>
        </div>
    </div>

    @include('home.footer')
    <div class="cpy_">
        <p class="mx-auto">© 2025 All Rights Reserved By <a style="color: red">ELEGANCE & CO</a></p>
    </div>

    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let navLinks = document.querySelectorAll(".nav-item .nav-link");

            navLinks.forEach(link => {
                if (link.href === window.location.href) {
                    link.classList.add("active");
                }
            });
        });
        </script>
</body>

</html>
