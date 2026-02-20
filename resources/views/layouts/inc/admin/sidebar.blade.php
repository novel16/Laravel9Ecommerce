 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/orders') }}">
          <i class="mdi mdi-currency-usd menu-icon"></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-layers menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category/create-category')}}">Add Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">View Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
          <i class="mdi mdi-pandora menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/products/create-product')}}">Add Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">View Product</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/brands')}}">
          <i class="mdi mdi-tag-multiple menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/colors')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Colors</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/slider') }}">
          <i class="mdi mdi-view-carousel menu-icon"></i>
          <span class="menu-title">Home Sliders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/users') }}">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url("admin/settings") }}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Site Settings</span>
        </a>
      </li>
    </ul>
  </nav>