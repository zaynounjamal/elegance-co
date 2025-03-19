<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        /* General page styling */

        .container-scroller {
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 100%;
            /* Ensure the container is responsive */
            margin: auto;
            /* Centers the container */
        }

        .title_deg {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: #003366;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Button styling */
        .btn {
            background-color: #28a745;
            color: #fff;
            padding: 6px 12px;
            /* Smaller button padding */
            font-size: 12px;
            /* Smaller button text */
            text-decoration: none;
            border-radius: 4px;
            border: none;
            display: inline-block;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #218838;
        }

        .btn:focus {
            outline: none;
        }

        /* Table container */
        .table-container {
            max-width: 90%;
            /* Limit table container width */
            margin: 0 auto;
            overflow-x: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
        }

        /* Table styling */
        table {
            width: 100%;
            /* Table will take up the full width of the container */
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 8px 10px;
            /* Smaller padding for a more compact table */
            text-align: center;
            font-size: 13px;
            /* Slightly smaller font for a more compact table */
            border: 1px solid #ddd;
            color: #333;
        }

        table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9ff;
        }

        table tr:nth-child(odd) {
            background-color: #ffffff;
        }

        table tr:hover {
            background-color: #d7eaff;
        }

        /* Adding borders to table cells */
        table td {
            border-left: 1px solid #ddd;
            border-top: 1px solid #ddd;
        }

        /* Image styling */
        table td img {
            max-width: 50px;
            /* Smaller image size */
            height: auto;
            border-radius: 5px;
        }

        /* Button styling */
        .btn {
            font-size: 12px;
            padding: 5px 10px;
            /* Smaller button padding */
        }

        /* Adding responsiveness */
        @media (max-width: 768px) {

            table th,
            table td {
                padding: 6px 8px;
            }

            table td img {
                max-width: 40px;
                /* Even smaller images on mobile */
            }

            .btn {
                font-size: 10px;
                padding: 4px 8px;
                /* Even smaller buttons */
            }
        }

        /* General modal styling */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            justify-content: center;
            align-items: center;
            z-index: 1000;
            /* Ensure it appears above other content */
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .modal-actions {
            margin-top: 20px;
        }

        .btn {
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
            text-align: center;
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
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1 class="title_deg">All Orders</h1>
                    <div style="display: flex; justify-content: center; padding: auto; padding-bottom: 30px;">
                        <form action="{{url('search')}}" method="get">
                            @csrf
                            <input  style="color: black;" type="text" name="search" placeholder="Search For Something">
                            <input type="submit" value="Search" class="btn btn-outline-primary">
                        </form>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                            <th>Delivered</th>
                            <th>Print PDF</th>
                            <th>Send Email</th>
                        </tr>
                        @forelse ($order as $orders)
                            <tr>
                                <td>{{ $orders->name }}</td>
                                <td>{{ $orders->email }}</td>
                                <td>{{ $orders->address }}</td>
                                <td>{{ $orders->phone }}</td>
                                <td>{{ $orders->product_title }}</td>
                                <td>{{ $orders->quantity }}</td>
                                <td>{{ $orders->price }}</td>
                                <td>{{ $orders->payment_status }}</td>
                                <td>{{ $orders->delivery_status }}</td>
                                <td><img src="{{ asset('product/' . $orders->image) }}" alt="Product Image"></td>
                                <td>
                                    @if ($orders->delivery_status == 'processing')
                                        <a href="#" onclick="openModal(event, {{ $orders->id }})"
                                            class="btn btn-primary">Delivered</a>
                                        <!-- Modal Structure (Per Order) -->
                                        <div id="confirmationModal{{ $orders->id }}" class="modal">
                                            <div class="modal-content">
                                                <h2>Confirm Delivery</h2>
                                                <p>Are you sure this product is delivered?</p>
                                                <div class="modal-actions">
                                                    <button onclick="confirmDelivery({{ $orders->id }})"
                                                        class="btn btn-success">Yes, Delivered</button>
                                                    <button onclick="closeModal({{ $orders->id }})"
                                                        class="btn btn-danger">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Delivered!</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('print_pdf', $orders->id) }}" target="_blank"
                                        class="btn btn-info">Print PDF</a>
                                </td>
                                <td>
                                    <a href="{{ url('send_email', $orders->id) }}" target="_blank"
                                        class="btn btn-info">Send Email</a>
                                </td>
                            </tr>
                            @empty
                            <div>
                                <tr>
                                    <td colspan="16">No Data found.</td>
                                </tr>
                            </div>
                        @endforelse
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <script type="text/javascript">
        // Function to open the modal
        function openModal(event, orderId) {
            event.preventDefault(); // Prevent the default action (link redirect)
            const modal = document.getElementById('confirmationModal' + orderId);
            modal.style.display = 'flex'; // Show modal
        }

        // Function to close the modal
        function closeModal(orderId) {
            const modal = document.getElementById('confirmationModal' + orderId);
            modal.style.display = 'none'; // Hide modal
        }

        // Function to confirm the delivery action
        function confirmDelivery(orderId) {
            // Redirect to the URL to mark the order as delivered
            window.location.href = "{{ url('delivered') }}/" + orderId;
        }
    </script>
    <!-- End custom js for this page -->
</body>

</html>
