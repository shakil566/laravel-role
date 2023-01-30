<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <h1 class="header margin-bottom-10">User Details </h1>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr class="center">
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if(!empty($targetArr)): ?>
                        <?php
                        $sl = 0;
                        ?>
                        <?php $__currentLoopData = $targetArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$sl); ?></td>
                                <td><?php echo e($target->name ?? ''); ?></td>
                                <td><?php echo e($target->email ?? ''); ?></td>
                                <td><?php echo e($target->role->title ?? ''); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">No User Found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php /**PATH F:\xampp\htdocs\LaravelRole\resources\views/layouts/frontend/include/userDetails.blade.php ENDPATH**/ ?>