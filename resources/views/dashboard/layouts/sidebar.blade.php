<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('build/assets/logo-nav-9xhMEncz.jpg')}}" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('app_name')}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->username}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">Users Management</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-user-secret"></i>
                        <p>
                            <i class="right fas fa-angle-left"></i>
                            Admins
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('admin-list')
                            <li class="nav-item">
                                <a href="{{route('admin.show-admins')}}" class="nav-link">
                                    <i class="fas fa-eye"></i>
                                    <p>
                                        Show Admins
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('admin-create')
                            <li class="nav-item">
                                <a href="{{route('admin.create-admin')}}" class="nav-link">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <p>
                                        Add Admin
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                @can('user-list')
                    <li class="nav-item">
                        <a href="{{route('admin.show-users')}}" class="nav-link">
                            <i class="fas fa-eye"></i>
                            <p>
                                Show Users
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-header">Units Management</li>
                @can('category-list')
                    <li class="nav-item">
                        <a href="{{route('admin.show-category')}}" class="nav-link">
                            <i class="fas fa-tags"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>
                @endcan
                @can('feature-list')
                    <li class="nav-item">
                        <a href="{{route('admin.show-feature')}}" class="nav-link">
                            <i class="fas fa-cogs"></i>
                            <p>
                                Features
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-building"></i>
                        <p>
                            Units
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>
                                    Add Unit
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.show-unit')}}" class="nav-link">
                                <i class="fas fa-eye"></i>
                                <p>
                                    Show Unit
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Booking</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-eye"></i>
                        <p>
                            Show Booking
                        </p>
                    </a>
                </li>
                <li class="nav-header">Setting</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-eye"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-lock"></i>
                        <p>
                            Permissions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('role-list')
                            <li class="nav-item">
                                <a href="{{route('admin.roles.index')}}" class="nav-link">
                                    <i class="fas fa-eye"></i>
                                    <p>
                                        Show Roles
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('role-create')
                            <li class="nav-item">
                                <a href="{{route('admin.roles.create')}}" class="nav-link">
                                    <i class="fas fa-plus-circle"></i>
                                    <p>
                                        Create Role
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-header">Support</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-question-circle"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li>
                @can('message-list')
                    <li class="nav-item">
                        <a href="{{route('admin.show-message')}}" class="nav-link">
                            <i class="fas fa-envelope"></i>
                            <p>
                                Contact Us
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
