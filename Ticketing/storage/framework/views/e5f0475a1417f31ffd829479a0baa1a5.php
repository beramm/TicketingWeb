

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Welcome, <?php echo e(auth()->user()->name); ?></h1>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/profile/index.blade.php ENDPATH**/ ?>