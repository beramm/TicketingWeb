<nav class="navbar navbar-expand-lg bg-dark" style="position: sticky; top: 0; z-index: 9999;">

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg"
        aria-controls="navbarOffcanvasLg" style="margin-left: 15px;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand me-auto text-white" href="/" style="text-align: left; margin-left: 15px; ">
        <img src="/img/logo1.png" style="width: 95px; margin-right: 20px" id="pictAll">
        <span class="diss">TicketVerse</span>
    </a>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="navbarOffcanvasLg"
        aria-labelledby="navbarOffcanvasLgLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav" style="margin-right: 10px;">
                <ul class="navbar-nav justify-content-center justify-content-lg-end flex-grow-1 pe-3"
                    style="margin-right: 150px; margin-left: 50px">
                    <ul class="navbar-nav">
                        <div style="width: 550px; min-width: 300px;">

                            <form class="d-flex ms-auto" role="search" action="/concerts" method="GET">
                                <?php if(request('category')): ?>
                                    <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                                <?php endif; ?>
                                <input class="form-control me-2" type="text" placeholder="Search here.."
                                    name="search" value="<?php echo e(request('search')); ?>">
                                <button class="btn btn-outline-light" type="submit">Search</button>
                            </form>

                        </div>
                    </ul>
                </ul>
                <li class="nav-item " style="margin-right: 10px;">
                    <a class="nav-link" title="Click to see HomePage" href="/">HomePage</a>
                </li>

                <li class="nav-item dropdown" style="margin-right: 10px;">

                    <a class="nav-link dropdown-toggle" href="#" id="kegiatan-link" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu dropdown-hover" data-bs-auto-close="false">
                        <?php $__currentLoopData = App\Models\Categories::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a class="dropdown-item"
                                    href="/concerts?category=<?php echo e($category->slug); ?>"><?php echo e($category->kategori); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <li class="nav-item text-white " style="margin-right: 10px;">
                    <a class="nav-link" href="about" id="contact-link" title="Click to see Contact Person">About
                        Us</a>
                </li>
                <ul class="navbar-nav">
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item text-white " style="margin-right: 20px;">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>" id="contact-link"
                                title="Click to see Contact Person">Login <i class="fa fa-sign-in"></i></a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown" style="margin-right: 10px;">

                            <a class="nav-link dropdown-toggle" href="#" id="kegiatan-link" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Personal
                            </a>
                            <ul class="dropdown-menu dropdown-hover" data-bs-auto-close="false">
                                <li class="text-dark"><a class="dropdown-item" href="<?php echo e(route('login')); ?>"><i
                                            class="bi bi-person-circle"></i> Profile
                                    </a>
                                </li>
                                <?php if(auth()->user()->isAdmin === 1): ?>
                                    <li class="text-dark"><a class="dropdown-item" href="/Dashboard"><i
                                                class="bi bi-layout-text-sidebar"></i> Dashboard
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="text-dark"><a class="dropdown-item" href="/Dashboard"><i
                                                class="bi bi-ticket-detailed-fill"></i></i> Ticket Ordered
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="text-dark"><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"><i
                                            class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                </ul>
                
            </ul>

        </div>
    </div>
</nav>
<?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/partials/navbar.blade.php ENDPATH**/ ?>