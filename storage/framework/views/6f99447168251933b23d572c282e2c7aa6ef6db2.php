<p class="text-muted">显示 <?php echo e(($result->currentPage()-1)*$result->perPage()); ?> - <?php echo e($result->currentPage()*$result->perPage()); ?>, 总计 <?php echo e($result->total()); ?> </p>