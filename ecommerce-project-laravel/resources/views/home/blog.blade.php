<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="fashion, elegance, style, blog" />
    <meta name="description" content="Elegance & Co Blog - Stay updated with the latest fashion trends" />
    <meta name="author" content="Elegance & Co" />
    <link rel="shortcut icon" href="home/images/favicon.jpeg" type="image/jpeg">
    <title>Elegance & Co - Blog</title>
    <link rel="icon" href="home/images/logo-removebg-preview.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .blog-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
        }
        .blog-title {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .search-bar {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-bar input {
            width: 60%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .featured-post {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        .blog-post {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .blog-post:hover {
            transform: translateY(-5px);
        }
        .blog-post img {
            width: 200px;
            height: 150px;
            border-radius: 10px;
            margin-right: 20px;
        }
        .blog-post h3 {
            font-size: 22px;
            margin-bottom: 10px;
        }
        .blog-post p {
            font-size: 16px;
            color: #555;
        }
        .read-more {
            color: #d63384;
            font-weight: bold;
            text-decoration: none;
        }
        .read-more:hover {
            text-decoration: underline;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            padding: 8px 12px;
            margin: 0 5px;
            border: 1px solid #d63384;
            color: #d63384;
            border-radius: 5px;
            text-decoration: none;
        }
        .pagination a:hover {
            background: #d63384;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    <div class="blog-container">
        <h1 class="blog-title">Elegance & Co Blog</h1>

        <div class="search-bar">
            <input type="text" placeholder="Search blog posts...">
        </div>

        <div class="featured-post">
            <h2>Featured Article: The Future of Fashion</h2>
            <p>Discover how AI and sustainability are shaping the fashion industry.</p>
            <a href="#" class="read-more">Read More</a>
        </div>

        <div class="blog-post">
            <img src="home/images/Our-Ultimate-List-101-Fashion-Blog-Post-Ideas-img1.jpg" alt="Fashion Trends">
            <div>
                <h3>Latest Fashion Trends for 2025</h3>
                <p>Discover the hottest fashion trends coming in 2025 and how to style them effortlessly.</p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>
        <div class="blog-post">
            <img src="home/images/blog2.jpg" alt="Sustainable Fashion">
            <div>
                <h3>The Rise of Sustainable Fashion</h3>
                <p>Learn about eco-friendly materials and ethical fashion choices that help save the planet.</p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>
        <div class="blog-post">
            <img src="home/images/blog3.jpg" alt="Wardrobe Essentials">
            <div>
                <h3>10 Must-Have Wardrobe Essentials</h3>
                <p>Upgrade your wardrobe with timeless pieces that never go out of style.</p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>

        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">&raquo;</a>
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
