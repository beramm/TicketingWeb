<?php $__env->startSection('container'); ?>
    <form action="<?php echo e(route('postPayment/buyed')); ?>" method="POST" id="myForm">
        


            <input type="hidden" value="<?php echo e($jumlahBeli); ?>" name="jumlahBeli">
        <input type="hidden" value="<?php echo e($hargaTotal); ?>" name="hargaTotal">
        <input type="hidden" value="<?php echo e($barangVenue); ?>" name="barangVenue">
        <input type="hidden" value="<?php echo e($totalId); ?>" name="totalId">
        <input type="hidden" value="<?php echo e($totalJumlah); ?>" name="totalJumlah">
        <h1>Simpan data Pengunjung</h1>
        <p>Untuk dipilih saat memesan nanti supaya proses pemesananmu jadi lebih cepat dan simpel.</p>

        <div class="text-center">
            <h3>Insert data</h3>
            <?php echo csrf_field(); ?>
            <input type="text" class="form-control mb-2" id="inputNama" placeholder="Nama" name="nama">
            <input type="number" class="form-control mb-2" id="inputNik" placeholder="NIK" name="nik">
            <input type="tel" class="form-control mb-2" id="inputTel" placeholder="Telephone" name="telepon">
            <input type="date" class="form-control mb-2" id="inputBirth" placeholder="Kelahiran" name="kelahiran">
            <div id="status"></div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            <h3>or already have</h3>
        </div>

        <input type="text" class="form-control mb-2" id="searchInput" placeholder="Search by visitor name">
        <div id="visitorList">
            <?php $__currentLoopData = $user->visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row justify-content-center align-items-center g-2">
                    <button type="submit" class="btn btn-primary mb-2"
                        onclick="selectButton(<?php echo e($data->id); ?>)"><?php echo e($data->nama); ?></button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <input type="hidden" name="idVisitor" id="savedId">

            <script>
                function selectButton(id) {
                    var outputId = document.getElementById('savedId');
                    outputId.value = id;
                }

                document.getElementById('myForm').addEventListener('submit', function(event) {
                    var inputNama = document.getElementById('inputNama').value.toLowerCase();
                    var status = document.getElementById('status');

                    <?php $__currentLoopData = $user->visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        var visitorName = "<?php echo e(strtolower($data->nama)); ?>";
                        if (inputNama === visitorName) {
                            status.textContent = "Already have the data!";
                            event.preventDefault();
                            return;
                        }
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                });

                document.getElementById('searchInput').addEventListener('input', function(event) {
                    var searchQuery = event.target.value.toLowerCase();
                    var visitorList = document.getElementById('visitorList');
                    var visitors = visitorList.getElementsByClassName('visitor-button');

                    for (var i = 0; i < visitors.length; i++) {
                        var visitorName = visitors[i].textContent.toLowerCase();
                        if (visitorName.includes(searchQuery)) {
                            visitors[i].style.display = 'inline-block';
                        } else {
                            visitors[i].style.display = 'none';
                        }
                    }
                });
            </script>
            
            <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/buy.blade.php ENDPATH**/ ?>