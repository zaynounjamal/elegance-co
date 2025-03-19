<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
     @include('admin.css') <style type="text/css">
    /* Style for the heading */
    .email-form-title {
    text-align: center;
    font-size: 26px;
    font-weight: bold;
    color: red;
    margin-bottom: 20px;
    }

    /* Center and style the form */
    .email-form {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    margin: 0 auto; /* Center the form */
    border: 2px solid red; /* Red border */
    }

    /* Style form fields */
    .email-form-group {
    margin-bottom: 15px;
    }

    .email-form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: red;
    }

    .email-form input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: red;
    }

    /* Style the submit button */
    .email-form-submit {
    width: 100%;
    padding: 10px;
    background-color: red;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 18px;
    cursor: pointer;
    }

    .email-form-submit:hover {
    background-color: darkred;
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
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h1 class="email-form-title">Send Email to {{ $order->email }}</h1>

                    <form class="email-form" method="POST" action="{{ url('send_user_email', $order->id) }}">
                        @csrf
                        <div class="email-form-group">
                            <label>Email Greeting :</label>
                            <input type="text" name="greeting">
                        </div>
                        <div class="email-form-group">
                            <label>Email FirstLine :</label>
                            <input type="text" name="firstline">
                        </div>
                        <div class="email-form-group">
                            <label>Email Body :</label>
                            <input type="text" name="body">
                        </div>
                        <div class="email-form-group">
                            <label>Email Button name :</label>
                            <input type="text" name="button">
                        </div>
                        <div class="email-form-group">
                            <label>Email Url :</label>
                            <input type="text" name="url">
                        </div>
                        <div class="email-form-group">
                            <label>Email LastLine :</label>
                            <input type="text" name="lastline">
                        </div>
                        <div class="email-form-group">
                            <input type="submit" value="Send Email" class="email-form-submit">
                        </div>
                    </form>

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
