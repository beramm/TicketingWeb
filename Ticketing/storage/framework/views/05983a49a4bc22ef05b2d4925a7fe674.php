

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">EDit Category</h1>
    </div>
    <div class="col-lg-8 mb-5">
        <form method="POST" action="/dashboard/categories/<?php echo e($category->slug); ?>">
            <?php echo method_field('put'); ?>
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="kategori"
                    name="kategori" required autofocus value="<?php echo e(old('kategori', $category->kategori)); ?>">
                <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control " id="slug" name="slug" readonly required
                    value="<?php echo e(old('slug', $category->slug)); ?>">

            </div>
            <button type="submit" class="btn btn-primary">Edit Category</button>
        </form>

    </div>
    <script>
        const kategori = document.querySelector('#kategori');
        const slugs = document.querySelector('#slug');


        kategori.addEventListener('change', function() {

            fetch('/dashboard/categories/checkSlug?kategori=' + kategori.value)
                .then(response => response.json())
                .then(data => slugs.value = data.slug)
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/dashboard/categories/edit.blade.php ENDPATH**/ ?>