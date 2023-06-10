

<?php $__env->startSection('container'); ?>
    
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">

                <a href="/dashboard/concerts" class="btn btn-success">
                    Back To Previous Page <span data-feather="arrow-left"></span>
                </a>

                <a href="" class="btn btn-warning">
                    Edit <span data-feather="edit"></span>
                </a>

                <a href="" class="btn btn-danger">
                    Delete <span data-feather="x-circle"></span>
                </a>
            </div>
        </div>
    </div>
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
                        
                    </li>
                </ul>
            </div>
            <div class="py-3 px-3 mt-4 d-flex justify-content-center rounded"
                style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
                <a href="/concerts/buy/<?php echo e($concert->id); ?>">
                    <button type="button" class="btn btn-dark " style="width: 100%;position: sticky; top: 0">Beli
                        Tiket</button>
                </a>
            </div>

        </div>
        <div class="terms col-md-8">
            <h2> Terms & Condition</h2>
            <hr>
            <?php echo $concert->terms; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/dashboard/concerts/show.blade.php ENDPATH**/ ?>