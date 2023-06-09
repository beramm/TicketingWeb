<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="/css/homeStyles.css">


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

    <div class="container1">
        <div class="row">
            <div class="container">
                <h1 class="upcomming">Upcoming Concerts</h1>
                <?php $__currentLoopData = $concerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="item-right">
                            <h2 class="num"><?php echo e(date('d', strtotime($concert->tanggal))); ?></h2>
                            <p class="day"><?php echo e(date('M', strtotime($concert->tanggal))); ?></p>
                            <span class="up-border"></span>
                            <span class="down-border"></span>
                        </div> <!-- end item-right -->

                        <div class="item-left">
                            <p class="event"><?php echo e($concert->Categories->kategori); ?> Music</p>
                            <h2 class="title"><?php echo e($concert->nama); ?></h2>

                            <p class="card-text text-muted"><i class="fa fa-calendar"></i> <?php echo e($concert->tanggal); ?>

                                <br> <i class="fa fa-clock-o" style="margin-top: 7px"></i>
                                <?php echo e($concert->waktu); ?>

                                <br><i class="fa fa-map-marker" style="margin-top: 7px"></i>
                                <?php echo e($concert->tempat); ?>

                            </p>

                            <div class="fix"></div>
                            <a href="/concerts/<?php echo e($concert->id); ?>" class="text-decoration-none text-dark">
                                <button class="tickets">Tickets</button>
                            </a>
                        </div> <!-- end item-right -->
                    </div> <!-- end item -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/homepage.blade.php ENDPATH**/ ?>