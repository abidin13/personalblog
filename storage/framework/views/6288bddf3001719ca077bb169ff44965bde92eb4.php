<?php $__env->startSection('content'); ?>
	<header class="clearfix">
		<h2 class="page_title pull-left">Create Tags</h2>
	</header>
	<div class="content-inner">
		<div class="row">
			<div class="col-md-12">
                <?php echo Form::open(['url' => route('blog.admin.tags.store'), 'method' => 'post', 'files'=>'true' ,'class' => 'form-horizontal']); ?>

    				<?php echo $__env->make('blogs.admin._formTags', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<<<<<<< HEAD
=======
<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		function goBack() {
    		window.history.back();
		}
	</script>
<?php $__env->stopSection(); ?>
>>>>>>> master

<?php echo $__env->make('layouts.adminblog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>