<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .form-control {
            color: black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 20px;
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
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <div class="center">
                        <h1 class="font_size">Add Product</h1>
                        <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="div_design">
                            <label>Product Title :</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Product Title" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Description :</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter Product Description" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Price :</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter Product Price" required="">
                        </div>
                        <div class="div_design">
                            <label>Discount Price</label>
                            <input type="number" name="dis_price" class="form-control" placeholder="Enter Discount Price">
                        </div>
                        <div class="div_design">
                            <label>Product Quantity :</label>
                            <input type="number" name="quantity" class="form-control" min="0" placeholder="Enter Product Quantity" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Category :</label>
                            <select class="form-control" name="category" required="">
                                  <option value="" selected="">Add a Category</option>
                                  @foreach ($category as $categories)
                                      <option value="{{$categories->category_name}}">{{$categories->category_name}}</option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label>Product Image Here :</label>
                            <input type="file" name="image" required="">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="Add Product" class="btn btn-primary">
                        </div>
                        </form>
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
