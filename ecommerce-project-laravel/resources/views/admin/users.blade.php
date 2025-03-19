<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        /* General Styles */
        h1 {
            text-align: center;
            font-size: 28px;
            color: #006dd9;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }

        /* Search Form */
        form {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding-bottom: 30px;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 250px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-outline-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-outline-primary:hover {
            background-color: #0056b3;
        }

        /* Table Styling */
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        td {
            color: #555;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Action Links */
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .delete-btn {
            color: red;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .delete-btn:hover {
            color: darkred;
            text-decoration: underline;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    @include('vendor.sweetalert.alert')
                    <h1>All Users</h1>
                    <div style="display: flex; justify-content: center; padding: auto; padding-bottom: 30px;">
                        <form action="{{ url('search_users') }}" method="get">
                            @csrf
                            <input style="color: black;" type="text" name="search"
                                placeholder="Search For Something">
                            <input type="submit" value="Search" class="btn btn-outline-primary">
                        </form>
                    </div>

                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->usertype == 1 ? 'Admin' : 'User' }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td><a href="{{ url('edit_user', $user->id) }}">Edit</a></td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete({{ $user->id }})"
                                        class="delete-btn">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No users found.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#007bff',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('delete_user') }}/" + userId;
                }
            });
        }
    </script>
    <!-- End custom js for this page -->
</body>

</html>
