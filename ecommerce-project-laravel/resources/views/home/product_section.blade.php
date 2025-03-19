<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
            <div class="search-container">
                <form action="{{ url('product_search') }}" method="GET">
                    @csrf
                    <input type="text" name="search" placeholder="Search for Something">
                    <button type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('success') }}
            </div>
        @endif
        @include('sweetalert::alert')
        <div class="row">
            @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('product_details', $products->id) }}" class="option1">
                                    Product Details
                                </a>
                                <form action="{{ url('add_cart', $products->id) }}" method="POST" class="cart-form">
                                    @csrf
                                    <div class="cart-input-group">
                                        <button type="button" class="quantity-btn minus">-</button>
                                        <input type="number" name="quantity" min="1" value="1" class="cart-quantity">
                                        <button type="button" class="quantity-btn plus">+</button>
                                        <input type="submit" value="Add to Cart" class="option1">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('product/' . $products->image) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5 class="product-title">
                                {{ $products->title }}
                            </h5>
                            @if ($products->discount != null)
                                <div class="price-container">
                                    <h6 class="product-price discount" style="color: red;">
                                       Discount Price: ${{ $products->discount }}
                                    </h6>
                                    <h6 class="product-price original">
                                       Original Price: ${{ $products->price }}
                                    </h6>
                                </div>
                            @else
                                <h6 class="product-price" style="color:#e74c3c;">
                                    Price: ${{ $products->price }}
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Pagination -->
            <div class="pagination-container">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
        <div class="btn-box">
            <a href="{{url('products')}}">
                View All Products
            </a>
        </div>
    </div>
</section>
