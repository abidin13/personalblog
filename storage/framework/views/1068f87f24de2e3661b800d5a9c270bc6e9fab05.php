<?php $__env->startSection('content'); ?>
	<header class="clearfix">
		<h2 class="page_title pull-left">Create Article</h2>
	</header>
	<div class="content-inner">
		<div class="row">
			<div class="col-md-12">
                <?php echo Form::open(['url' => route('blog.admin.articles.store'), 'method' => 'post', 'files'=>'true' ,'class' => 'form-horizontal']); ?>

    				<?php echo $__env->make('blogs.admin._formArticle', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
        var config = {
            '.chosen-select' : {},
            '.chosen-select-deselect' : {allow_single_deselect: true},
            '.chosen-select-no-single' : {disable_search_threshold: 10},
            '.chosen-select-no-result' : {no_result_text: 'Opps, Nothing Found'},
            '.chosen-select-width' : {width:"95%"}
        }

        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>
    <script type="text/javascript">
        $('.summernote').summernote({
            height:200
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminblog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>