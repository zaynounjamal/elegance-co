<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 16px 24px;
            text-align: left;
            border-bottom: 1px solid #e2e2e2;
            font-size: 16px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        td img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Optional: Style the container */
        .hero_area {
            padding: 20px;
            background-color: #f9f9f9;
        }

        /* Add some spacing around the table and header */
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        table td,
        table th {
            vertical-align: middle;
        }

        /* Add a subtle shadow effect to table rows */
        tr {
            transition: background-color 0.3s ease;
        }

        td img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
        }

        /* Modal Background */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        /* Modal Box */
        .modal-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            max-width: 80%;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Modal Title */
        .modal-box h2 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #333;
        }

        /* Modal Buttons */
        .modal-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-confirm {
            background: #d9534f;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-confirm:hover {
            background: #c9302c;
        }

        .btn-cancel {
            background: #5bc0de;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-cancel:hover {
            background: #31b0d5;
        }

        /* Show Modal */
        .modal-overlay.active {
            visibility: visible;
            opacity: 1;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
        <div>
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                @foreach ($order as $orders)
                    <tr>
                        <td>{{ $orders->product_title }}</td>
                        <td>{{ $orders->quantity }}</td>
                        <td>{{ $orders->price }}</td>
                        <td>{{ $orders->payment_status }}</td>
                        <td>{{ $orders->delivery_status }}</td>
                        <td><img src="product/{{ $orders->image }}" alt="">
                        <td>
                            @if($orders->delivery_status=='processing')
                            <form action="{{ url('cancel_order', $orders->id) }}" method="POST" class="cancel-order-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger cancel-order-btn">Cancel Order</button>
                            </form>
                            @else
                            <p style="color: green;">Not Allowed</p>
                            @endif
                        </td>

                        </td>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- Confirmation Modal -->
        <div class="modal-overlay" id="confirmationModal">
            <div class="modal-box">
                <h2>Are you sure you want to cancel this order?</h2>
                <div class="modal-buttons">
                    <button class="btn-confirm" id="confirmDelete">Yes, Cancel</button>
                    <button class="btn-cancel" id="closeModal">No, Go Back</button>
                </div>
            </div>
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
                let deleteForm = null;

                // Select all cancel buttons
                document.querySelectorAll(".cancel-order-btn").forEach(button => {
                    button.addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent default button behavior
                        deleteForm = this.closest("form"); // Get the form
                        document.getElementById("confirmationModal").classList.add(
                        "active"); // Show modal
                    });
                });

                // Confirm deletion
                document.getElementById("confirmDelete").addEventListener("click", function() {
                    if (deleteForm) {
                        deleteForm.submit(); // Submit the form with DELETE method
                    }
                });

                // Close modal
                document.getElementById("closeModal").addEventListener("click", function() {
                    document.getElementById("confirmationModal").classList.remove("active");
                });
            });
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
</body>

</html>
