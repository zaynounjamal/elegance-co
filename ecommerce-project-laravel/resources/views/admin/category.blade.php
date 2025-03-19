<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div-center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
            padding-bottom: 40px;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            border: 3px solid white;
            margin-top: 30px;
        }

        table {
            padding-top: 40px;
            width: 50%;
            border-collapse: collapse;
            border: 3px solid white;
            margin: auto;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        /* Modal Styling */
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

        .modal-content h2 {
            color: #333;
            /* Dark text color for header */
        }

        .modal-content p {
            color: #555;
            /* Dark text color for content */
        }

        .modal-actions {
            margin-top: 20px;
        }

        .modal-actions button {
            padding: 8px 16px;
            font-size: 14px;
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
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="div-center">
                        <h2 class="h2_font">Add Category</h2>
                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <input type="text" class="input_color" name="category" placeholder="Write Category Name">
                            <input type="submit" name="submit" class="btn btn_primary" value="Add Category">
                        </form>
                    </div>
                    <table class="center">
                        <tr>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($data as $datas)
                            <tr>
                                <td>{{ $datas->category_name }}</td>
                                <td>
                                    <button onclick="openModal(event, {{ $datas->id }})"
                                        class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Modal Structure -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h2>Confirm Deletion</h2>
            <p>Are you sure you want to delete this category?</p>
            <div class="modal-actions">
                <button id="confirmBtn" class="btn btn-success">Yes, Delete</button>
                <button id="cancelBtn" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    @include('admin.script')

    <!-- JavaScript -->
    <script type="text/javascript">
        let deleteUrl = '';

        // Function to open the modal
        function openModal(event, categoryId) {
            event.preventDefault(); // Prevent the default action (form submission or link redirect)
            deleteUrl = "{{ url('delete_category') }}/" + categoryId; // Set the delete URL dynamically
            document.getElementById('confirmationModal').style.display = 'flex'; // Show modal
        }

        // Close the modal if the user cancels
        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.getElementById('confirmationModal').style.display = 'none'; // Hide modal
        });

        // Handle the confirm button click
        document.getElementById('confirmBtn').addEventListener('click', function() {
            window.location.href = deleteUrl; // Redirect to the delete URL
        });
    </script>
    <!-- End custom js for this page -->
</body>

</html>
