<?php if ( ! ($column->isEmpty())): ?>
    <?php foreach($column as $column): ?>
        <li style="padding-left: 20px;">
            <a href="<?php echo e(url('/column/'.$column->getKey())); ?>" class="title"><?php echo e($column->title); ?></a>
            <?php echo $__env->make('skin.layouts.column', [ 'column' => $column->children ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </li>
    <?php endforeach; ?>
<?php endif; ?>