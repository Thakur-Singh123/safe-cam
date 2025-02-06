<!--Main Sidebar Container-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="#" class="brand-link">
   <span class="brand-text font-weight-light">
   <?php if(Auth::user()->user_type == 'Admin'){
      echo 'Admin Dashboard';
      } elseif(Auth::user()->user_type == 'Customer'){
      echo 'Employee Dashboard';
      }?>
   </span>
   </a>
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!----admin side bar--->
            @if(Auth::user()->user_type == 'Admin')
            <!-- <li class="nav-item">
               <a href="{{ url('admin/all-contacts') }}" class="nav-link {{ Request::is('admin/all-contacts') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li> -->
            <li class="nav-item has-treeview {{ Request::is('admin/add-new-slider') || Request::is('admin/all-sliders-list') || Request::is('admin/edit-slider/*') ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is('admin/add-new-slider') || Request::is('admin/all-sliders-list') || Request::is('admin/edit-slider/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-sliders-h"></i>  
                  <p>  
                     Sliders
                     <i class="right fas fa-angle-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ url('admin/add-new-slider') }}" class="nav-link {{ Request::is('admin/add-new-slider') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Slider</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('admin/all-sliders-list') }}" class="nav-link {{ Request::is('admin/all-sliders-list') || Request::is('admin/edit-slider/*') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Sliders</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview {{ Request::is('admin/add-new-blog') || Request::is('admin/all-blogs')  || Request::is('admin/edit-blog/*') ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is('admin/add-new-blog') || Request::is('admin/all-blogs') || Request::is('admin/edit-blog/*') ? 'active' : '' }}">
               <i class="nav-icon fas fa-blog"></i>         
                  <p>
                     Blogs
                     <i class="right fas fa-angle-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ url('admin/add-new-blog') }}" class="nav-link {{ Request::is('admin/add-new-blog') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Blog</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('admin/all-blogs') }}" class="nav-link {{ Request::is('admin/all-blogs') || Request::is('admin/edit-blog/*') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Blogs</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview {{ Request::is('admin/add-new-service') || Request::is('admin/all-services')  || Request::is('admin/edit-service/*') ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is('admin/add-new-service') || Request::is('admin/all-services') || Request::is('admin/edit-service/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-briefcase"></i>            
                  <p>
                     Services
                     <i class="right fas fa-angle-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ url('admin/add-new-service') }}" class="nav-link {{ Request::is('admin/add-new-service') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Service</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('admin/all-services') }}" class="nav-link {{ Request::is('admin/all-services') || Request::is('admin/edit-service/*') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Services</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview {{ Request::is('admin/add-new-testimonial') || Request::is('admin/all-testimonials')  || Request::is('admin/edit-testimonial/*') ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is('admin/add-new-testimonial') || Request::is('admin/all-testimonials') || Request::is('admin/edit-testimonial/*') ? 'active' : '' }}">
               <i class="nav-icon fas fa-quote-left"></i>          
                  <p>
                     Testimonials
                     <i class="right fas fa-angle-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ url('admin/add-new-testimonial') }}" class="nav-link {{ Request::is('admin/add-new-testimonial') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Testimonial</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('admin/all-testimonials') }}" class="nav-link {{ Request::is('admin/all-testimonials') || Request::is('admin/edit-testimonial/*') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Testimonials</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/all-contacts') || Request::is('admin/edit-contact/*') ? 'menu-open' : '' }}">
               <a href="{{ url('admin/all-contacts') }}" class="nav-link {{ Request::is('admin/all-contacts') || Request::is('admin/edit-contact/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>
                     Contacts
                  </p>
               </a>
            </li>
            @endif
            <!----Customer side bar--->
            @if(Auth::user()->user_type == 'Customer')
            <!-- <li class="nav-item">
               <a href="{{ url('customer/dashboard') }}" class="nav-link {{ Request::is('customer/dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
               </li> -->
            <li class="nav-item has-treeview {{ Request::is('customer/add-new-order') || Request::is('customer/all-orders') ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is('customer/add-new-order') || Request::is('customer/all-orders') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                     Orders
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ url('customer/add-new-order') }}" class="nav-link {{ Request::is('customer/add-new-order') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>
                           Add Order
                        </p>
                     </a>
                  </li>
                  <!--<li class="nav-item">
                     <a href="{{ url('customer/all-orders') }}" class="nav-link {{ Request::is('customer/all-orders') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Orders</p>
                     </a>
                     </li>-->
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{ url('customer/repeat-orders') }}" class="nav-link {{ Request::is('customer/repeat-orders') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-recycle"></i>
                  <p>
                     Repeat Orders
                  </p>
               </a>
            </li>
            @endif
            <!--Logout link-->
            <li class="nav-item">
               <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                     Logout
                  </p>
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </li>
         </ul>
      </nav>
   </div>
</aside>