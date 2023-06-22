<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('profile/data*') ? 'active' : ''); ?>" aria-current="page" href="/profile/data">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Profile
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('profile/visitors*') ? 'active' : ''); ?>" href="/profile/visitors">
                    <span data-feather="user-plus" class="align-text-bottom"></span>
                    Visitor Credential
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('profile/tickets*') ? 'active' : ''); ?>" href="/profile/tickets">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Ticket Owned
                </a>
            </li>

        </ul>
    </div>
</nav>
<?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/profile/layouts/sidebar.blade.php ENDPATH**/ ?>