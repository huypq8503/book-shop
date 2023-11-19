<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-format-list-bulleted-square menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/category/create')}}">Add Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/category')}}">View Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a href="#product" data-bs-toggle="collapse" aria-expanded="false"aria-controls="product" class="nav-link">
          <i class="mdi   mdi-scale-balance menu-icon"></i>
        
          <span class="menu-title">Product</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="product">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/products/create')}}">Add Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/products')}}">View Product</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/brands')}}">
          <i class="mdi mdi-fountain-pen menu-icon"></i>
          <span class="menu-title">Authors</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/colors')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Colors </span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/slider')}}">
          <i class="mdi mdi-image-area menu-icon"></i>
          <span class="menu-title">Slider</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/orders')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/settings')}}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Main Setting</span>
        </a>
      </li> 
     <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
          
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/users')}}"> View User</a></li>

          </ul>
        </div>
       {{-- </li>
      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>