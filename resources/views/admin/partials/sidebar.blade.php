 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url("/")}}" class="brand-link">
      <img src="{{asset(site()->logo)}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8;">
      <span class="brand-text font-weight-light">{{site()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(auth()->user()->avatar)}}" class="img-circle elevation-2" alt="User Image" style="width:40px;height:40px;">
        </div>
        <div class="info">
          <a href="{{route('profile')}}" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @role("admin")
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('siteinfo')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('social-icon-manager')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('manage-ads')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Ads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/product-settings')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Settings</p>
                </a>
              </li>

            </ul>
          </li>
          @endrole
           @if(auth()->user()->hasAnyPermission(['create-user', 'edit-user',"view-user","delete-user"]))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach(roles() as $role)
              <li class="nav-item">
                <a href='{{url("users/{$role->name}")}}' class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ucfirst(Str::plural($role->name)) }}</p>
                </a>
              </li>
              @endforeach
              
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{route('profile')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
            @if(auth()->user()->hasAnyPermission(['create-product', 'edit-product',"view-product","delete-product",'create-category', 'edit-category',"view-category","delete-category",'create-subcategory', 'edit-subcategory',"view-subcategory","delete-subcategory",'create-brand', 'edit-brand',"view-brand","delete-brand"]))
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-shopping-basket "></i>
                <p>
                  Products
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href='{{route('products')}}' class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Products</p>
                  </a>
                </li>
              @if(auth()->user()->hasAnyPermission(['create-category', 'edit-category',"view-category","delete-category"]))
                <li class="nav-item">
                  <a href='{{route('category.index')}}' class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                  </a>
                </li>
                @endif
                @if(auth()->user()->hasAnyPermission(['create-subcategory', 'edit-subcategory',"view-subcategory","delete-subcategory"]))
                <li class="nav-item">
                  <a href='{{route('sub-category.index')}}' class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sub-categories</p>
                  </a>
                </li>
                @endif

                @if(auth()->user()->hasAnyPermission(['create-brand', 'edit-brand',"view-brand","delete-brand"]))
                <li class="nav-item">
                  <a href='{{route('brands')}}' class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Brands</p>
                  </a>
                </li>
                @endif

                @if(auth()->user()->hasAnyPermission(['create-coupon', 'edit-coupon',"view-coupon","delete-coupon"]))
                <li class="nav-item">
                  <a href='{{route('coupons')}}' class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Coupons</p>
                  </a>
                </li>
                @endif
                @if(auth()->user()->hasAnyPermission(['create-attribute', 'edit-attribute',"view-attribute","delete-attribute"]))
                <li class="nav-item">
                  <a href='{{route('attributes')}}' class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Attributes</p>
                  </a>
                </li>
                @endif

              </ul>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>