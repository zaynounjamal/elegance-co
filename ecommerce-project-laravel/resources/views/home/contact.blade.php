<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="fashion, elegance, style, contact" />
    <meta name="description" content="Contact Elegance & Co - Get in touch with us" />
    <meta name="author" content="Elegance & Co" />
    <link rel="shortcut icon" href="home/images/favicon.jpeg" type="image/jpeg">
    <title>Contact Us - Elegance & Co</title>
    <link rel="icon" href="home/images/logo-removebg-preview.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .contact-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            text-align: center;
        }
        .contact-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .contact-form button {
            background: #e13f3f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .social-icons a {
            margin: 0 10px;
            font-size: 24px;
            color: #e13f3f;
            transition: 0.3s;
        }
        .social-icons a:hover {
            color: #e13f3f;
        }
        iframe {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
        @include('sweetalert::alert')
    <div class="contact-container">
        <h1>Contact Us</h1>
        <p>Have questions? Get in touch with us!</p>
        <div class="contact-form">
            <form action="{{url('send_message')}}" method="POST">
                @csrf
                <input type="text" placeholder="Your Name" name="name" required>
                <input type="email" placeholder="Your Email" name="email" required>
                <input type="text" placeholder="Subject" name="subject" required>
                <textarea placeholder="Your Message" rows="10" name="message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>

        <h2>Our Contact Details</h2>
        <p><strong>Email:</strong> info@eleganceco.com</p>
        <p><strong>Phone:</strong> +961 76 658 203</p>
        <p><strong>Address:</strong> Downtown Beirut, Lebanon</p>

        <h2>Follow Us</h2>
        <div class="social-icons">
            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fa fa-whatsapp"></i></a>
        </div>

        <h2>Find Us</h2>
        <iframe src="https://www.google.com/maps/embed?..." allowfullscreen></iframe>
    </div>

    @include('home.footer')
    <div class="cpy_">
        <p class="mx-auto">© 2025 All Rights Reserved By <a style="color: red">ELEGANCE & CO</a></p>
    </div>

    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>
    document.addEventListener("DOMContentLoaded", function() {
        let navLinks = document.querySelectorAll(".nav-item .nav-link");

        navLinks.forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add("active");
            }
        });
    });

</body>
</html>
