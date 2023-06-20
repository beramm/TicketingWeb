

<?php $__env->startSection('container'); ?>
    
    <link rel="stylesheet" href="/css/visitors.css">
    <?php if(session()->has('success')): ?>
        <div class="alert alert-primary col-lg-8" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <?php $__currentLoopData = $visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            <img src="/img/user.png" class="img-radius" style="width: 80px"
                                                alt="User-Profile-Image">
                                        </div>
                                        <p> Action</p>
                                        <a href="/profile/visitors/<?php echo e($visitor->id); ?>/edit" class="badge bg-warning">
                                            <span data-feather="edit">
                                            </span>
                                        </a>

                                        <form action="/profile/visitors/<?php echo e($visitor->id); ?>" method="POST"
                                            class="d-inline">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Delete this visitor ?')"><span
                                                    data-feather="x-circle">
                                                </span></button>
                                        </form>

                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Nama</p>
                                                <h6 class="text-muted f-w-400"><?php echo e($visitor->nama); ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">No Telepon</p>
                                                <h6 class="text-muted f-w-400"><?php echo e($visitor->telepon); ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Nik</p>
                                                <h6 class="text-muted f-w-400"><?php echo e($visitor->nik); ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Kelahiran</p>
                                                <h6 class="text-muted f-w-400"><?php echo e($visitor->kelahiran); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\app\TicketingWeb\Ticketing\resources\views/profile/visitors/index.blade.php ENDPATH**/ ?>