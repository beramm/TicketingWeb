

<?php $__env->startSection('container'); ?>
    <style>
        .pagination .page-link {
            color: #000000;
            /* Set your desired color */
        }

        .pagination .page-item.active .page-link {
            background-color: #929292;
            /* Set your desired background color */
            border-color: #ffffff;
            /* Set your desired border color */
        }
    </style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
    </div>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-primary col-lg-8" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="table-responsive col-lg-8">

        <div class="py-3 mt-4 px-3 mb-3 text-center rounded"
            style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
            <a href="/dashboard/categories/create">
                <button type="button" class="btn btn-dark" style="width: 100%;">
                    Create New Category
                </button>
            </a>
        </div>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $counter = ($categories->currentPage() - 1) * $categories->perPage();
                ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$counter); ?></td>
                        <td><?php echo e($category->kategori); ?></td>
                        <td>

                            <a href="/dashboard/categories/<?php echo e($category->slug); ?>/edit" class="badge bg-warning">
                                <span data-feather="edit">
                                </span>
                            </a>

                            <form action="/dashboard/categories/<?php echo e($category->slug); ?>" method="POST" class="d-inline">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Delete this Category ?')"><span data-feather="x-circle">
                                    </span></button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <?php echo e($categories->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/dashboard/categories/index.blade.php ENDPATH**/ ?>