<?php $__env->startSection('content'); ?>
	<header class="clearfix">
		<h2 class="page_title pull-left">View Article</h2>
		<a href="<?php echo e(route('blog.admin.tags.create')); ?>" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> New Tags</a>
	</header>
	<div class="content-inner">
		<div class="row">
			<div class="col-md-12">
				<?php echo $html->table(['class'=>'table-striped']); ?>

			</div>
		</div>	
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<?php echo $html->scripts(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminblog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>