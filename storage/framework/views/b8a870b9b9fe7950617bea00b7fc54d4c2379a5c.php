<?php if ( ! ($column->isEmpty())): ?>
    <ul class="category-tree">
        <?php foreach($column as $column): ?>
            <li>
                <span class="actions">
                    <a href="<?php echo e(route('admin.column.edit', [ $column->getKey() ])); ?>" title="编辑栏目">
                        修改<span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="<?php echo e(route('admin.column.create', [ 'parent_id' => $column->getKey() ])); ?>" title="添加栏目">
                        添加<span class="glyphicon glyphicon-plus"></span>
                    </a>
                </span>
                <a href="<?php echo e(route('admin.column.show', [ $column->getKey() ])); ?>" class="title">
                    <?php echo e($column->title); ?>

                </a>
                <?php echo $__env->make('admin.column.partials.tree', [ 'column' => $column->children ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>