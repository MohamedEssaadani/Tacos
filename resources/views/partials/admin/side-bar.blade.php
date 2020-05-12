<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
                <img src="{{asset("assets/src/img/brand-white.svg")}}" class="header-brand-img" alt="lavalite">
            </div>
            <span class="text">Tacos</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded"
                class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Food</div>
                <div class="nav-item active">
                    <a href="{{route('Dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{route('Tacos.index')}}"><i class="ik ik-menu"></i><span>Tacos</span> <span
                            class="badge badge-success">New</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{route('Menus.index')}}"><i class="ik ik-layers"></i><span>Menus</span> <span
                            class="badge badge-danger">120+</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{route('Drinks.index')}}"><i class="ik ik-zap"></i><span>Drinks</span> <span
                            class="badge badge-danger">120+</span></a>
                </div>

                <div class="nav-lavel">Charts</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Charts</span> <span
                            class="badge badge-success">New</span></a>
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

                <div class="nav-lavel">Settings</div>
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