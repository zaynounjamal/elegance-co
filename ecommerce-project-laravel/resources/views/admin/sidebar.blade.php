<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{url('/redirect')}}"><img src="home/images/favicon-removebg-preview.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="{{url('/redirect')}}"><img src="home/images/favicon-removebg-preview.png" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="admin/assets/images/admintester.webp" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Zaynoun Jamal</h5>
                        <span>Gold Member</span>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/redirect')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- Add Users -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('/add_users') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus-box"></i>
                </span>
                <span class="menu-title">Add Users</span>
            </a>
        </li>
        <!-- Show Users -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('/view_users') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-view-list"></i>
                </span>
                <span class="menu-title">Users</span>
            </a>
        </li>

        <!-- Add Products -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('/view_product') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus-box"></i>
                </span>
                <span class="menu-title">Add Products</span>
            </a>
        </li>

        <!-- Show Products -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('/show_products') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-view-list"></i>
                </span>
                <span class="menu-title">Show Products</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('view_category') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Category</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('order')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Order</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('view_messages')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Messages</span>
            </a>
        </li>
    </ul>
</nav>
