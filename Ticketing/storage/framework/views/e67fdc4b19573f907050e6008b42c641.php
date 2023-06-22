<?php $__env->startSection('container'); ?>
    <style>
        input[type="number"]::-webkit-inner-spin-button {
            display: none;
        }
    </style>
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
                                    <input type="text" class="form-control" value="0" readonly
                                        name="totalInput<?php echo e($ticket->id); ?>">
                                </fieldset>
                            <?php else: ?>
                                <input class="form-control" type="number" id="quantity-input-<?php echo e($ticket->id); ?>"
                                    value="0" oninput="updateLabel(<?php echo e($ticket->id); ?>, this.value)"
                                    data-index="<?php echo e($index + 1); ?>" data-harga="<?php echo e($ticket->harga); ?>"
                                    data-venue="<?php echo e($ticket->venue); ?>" name="total-input-venue[<?php echo e($ticket->id); ?>]"
                                    max="4" min="0">
                            <?php endif; ?>
                        </td>
                        <td>
                            <div id="demo-<?php echo e($ticket->id); ?>">Rp.0</div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <input type="hidden" id="valueHarga" name="totalHarga">
        <input type="hidden" id="valueBeli" name="totalJumlahBeli">
        <input type="hidden" id="valueVenue" name="totalVenue">
        <input type="hidden" id="valueId" name="totalId">
        <input type="hidden" id="valueJumlah" name="totalJumlah">
        <button type="submit" class="btn btn-primary">Accept</button>
        <div id="status"></div>
        <?php echo csrf_field(); ?>
    </form>

    <script>
        var myArray = [];
        var hargaValue = [];
        var totalVenue = [];
        var totalId = [];

        function updateLabel(id, value) {
            var output = document.getElementById("demo-" + id);
            var harga = document.getElementById("quantity-input-" + id).dataset.harga;
            var index = document.getElementById("quantity-input-" + id).dataset.index;
            var venue = document.getElementById("quantity-input-" + id).dataset.venue;

            if (value === "0" || value === "") {
                output.textContent = "Rp.0";
            } else {
                var total = parseInt(value) * harga;
                output.textContent = "Rp." + total.toLocaleString();
            }
            hargaValue[index] = total;
            myArray[index] = value;
            totalVenue[index] = venue;
            totalId[index] = id;
        }

        document.getElementById('myForm').addEventListener('submit', function(event) {
            var form = event.target;
            var outputHarga = document.getElementById("valueHarga");
            var outputBeli = document.getElementById("valueBeli");
            var outputVenue = document.getElementById("valueVenue");
            var outputId = document.getElementById("valueId");
            var outputJumlah = document.getElementById("valueJumlah");
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
            }
            if (sum <= 0) {
                staus.textContent = "Need More than 0";
                outputBeli.value = "";
                event.preventDefault()
            } else {
                outputHarga.value = sumHarga;
                outputBeli.value = sum;
                outputVenue.value = totalVenue;
                outputId.value = totalId;
                outputJumlah.value = myArray;
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/payment.blade.php ENDPATH**/ ?>