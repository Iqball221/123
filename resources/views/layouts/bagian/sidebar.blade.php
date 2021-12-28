            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Penjualan Buku</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('suplier.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Suplier</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('book.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Buku</span></a>
            </li>
            
            <li class="nav-item active">
                <a class="nav-link" href="{{route('transaksi.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transaksi</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>