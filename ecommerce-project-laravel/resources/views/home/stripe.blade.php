<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <title>Card Payment</title>
    <link rel="icon" href="home/images/logo-removebg-preview.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="home/images/favicon.jpeg" type="">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style type="text/css">
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .hero_area {
            padding: 20px 0;
        }

        .container {
            margin-top: 50px;
        }

        /* Header styling */
        h1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        /* Success message */
        .alert {
            margin-bottom: 20px;
            font-size: 16px;
        }

        /* Input fields */
        .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        #card-element {
            height: 50px;
            padding-top: 16px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        /* Button styling */
        #pay-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 12px 15px;
            font-size: 16px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        #pay-btn:hover {
            background-color: #218838;
        }

        #pay-btn:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }

        .center {
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="hero_area">
        @include('home.header')

        <div class="container">
            <h1 class="center">Pay Using Your Card - Total Amount ${{ $totalprice }}</h1>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card mt-5">
                        <h3 class="card-header p-3">Payment Details:</h3>
                        <div class="card-body">

                            @session('success')
                                <div class="alert alert-success" role="alert">
                                    {{ $value }}
                                </div>
                            @endsession

                            <form id='checkout-form' method='post' action="{{ route('stripe.post', $totalprice) }}">
                                @csrf

                                <strong>Name:</strong>
                                <input type="input" class="form-control" name="name" placeholder="Enter Name">

                                <input type='hidden' name='stripeToken' id='stripe-token-id'>
                                <br>
                                <div id="card-element" class="form-control"></div>
                                <button id='pay-btn' class="btn btn-success mt-3" type="button"
                                    style="margin-top: 20px; width: 100%;padding: 7px;" onclick="createToken()">PAY
                                    ${{ $totalprice }}
                                </button>
                                <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var stripe = Stripe('{{ env('STRIPE_KEY') }}')
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    /*------------------------------------------
    --------------------------------------------
    Create Token Code
    --------------------------------------------
    --------------------------------------------*/
    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {

            if (typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }

            /* creating token success */
            if (typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper jhome/s -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrahome/p js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom jhome/s -->
<script src="home/js/custom.js"></script>

</html>
