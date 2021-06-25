@switch(Auth::user()->rol)
    @case('Supervisor')
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div  class="sidebar-brand-text mx-3"> Bienvenido</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menú 
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuarios</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categorias')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Categorias</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('productos')}}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Productos</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    @break
    @case('Cliente')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div  class="sidebar-brand-text mx-3"> Bienvenido</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menú 
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{route('categorias')}}">
                <i class="fas fa-fw fa-file"></i>
                <span>Categorias</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('productos')}}">
                <i class="fas fa-fw fa-box"></i>
                <span>Mis Producto</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    @break

    @case('Encargado')
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div  class="sidebar-brand-text mx-3"> Bienvenido</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menú 
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categoria.encargado')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Categoria</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('productos')}}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Producto</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('users')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuarios</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    @break

    @case('Contador')
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div  class="sidebar-brand-text mx-3"> Bienvenido</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menú 
            </div>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Validar Pagos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Lista de Pagos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Nuevo Pago</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    @break
@endswitch