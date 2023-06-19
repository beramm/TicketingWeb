<?php $__env->startSection('container'); ?>
    <div class="row pb-5 mb-4">
        <div class="col-md-8">
            <img src="/img/<?php echo e($concert->pict); ?>" class="img-fluid rounded" alt="Image"
                style="height: 270px;width: 850px;object-fit: cover">
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 100%;background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4); ">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($concert->nama); ?></h5>
                    <p class="card-text text-muted"><i class="fa fa-calendar"></i> <?php echo e($concert->tanggal); ?></p>
                    <p class="card-text text-muted">
                        <i class="fa fa-clock-o"></i> <?php echo e($concert->waktu); ?>

                    </p>
                    <p class="card-text text-muted"><i class="fa fa-map-marker"></i>
                        <?php echo e($concert->tempat); ?></p>
                    <p class="card-text"> Rp <?php echo e(number_format($concert->harga, 0, ',', '.')); ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="card-text text-muted">Diselenggarakan oleh <?php echo e($concert->vendors->nama); ?>

                        </p>
                    </li>
                </ul>
            </div>
            <div class="py-3 px-3 mt-4 d-flex justify-content-center rounded"
                style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
                <?php if(auth()->guard()->check()): ?>
                    <a href="/concerts/<?php echo e($concert->id); ?>/payment">
                        <button type="button" class="btn btn-dark " style="width: 100%;position: sticky; top: 0">Beli
                            Tiket</button>
                    </a>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>">
                        <button type="button" class="btn btn-dark " style="width: 100%;position: sticky; top: 0">Beli
                            Tiket</button>
                    </a>
                <?php endif; ?>
            </div>

        </div>
        <div class="terms col-md-8">
            <h2> Terms & Condition</h2>
            <hr>
            <?php echo $concert->terms; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/concert.blade.php ENDPATH**/ ?>