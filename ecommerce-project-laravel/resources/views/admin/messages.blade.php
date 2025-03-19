<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .table thead {
            background: #343a40;
            color: white;
        }

        .table-hover tbody tr:hover {
            background: #f8f9fa;
        }

        .btn-primary {
            background-color: #dc3545;
            /* Red color */
            border-color: #dc3545;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .content-wrapper {
            margin-top: 30px;
            /* Adjust the value as needed */
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
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Messages</h4>
                                <p class="card-description">Manage and respond to user messages</p>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($messages as $message)
                                                <tr>
                                                    <td>{{ $message->id }}</td>
                                                    <td>{{ $message->name }}</td>
                                                    <td>{{ $message->email }}</td>
                                                    <td>{{ $message->subject }}</td>
                                                    <td>{{ Str::limit($message->message, 50) }}</td>
                                                    <td>{{ $message->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a href="{{ url('send_email_message', $message->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            Send Email
                                                        </a>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <div>
                                                        <tr>
                                                            <td colspan="16">No Data found.</td>
                                                        </tr>
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>

    </html>
