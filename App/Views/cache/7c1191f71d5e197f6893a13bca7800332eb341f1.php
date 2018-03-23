<?php $__env->startSection('content'); ?>

      <!-- Example row of columns -->
	  <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row">
        <div class="col-md-12">
          <h2><?php echo e($post->title); ?></h2>
          <p><?php echo $post->post; ?></p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  <?php echo $paginator; ?>

<?php $__env->stopSection(); ?>
	  

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>