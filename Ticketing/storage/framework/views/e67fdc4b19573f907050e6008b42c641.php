<?php $__env->startSection('container'); ?>
    <form id="myForm" action="<?php echo e(route('postPayment')); ?>" method="POST">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Ticket</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($index + 1); ?></th>
                        <td><?php echo e($ticket->venue); ?></td>
                        <td>Rp.<?php echo e($ticket->harga); ?>,-</td>
                        <td>
                            <?php if($ticket->kuantitas === 0): ?>
                                Sold Out
                            <?php else: ?>
                                <?php echo e($ticket->kuantitas); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($ticket->kuantitas === 0): ?>
                                <fieldset disabled>
                                    <input type="text" class="form-control" value="0" readonly name="totalInput<?php echo e($ticket->id); ?>">
                                </fieldset>
                            <?php else: ?>
                                <input class="form-control" type="number" id="quantity-input-<?php echo e($ticket->id); ?>"
                                    value="0" oninput="updateLabel(<?php echo e($ticket->id); ?>, this.value)"
                                    data-index="<?php echo e($index + 1); ?>" data-harga="<?php echo e($ticket->harga); ?>"
                                    name="total-input-venue[<?php echo e($ticket->id); ?>]" max="4">
                            <?php endif; ?>
                        </td>
                        <td>
                            <div id="demo-<?php echo e($ticket->id); ?>">Rp.0</div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <input type="hidden" id="valueHarga" name="totalHarga" value="abcd">
        <input type="hidden" id="valueBeli" name="totalJumlahBeli">
        <button type="submit" class="btn btn-primary">Accept</button>
        <div id="status"></div>
        <?php echo csrf_field(); ?>
    </form>

    <script>
        var myArray = [];
        var hargaValue = [];

        function updateLabel(id, value) {
            var output = document.getElementById("demo-" + id);
            var harga = document.getElementById("quantity-input-" + id).dataset.harga;
            var index = document.getElementById("quantity-input-" + id).dataset.index;

            if (value === "0" || value === "") {
                output.textContent = "Rp.0";
            } else {
                var total = parseInt(value) * harga;
                output.textContent = "Rp." + total.toLocaleString();
            }
            hargaValue[index] = total;
            myArray[index] = value;        
        }

        document.getElementById('myForm').addEventListener('submit', function(event) {
            var form = event.target;
            var outputHarga = document.getElementById("valueHarga");
            var outputBeli = document.getElementById("valueBeli");
            var staus = document.getElementById("status");
            var sum = 0;
            var sumHarga = 0;

            for (var i = 1; i < myArray.length; i++) {
                if (!isNaN(myArray[i])) {
                    sum += parseInt(myArray[i]);
                    sumHarga += parseInt(hargaValue[i]);
                }
            }

            if (sum > 4) {
                staus.textContent = "Can't be higher than 4";
                outputBeli.value = "";
                event.preventDefault();
            } else {
                outputHarga.value = sumHarga;
                outputBeli.value = sum;
            }
        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/payment.blade.php ENDPATH**/ ?>