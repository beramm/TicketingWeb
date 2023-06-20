

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
        <h1 class="h2">Tickets</h1>
    </div>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-primary col-lg-10" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="table-responsive col-lg-10">

        <div class="py-3 mt-4 px-3 mb-3 text-center rounded"
            style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
            <a href="/dashboard/tickets/create">
                <button type="button" class="btn btn-dark" style="width: 100%;">
                    Create New Ticket Batch
                </button>
            </a>
        </div>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Concert</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $counter = ($tickets->currentPage() - 1) * $tickets->perPage();
                ?>
                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$counter); ?></td>
                        <td><?php echo e($ticket->venue); ?></td>
                        <td><?php echo e($ticket->harga); ?></td>
                        <td><?php echo e($ticket->kuantitas); ?></td>
                        <td><?php echo e($ticket->concerts->nama); ?>


                        <td>

                            <a href="/dashboard/tickets/<?php echo e($ticket->id); ?>/edit" class="badge bg-warning">
                                <span data-feather="edit">
                                </span>
                            </a>
                            
                            <form action="/dashboard/tickets/<?php echo e($ticket->id); ?>" method="POST" class="d-inline">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Delete this Concert ?')"><span data-feather="x-circle">
                                    </span></button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <?php echo e($tickets->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/dashboard/tickets/index.blade.php ENDPATH**/ ?>