<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/backend/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pharmacy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/backend/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Pharmaceuticals</a>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- /.sidebar-company -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Company <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.company.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Company List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.company.new')}}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add Company</p>
                        </a>
                    </li>
                </ul>
            </li>
             <!-- /.sidebar-brand -->

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Brand <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.brand.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Brand List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.brand.new')}}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Brand</p>
                        </a>
                    </li>
                </ul>
            </li>
      
             <!-- /.sidebar-category -->

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Category <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Category</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.category.new')}}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Category</p>
                        </a>
                    </li>
                </ul>
            </li> 

            
        
       <!-- /.sidebar-medicine-type -->
      <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Medicine Type <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.medicine_type.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Medicine List</p>
                        </a>
                    </li>
               <li class="nav-item">
                        <a href="{{route('pharmacy.admin.medicine_type.new')}}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Medicine</p>
                        </a>
                    </li>
                </ul>
            </li>

     <!-- /.sidebar-purchase -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Purchase <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.purchase.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Purchase List</p>
                        </a>
                    </li>
               <li class="nav-item">
                        <a href="{{route('pharmacy.admin.purchase.new')}}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Purchase</p>
                        </a>
                    </li>
                </ul>
            </li>
            
      <!-- /.sidebar-product-->
                <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Product <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Product List</p>
                        </a>
                    </li>
               <li class="nav-item">
                        <a href="{{route('pharmacy.admin.product.new')}}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Product</p>
                        </a>
                    </li>
                </ul>
            </li>

             <!-- /.sidebar-slider-->
             <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Slider <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pharmacy.admin.slider.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Slider List</p>
                        </a>
                    </li>
               <li class="nav-item">
                        <a href="{{route('pharmacy.admin.slider.new')}}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Slider</p>
                        </a>
                    </li>
                </ul>
            </li>
                         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>