<?php $__env->startSection('container'); ?>
    <h1>Home Page</h1>

    <?php
        $data = session()->all();
    ?>

    <?php if(!empty(Auth::user()->name)): ?>
        <h2>Session Data:</h2>
        <ul>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($key); ?>: <?php echo e(is_array($value) ? print_r($value, true) : htmlspecialchars($value)); ?></li>
                <li>User Name: <?php echo e(Auth::user()->name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <a href="<?php echo e(route('logout')); ?>" class="btn btn-link">logout</a>
    <?php else: ?>
        <p>No session data available.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/homepage.blade.php ENDPATH**/ ?>