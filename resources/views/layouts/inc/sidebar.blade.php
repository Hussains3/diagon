<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="/">
            <!-- <div class="logo-img">
               <img src="{{ asset('template/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite">
            </div> -->
            <span class="text">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item">
                    <a href="{{route('saleItems.index')}}" class="menu-item"><i class="ik ik-file-plus"></i>Investigations</a>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Sell</span></a>
                    <div class="submenu-content">
                        <a href="{{route('sales.create')}}" class="menu-item">New Sell</a>
                        <a href="{{route('sales.index')}}" class="menu-item">Invoice</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Test</span></a>
                    <div class="submenu-content">
                        <a href="{{route('tests.index')}}" class="menu-item">Test List</a>
                        <a href="{{route('testcategories.index')}}" class="menu-item">Category</a>
                        <a href="{{route('parameters.index')}}" class="menu-item">Parameter</a>
                        <a href="{{route('units.index')}}" class="menu-item">Unit</a>
                    </div>
                </div>
                <div class="nav-lavel">HR Department</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-box"></i><span>Doctor</span></a>
                    <div class="submenu-content">
                        <a href="{{route('doctors.index')}}" class="menu-item">Our Doctor's List</a>
                        {{-- <a href="" class="menu-item">Doctors Appoinment</a> --}}
                        <a href="{{route('doctors.create')}}" class="menu-item">Add Doctor</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-gitlab"></i><span>Paitient</span></a>
                    <div class="submenu-content">
                        <a href="{{route('patients.index')}}" class="menu-item">List</a>
                        <a href="{{route('patients.create')}}" class="menu-item">Create</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-gitlab"></i><span>Broker</span></a>
                    <div class="submenu-content">
                        <a href="{{route('brokers.index')}}" class="menu-item">Broker List</a>
                        <a href="{{route('brokers.create')}}" class="menu-item">Broker Create</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-users"></i><span>Users</span></a>
                    <div class="submenu-content">
                        <a href="{{route('users.index')}}" class="menu-item">User List</a>
                        <a href="{{route('users.create')}}" class="menu-item">Create User</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="#"><i class="ik ik-command"></i><span>Verifier</span></a>
                </div>
                <div class="nav-lavel">Other</div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Role and Permisssion</span></a>
                    <div class="submenu-content">
                        <a href="{{route('roles.index')}}" class="menu-item">User Roles List</a>
                        <a href="{{route('roles.create')}}" class="menu-item">Create New Role</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Settings</span></a>
                    <div class="submenu-content">
                        {{-- <a href="{{route('options.index')}}" class="menu-item">General</a> --}}
                        <a href="{{route('goptions.index')}}" class="menu-item">General</a>
                        <a href="{{route('appmodes.index')}}" class="menu-item">App mode</a>
                    </div>
                </div>
                <div class="nav-lavel">Support</div>
                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-monitor"></i><span>Documentation</span></a>
                </div>
                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-help-circle"></i><span>Submit Issue</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
