<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-file"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> DMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Products -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span></a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.user.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Company -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.company.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Companys</span></a>
    </li>

    <!-- Nav Item - Unit -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.unit.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Units</span></a>
    </li>

    <!-- Nav Item - brand -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.brand.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Brands</span></a>
    </li>

    <!-- Nav Item - color -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.color.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Colors</span></a>
    </li>

    <!-- Nav Item - Order -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.order.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span></a>
    </li>

    <!-- Nav Item - Voucher -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.inventory-vouchers.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Inventory Vouchers</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->