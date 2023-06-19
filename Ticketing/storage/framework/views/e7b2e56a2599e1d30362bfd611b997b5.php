<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">

                <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" aria-current="page" href="#">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/concerts*') ? 'active' : ''); ?>" href="/dashboard/concerts">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Concerts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/categories*') ? 'active' : ''); ?>" href="/dashboard/categories">
                    <span data-feather="list" class="align-text-bottom"></span>
                    Categories
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/vendors*') ? 'active' : ''); ?>" href="/dashboard/vendors">
                    <span data-feather="award" class="align-text-bottom"></span>
                    Vendors
                </a>
            </li>

        </ul>
    </div>
</nav>
<?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>