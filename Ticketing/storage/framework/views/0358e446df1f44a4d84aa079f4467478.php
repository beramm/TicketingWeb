

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
        <h1 class="h2">Concerts</h1>
    </div>
    <div class="table-responsive">

        <div class="py-3 mt-4 px-3 text-center rounded"
            style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
            <a href="/dashboard/concerts/create">
                <button type="button" class="btn btn-dark" style="width: 100%;">
                    Create New Concert
                </button>
            </a>
        </div>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $counter = ($concerts->currentPage() - 1) * $concerts->perPage();
                ?>
                <?php $__currentLoopData = $concerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$counter); ?></td>
                        <td><?php echo e($concert->nama); ?></td>
                        <td><?php echo e($concert->categories->kategori); ?></td>
                        <td>
                            <a href="/dashboard/concerts/<?php echo e($concert->slug); ?>" class="badge bg-info">
                                <span data-feather="eye">
                                </span>
                            </a>

                            <a href="" class="badge bg-warning">
                                <span data-feather="edit">
                                </span>
                            </a>
                            <a href="" class="badge bg-danger">
                                <span data-feather="x-circle">
                                </span>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <?php echo e($concerts->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/dashboard/concerts/index.blade.php ENDPATH**/ ?>