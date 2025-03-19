<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public"
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
                        <h1 class="font_size">Edit Product</h1>
                        <form action="{{url('/edit_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="div_design">
                            <label>Product Title :</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Product Title" required="" value="{{$product->title}}">
                        </div>
                        <div class="div_design">
                            <label>Product Description :</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter Product Description" required="" value="{{$product->description}}">
                        </div>
                        <div class="div_design">
                            <label>Product Price :</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter Product Price" required="" value="{{$product->price}}">
                        </div>
                        <div class="div_design">
                            <label>Discount Price</label>
                            <input type="number" name="dis_price" class="form-control" placeholder="Enter Discount Price" value="{{$product->discount}}">
                        </div>
                        <div class="div_design">
                            <label>Product Quantity :</label>
                            <input type="number" name="quantity" class="form-control" min="0" placeholder="Enter Product Quantity" required="" value="{{$product->quantity}}">
                        </div>
                        <div class="div_design">
                            <label>Product Category :</label>
                            <select class="form-control" name="category" required="">
                                  <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                  @foreach ($category as $categories)
                                      <option value="{{$categories->category_name}}">{{$categories->category_name}}</option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label>Current Product Image Here :</label>
                            <img style="margin: auto;"   src="/product/{{$product->image }}" height="100" width="100">
                        </div>
                        <div class="div_design">
                            <label>Change Product Image Here :</label>
                            <input type="file" name="image">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="Edit Product" class="btn btn-primary">
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
