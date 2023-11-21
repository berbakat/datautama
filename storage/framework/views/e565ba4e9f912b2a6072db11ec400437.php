<?php $__env->startSection('konten'); ?>
    <h4>
        Selamat Datang 
        <b><?php echo e(Auth::user()->name); ?></b>, 
        Anda Login sebagai 
        <b><?php echo e(Auth::user()->role); ?></b>
    </h4>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\data_utama\resources\views/home.blade.php ENDPATH**/ ?>