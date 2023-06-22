

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 ">
            <h1>Visitor Credential Form</h1>
            <div class="mt-5">
                <form action="<?php echo e(route('postPayment/buyed')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <label for="visitors">Choose a visitor:</label>
                    <select class="form-select mb-5" name="visitors" id="visitors">
                        <?php $__currentLoopData = $user->visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <hr>
                    <p>Or Input Manually</p>
                    <input type="hidden" value="<?php echo e($jumlahBeli); ?>" name="jumlahBeli">
                    <input type="hidden" value="<?php echo e($hargaTotal); ?>" name="hargaTotal">
                    <input type="hidden" value="<?php echo e($barangVenue); ?>" name="barangVenue">
                    <input type="hidden" value="<?php echo e($totalId); ?>" name="totalId">
                    <input type="hidden" value="<?php echo e($totalJumlah); ?>" name="totalJumlah">


                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels" for="nama">Name</label>
                            <input type="text" id="nama" name="nama"
                                class="form-control  <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels" for="nik">NIK</label>
                            <input type="number" inputmode="numeric"
                                class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nik" name="nik"
                                required>
                        </div>

                        <div class="col-md-12">
                            <label class="labels" for="telepon">No Telepon</label>
                            <input type="telepon" inputmode="numeric"
                                class="form-control <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telepon" name="telepon"
                                required>
                        </div>

                        <div class="col-md-12">
                            <label class="labels" for="kelahiran">Kelahiran</label>
                            <input type="date" class="form-control <?php $__errorArgs = ['kelahiran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="kelahiran" name="kelahiran" required>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Data</button></div>
                </form>
            </div>

        </div>
    </div>
    <script>
        const visitorsDropdown = document.querySelector("#visitors");
        const nama = document.getElementById("nama");
        const nik = document.getElementById("nik");
        const telp = document.getElementById("telepon");
        const kelahiran = document.getElementById("kelahiran");

        visitorsDropdown.addEventListener("click", function() {
            const selectedOption = this.options[this.selectedIndex];

            nama.value = selectedOption.text;
            console.log(nama);

            const id = selectedOption.value;

            fetch('/profile/visitors/input?id=' + id)
                .then(response => response.json())
                .then(data => {
                    // Update the input fields with the retrieved data
                    console.log(data.nama);
                    nama.value = data.nama;
                    nik.value = data.nik;
                    telp.value = data.telepon;
                    kelahiran.value = data.kelahiran;
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/buy1.blade.php ENDPATH**/ ?>