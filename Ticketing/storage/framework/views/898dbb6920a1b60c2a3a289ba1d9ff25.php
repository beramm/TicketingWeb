<?php $__env->startSection('container'); ?>
<p>hallo <?php echo e($jumlahBeli); ?></p>
<div>Total Harga: <?php echo e($hargaTotal); ?></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/buy.blade.php ENDPATH**/ ?>