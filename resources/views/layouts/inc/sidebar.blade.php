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
                <div class="nav-lavel">Sale</div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Sell</span></a>
                    <div class="submenu-content">
                        <a href="{{route('sales.create')}}" class="menu-item">New Sell</a>
                        <a href="{{route('sales.index')}}" class="menu-item">Invoice</a>
                    </div>
                </div>
                <div class="nav-lavel">Examination</div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Test</span></a>
                    <div class="submenu-content">
                        <a href="{{route('testcategories.index')}}" class="menu-item">Test Category</a>
                        <a href="{{route('tests.create')}}" class="menu-item">Create test</a>
                        <a href="{{route('tests.index')}}" class="menu-item">Test List</a>
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
                        {{-- <a href="{{route('brokers.index')}}" class="menu-item">Broker List</a>
                        <a href="{{route('brokers.creat')}}" class="menu-item">Broker Create</a> --}}
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-package"></i><span>Users</span></a>
                    <div class="submenu-content">
                        <a href="{{route('users.index')}}" class="menu-item">User List</a>
                        <a href="{{route('users.create')}}" class="menu-item">Create User</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-package"></i><span>Verifier</span></a>
                    <div class="submenu-content">
                        <a href="pages/ui/session-timeout.html" class="menu-item">Session Timeout</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="pages/ui/icons.html"><i class="ik ik-command"></i><span>Verifier</span></a>
                </div>
                <div class="nav-lavel">Forms</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-edit"></i><span>Forms</span></a>
                    <div class="submenu-content">
                        <a href="pages/form-components.html" class="menu-item">Components</a>
                        <a href="pages/form-addon.html" class="menu-item">Add-On</a>
                        <a href="pages/form-advance.html" class="menu-item">Advance</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="pages/form-picker.html"><i class="ik ik-terminal"></i><span>Form Picker</span> <span class="badge badge-success">New</span></a>
                </div>

                <div class="nav-lavel">Tables</div>
                <div class="nav-item">
                    <a href="pages/table-bootstrap.html"><i class="ik ik-credit-card"></i><span>Bootstrap Table</span></a>
                </div>
                <div class="nav-item">
                    <a href="pages/table-datatable.html"><i class="ik ik-inbox"></i><span>Data Table</span></a>
                </div>

                <div class="nav-lavel">Charts</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Charts</span> <span class="badge badge-success">New</span></a>
                    <div class="submenu-content">
                        <a href="pages/charts-chartist.html" class="menu-item active">Chartist</a>
                        <a href="pages/charts-flot.html" class="menu-item">Flot</a>
                        <a href="pages/charts-knob.html" class="menu-item">Knob</a>
                        <a href="pages/charts-amcharts.html" class="menu-item">Amcharts</a>
                    </div>
                </div>

                <div class="nav-lavel">Apps</div>
                <div class="nav-item">
                    <a href="pages/calendar.html"><i class="ik ik-calendar"></i><span>Calendar</span></a>
                </div>
                <div class="nav-item">
                    <a href="pages/taskboard.html"><i class="ik ik-server"></i><span>Taskboard</span></a>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>Other</span></a>
                    <div class="submenu-content">
                        <a href="pages/profile.html" class="menu-item">Profile</a>
                        <a href="pages/invoice.html" class="menu-item">Invoice</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="pages/layouts.html"><i class="ik ik-layout"></i><span>Layouts</span><span class="badge badge-success">New</span></a>
                </div>
                <div class="nav-lavel">Other</div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Role and Permisssion</span></a>
                    <div class="submenu-content">
                        <a href="{{route('roles.index')}}" class="menu-item">User Roles List</a>
                        <a href="{{route('roles.create')}}" class="menu-item">Create New Role</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="{{route('options.index')}}"><i class="ik ik-list"></i><span>Settings</span></a>
                </div>
                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-award"></i><span>Toppers</span></a>
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