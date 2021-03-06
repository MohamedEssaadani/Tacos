<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
                <!--LOGO-->
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
                            class="badge badge-success">33+</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{route('Menus.index')}}"><i class="ik ik-layers"></i><span>Menus</span> <span
                            class="badge badge-danger">120+</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{route('Drinks.index')}}"><i class="ik ik-zap"></i><span>Drinks</span> <span
                            class="badge badge-danger">120+</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{route('Orders.index')}}"><i class="ik ik-command"></i><span>Orders</span> <span
                            class="badge badge-success">23</span></a>
                </div>
                <div class="nav-lavel">Charts</div>
                <div class="nav-item">
                    <a href=""><i class="ik ik-zap"></i><span>Charts</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>