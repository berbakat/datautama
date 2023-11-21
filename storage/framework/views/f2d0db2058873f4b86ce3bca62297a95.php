<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Form Register</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container"><br>
            <div class="col-md-4 col-md-offset-4">
                <h2 class="text-center">Form Register</h2>
                <hr>
                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <b>Opps!</b> <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('saveregister')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required="">
                    </div>
					
					<div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required="">
                    </div>
					
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Save</button>

                    <hr>
                    <p class="text-center">Sudah punya akun? <a href="<?php echo e(route('login')); ?>">Login</a> sekarang!</p>
                </form>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\xampp\htdocs\data_utama\resources\views/register.blade.php ENDPATH**/ ?>