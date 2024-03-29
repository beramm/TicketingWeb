<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">

                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                    href="/dashboard/categories">
                    <span data-feather="list" class="align-text-bottom"></span>
                    Categories
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/vendors*') ? 'active' : '' }}" href="/dashboard/vendors">
                    <span data-feather="award" class="align-text-bottom"></span>
                    Vendors
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/concerts*') ? 'active' : '' }}" href="/dashboard/concerts">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Concerts
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Request::is('dashboard/concertTicket*') || Request::is('dashboard/tickets*') ? 'active' : '' }}"
                    href="/dashboard/concertTicket">
                    <span data-feather="plus-square" class="align-text-bottom"></span>
                    Tickets
                </a> --}}
                <a class="nav-link {{ Request::is('dashboard/tickets*') ? 'active' : '' }}" href="/dashboard/tickets">
                    <span data-feather="plus-square" class="align-text-bottom"></span>
                    Tickets
                </a>
            </li>
        </ul>
    </div>
</nav>
