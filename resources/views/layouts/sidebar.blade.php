<aside class="codex-sidebar">
    <div class="logo-gridwrap codex-brand">
        <a class="codexbrand-logo d-flex" href="index.html">
            {{-- <img
                class="img-fluid" src="assets/images/logo/logo.png" alt="theeme-logo"> --}}
            <span class="text-white fs-3 align-middle ms-2 fw-semibold">Pendataan</span></a>
        <div class="sidebar-action"><i data-feather="grid"> </i></div>
    </div>
    <div class="codex-menuwrapper">
        <ul class="codex-menu custom-scroll" data-simplebar>
            <li class="cdxmenu-title mt-0">
                <h5>Dashboards</h5>
            </li>
            <li class="menu-item"><a href="{{ route('admin.dashboard') }}">
                    <div class="icon-item"><i data-feather="home"></i></div><span>Dashboard</span>
                </a></li>
            <li class="cdxmenu-title">
                <h5>application</h5>
            </li>
            <li class="menu-item"><a href="{{ route('admin.villages.index') }}">
                    <div class="icon-item"><i data-feather="map-pin"></i></div><span>Gampong</span>
                </a></li>
            <li class="menu-item"><a href="{{ route('admin.categories.index') }}">
                    <div class="icon-item"><i data-feather="message-square"></i></div><span>Kategory</span>
                </a></li>
            <li class="menu-item"><a href="{{ route('admin.coordinators.index') }}">
                    <div class="icon-item"><i data-feather="users"></i></div><span>Koordinator</span>
                </a></li>
            <li class="menu-item"><a href="{{ route('admin.members.index') }}">
                    <div class="icon-item"><i data-feather="users"></i></div><span>Anggota</span>
                </a></li>
        </ul>
    </div>
</aside>
