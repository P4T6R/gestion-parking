<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">

                {{-- <img width="40" height="40" src="{{ asset('img/logo.png') }}" class="header-brand-img" alt="lavalite"> --}}
            </div>
            <span class="text" style="margin-left: -50px;">&nbsp; Gestion de Parking</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item active">
                    <a href="{{ route('home') }}"><i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span></a>
                </div>

                <div class="nav-item has-sub {{ request()->routeIs('user*')  ? 'open' : ''}}">
                    <a href="javascript:void(0)"><i class="ik ik-user"></i><span>Gérer les utilisateurs</span> </a>
                    <div class="submenu-content">
                        <a href="{{ route('user.create') }}" class="menu-item {{ request()->routeIs('user.create') ? 'active' : '' }}">Ajouter</a>
                        <a href="{{ route('user.index') }}" class="menu-item  {{ request()->routeIs('user.index') ? 'active' : '' }}">Lister</a>
                    </div>
                </div>
                <div class="nav-item has-sub {{ request()->routeIs('customers*')  ? 'open' : ''}}">
                    <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Gérer les étudiants </span> </a>
                    <div class="submenu-content">
                        <a href="{{ route('customers.create') }}" class="menu-item  {{ request()->routeIs('customers.create') ? 'active' : '' }}">Ajouter</a>
                        <a href="{{ route('customers.index') }}" class="menu-item  {{ request()->routeIs('customers.index') ? 'active' : '' }}">Lister</a>
                    </div>
                </div>

                <div class="nav-item has-sub {{ request()->routeIs('categories*')  ? 'open' : ''}}">
                    <a href="#"><i class="ik ik-box"></i><span>Gérer la catégorie</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('categories.create') }}" class="menu-item  {{ request()->routeIs('categories.create') ? 'active' : '' }}">Créer</a>
                        <a href="{{ route('categories.index') }}" class="menu-item  {{ request()->routeIs('categories.index') ? 'active' : '' }}">Listes</a>
                    </div>
                </div>
                <div class="nav-item has-sub {{ request()->routeIs('vehicles*')  ? 'open' : ''}}">
                    <a href="#"><i class="ik ik-truck"></i><span>Enregistrer les engins </span> </a>
                    <div class="submenu-content">
                        <a href="{{ route('vehicles.create') }}" class="menu-item  {{ request()->routeIs('vehicles.create') ? 'active' : '' }}">Ajouter</a>
                        <a href="{{ route('vehicles.index') }}" class="menu-item  {{ request()->routeIs('vehicles.index') ? 'active' : '' }}">Lister</a>
                    </div>
                </div>

                <div class="nav-item has-sub {{ request()->routeIs('vehiclesIn*') || request()->routeIs('vehiclesOut*')  ? 'open' : ''}}">
                    <a href="#"><i class="ik ik-gitlab"></i><span>Gérer les engins</span> </a>
                    <div class="submenu-content">
                            <a href="{{ route('vehiclesIn.index') }}" class="menu-item  {{ request()->routeIs('vehiclesIn*') ? 'active' : '' }}">Dans les véhicules</a>
                        <a href="{{ route('vehiclesOut.index') }}" class="menu-item  {{ request()->routeIs('vehiclesOut*') ? 'active' : '' }}">Hors véhicules</a>
                    </div>
                </div>

                <div class="nav-item has-sub">
                    <a href="{{ route('reports.index') }}"><i class="ik ik-edit"></i><span>Raport</span></a>
                    {{-- <div class="submenu-content">
                        <a href="pages/form-components.html" class="menu-item">Components</a>
                        <a href="pages/form-addon.html" class="menu-item">Add-On</a>
                        <a href="pages/form-advance.html" class="menu-item">Advance</a>
                    </div> --}}
                </div>
            </nav>
        </div>
    </div>
</div>
