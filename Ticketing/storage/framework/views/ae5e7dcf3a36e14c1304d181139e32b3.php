<?php $__env->startSection('container'); ?>
    <h1>Invoice</h1>
    <p>Invoice Total : </p>
    <h3>Rp.<?php echo e($hargaTotal); ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Venue</th>
                <th scope="col">Unit Cost</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $bought; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($index + 1); ?></th>
                    <td><?php echo e($data->tickets->venue); ?></td>
                    <td>Rp.<?php echo e($data->tickets->harga); ?></td>
                    <td><?php echo e($data->jumlah); ?></td>
                    <td class="jumlah">Rp.</td>
                    <script>
                        var output = document.getElementsByClassName('jumlah')[<?php echo e($index); ?>];
                        output.textContent = "Rp."+<?php echo e($data->tickets->harga); ?> * <?php echo e($data->jumlah); ?>;
                    </script>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/buyed.blade.php ENDPATH**/ ?>