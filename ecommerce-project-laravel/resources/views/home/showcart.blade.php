<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Elegance&Co</title>
    <link rel="icon" href="home/images/logo-removebg-preview.png" type="image/png">
    <link rel="shortcut icon" href="home/images/favicon.jpeg" type="">
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />

    <style>
        .center {
            width: 50%;
            margin: auto;
        }

        .total_deg {
            font-size: 20px;
            padding: 40px;
            text-align: center;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .modal-actions button {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')

        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
        @endif
        @include('sweetalert::alert')
        <div class="center">
            <table class="cart-table">
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php $totalprice = 0; ?>
                @foreach ($cart as $carts)
                <tr>
                    <td>{{ $carts->product_title }}</td>
                    <td>{{ $carts->quantity }}</td>
                    <td>{{ $carts->price }}</td>
                    <td><img src="/product/{{ $carts->image }}" alt="Product Image"></td>
                    <td>
                        <button onclick="openRemoveModal({{ $carts->id }})" class="remove-btn btn btn-danger">Remove</button>
                    </td>
                </tr>
                <?php $totalprice += $carts->price; ?>
                @endforeach
            </table>

            <h1 class="total_deg">Total Price: {{ $totalprice }}$</h1>

            <div class="total_deg">
                <h1 style="font-size:25px; padding-bottom: 15px;">Proceed to Order</h1>
                <a href="{{ url('cash_order') }}" onclick="return confirm('Are you sure you want to proceed with payment?')" class="btn btn-danger">Cash On Delivery</a>
                <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="removeConfirmationModal" class="modal">
            <div class="modal-content">
                <h2>Confirm Removal</h2>
                <p>Are you sure you want to remove this product from the cart?</p>
                <div class="modal-actions">
                    <form id="removeForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Remove</button>
                    </form>
                    <button onclick="closeRemoveModal()" class="btn btn-success">Cancel</button>
                </div>
            </div>
        </div>

        <script src="home/js/jquery-3.4.1.min.js"></script>
        <script src="home/js/popper.min.js"></script>
        <script src="home/js/bootstrap.js"></script>

        <script>
            function openRemoveModal(productId) {
                let form = document.getElementById('removeForm');
                form.action = "{{ url('remove_cart') }}/" + productId;
                document.getElementById('removeConfirmationModal').style.display = 'flex';
            }

            function closeRemoveModal() {
                document.getElementById('removeConfirmationModal').style.display = 'none';
            }
        </script>
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
    </div>
</body>

</html>
