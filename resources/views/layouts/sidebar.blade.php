
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <img src="{{ asset('backend/img/logo.svg') }}" alt="{{__('hrc')}}" />
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}

    <!-- Heading -->
{{--    <div class="sidebar-heading">--}}
{{--        Interface--}}
{{--    </div>--}}

    <!-- Nav Item - Pages Collapse Menu -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--           aria-expanded="true" aria-controls="collapseTwo">--}}
{{--            <i class="fas fa-fw fa-cog"></i>--}}
{{--            <span>s</span>--}}
{{--        </a>--}}
{{--        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Custom Components:</h6>--}}
{{--                <a class="collapse-item" href="buttons.html">Buttons</a>--}}
{{--                <a class="collapse-item" href="cards.html">Cards</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Nav Item - Utilities Collapse Menu -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
{{--           aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--            <i class="fas fa-fw fa-wrench"></i>--}}
{{--            <span>Utilities</span>--}}
{{--        </a>--}}
{{--        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
{{--                <a class="collapse-item" href="utilities-color.html">Colors</a>--}}
{{--                <a class="collapse-item" href="utilities-border.html">Borders</a>--}}
{{--                <a class="collapse-item" href="utilities-animation.html">Animations</a>--}}
{{--                <a class="collapse-item" href="utilities-other.html">Other</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    @unlessrole('employee')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    @endunlessrole

    @role('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{route('templates.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>{{__('templates')}}</span></a>
    </li>
    @endrole
    @role('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{route('departments.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>{{__('departments')}}</span></a>
    </li>
    @endrole
    @unlessrole('employee')
    <li class="nav-item">
        <a class="nav-link" href="{{route('employees.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>{{__('employees')}}</span></a>
    </li>
    @endunlessrole

    @role('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>{{__('users')}}</span></a>
    </li>
    @endrole
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
