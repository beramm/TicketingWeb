<?php $__env->startSection('container'); ?>
    
    <style>
        .carousel-control-next,
        .carousel-control-prev {
            background-color: rgba(0, 0, 0, 0.8);
            width: 50px;
            height: 50px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            transition: transform 0.5s ease-in-out;
            align-items: center;
            justify-content: center;
            top: 40%;
        }

        /* .carousel:hover .carousel-control-prev,
                                                .carousel:hover .carousel-control-next {
                                                    display: block;

                                                } */

        .carousel:hover .carousel-control-prev {
            transform: translateX(-50%);
        }

        .carousel:hover .carousel-control-next {
            transform: translateX(50%);
        }
    </style>
    <div class="main mt-5" style="height: 350px; max-height: 350px">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/pictCarousel1.jpg" class="d-block w-100" style="border-radius: 30px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/pictCarousel2.jpg" class="d-block w-100" style="border-radius: 30px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/pictCarousel3.jpg" class="d-block w-100" style="border-radius: 30px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $concerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 mb-4">
                    <a href="/concerts/<?php echo e($concert->id); ?>" class="text-decoration-none text-dark">
                        <div class="card rounded" style="width: 18rem;">
                            <img src="https://picsum.photos/id/<?php echo e(rand(1, 200)); ?>/100" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($concert->nama); ?></h5>
                                <p class="card-text text-muted"><?php echo e($concert->tanggal); ?></p>
                                <p class="card-text "><strong>
                                        Rp <?php echo e(number_format($concert->harga, 0, ',', '.')); ?>

                                    </strong>
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo e($concert->vendor); ?></li>
                            </ul>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/homepage.blade.php ENDPATH**/ ?>