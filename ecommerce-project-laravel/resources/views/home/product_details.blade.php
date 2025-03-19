<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="home/images/favicon.jpeg" type="">
    <title>Elegance&Co</title>
    <link rel="icon" href="home/images/logo-removebg-preview.png" type="image/png">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style type="text/css">
        .product-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* Align at the top */
            min-height: 80vh;
            /* Control the height */
            padding: 20px;
            margin-top: 30px;
        }

        .product-box {
            background: linear-gradient(to bottom, #ffffff, #f8f8f8);
            border-radius: 12px;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 480px;
            /* Limit the width */
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .product-box:hover {
            transform: translateY(-6px);
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
        }

        .product-box .img-box {
            text-align: center;
            margin-bottom: 20px;
        }

        .product-box .img-box img {
            width: 100%;
            max-width: 250px;
            /* Slightly smaller size */
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .product-box .detail-box h5 {
            font-size: 22px;
            font-weight: 700;
            color: #222;
            margin-bottom: 12px;
        }

        .product-box .detail-box h6 {
            font-size: 16px;
            font-weight: 500;
            color: #444;
            margin-bottom: 8px;
        }

        .product-box .detail-box h6[style*="color: red"] {
            font-size: 18px;
            font-weight: 700;
            color: red;
        }

        .product-box .detail-box h6[style*="color: blue"] {
            font-size: 16px;
            font-weight: 600;
            color: blue;
        }

        .cart-input-group {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .cart-quantity {
            width: 60px;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .cart-button {
            background-color: #1e90ff;
            color: white;
            padding: 8px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .cart-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .product-container {
                padding: 10px;
            }

            .product-box {
                width: 90%;
                padding: 15px;
            }

            .product-box .detail-box h5 {
                font-size: 20px;
            }

            .product-box .detail-box h6 {
                font-size: 14px;
            }

            .cart-quantity {
                width: 50px;
                font-size: 14px;
            }

            .cart-button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
        @if (session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('success') }}
            </div>
        @endif
        @include('sweetalert::alert')
        <div class="product-container">
            <div class="product-box">
                <div class="img-box">
                    <img src="{{ asset('product/' . $product->image) }}" alt="">
                </div>
                <div class="detail-box">
                    <h5>
                        {{ $product->title }}
                    </h5>
                    @if ($product->discount != null)
                        <h6 style="color: red;">
                            Discount Price
                            <br>
                            ${{ $product->discount }}
                        </h6>
                        <h6 style="text-decoration: line-through; color:blue">
                            Price
                            <br>
                            ${{ $product->price }}
                        </h6>
                    @else
                        <h6>
                            Price
                            <br>
                            ${{ $product->price }}
                        </h6>
                    @endif
                    <h6>Product Category :{{ $product->category }}</h6>
                    <h6>Product Details :{{ $product->description }}</h6>
                    <h6>Available Quantity :{{ $product->quantity }}</h6>
                    <form action="{{ url('add_cart', $product->id) }}" method="POST" class="cart-form">
                        @csrf
                        <div class="cart-input-group">
                            <input type="number" name="quantity" min="1" value="1" class="cart-quantity">
                            <input type="submit" value="Add to Cart" class="cart-button">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2025 All Rights Reserved By <a style="color: red">ELEGANCE & CO</a><br></p>
        </div>
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper jhome/s -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrahome/p js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom jhome/s -->
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
