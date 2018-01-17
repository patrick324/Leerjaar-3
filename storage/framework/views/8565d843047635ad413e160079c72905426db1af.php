<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users
                           <div class="pull-right">
                              <a class="btn btn-secondary" href="<?php echo e(URL('/create')); ?>"> Create User</a>
                           </div>
                    </div>

                    <div class="pull-right">
                    </div>
                    <div class="panel-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="panel-body">
                            <?php echo e($user->name); ?>

                                <div class="pull-right">
                                    <a class="btn btn-primary" href="<?php echo e(route('update', ['id' => $user->id])); ?>"> Update</a>
                                    <a class="btn btn-danger" href="<?php echo e(url('delete', ['id' => $user->id])); ?>"> Delete</a>
                                </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>