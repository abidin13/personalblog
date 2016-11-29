<div class="form-group <?php echo e($errors->has('name') ? ' has-error':''); ?>">
	<?php echo csrf_field(); ?>

	<div class="col-md-12">
		<?php echo Form::label('post_title', 'Title', ['class'=>'']); ?>

		<?php echo Form::text('post_title', null, ['class'=>'form-control','placeholder'=>'Title','id'=>'title']); ?>

		<?php echo $errors->first('post_title','<p class="help-block">:message</p>'); ?>

	</div>
</div>
<div class="form-group <?php echo e($errors->has('tags') ? ' has-error':''); ?>">
	<div class="col-md-12">
		<?php echo Form::label('tags', 'Tags', ['class'=>'']); ?>

		<?php echo Form::select('tags[]', [''=>'']+App\Tags::lists('name','id')->all(), null, [ 'class'=>'form-control chosen-select', 'multiple']); ?>

		<?php /* <?php echo Form::select('tags', ['1' => 'Programing', '2' => 'HTML', '3' => 'Css', '4' => 'Javascript'], null, ['class' => 'form-control chosen-select', 'placeholder' => '', 'multiple' => true]); ?> */ ?>
		<?php echo $errors->first('tags','<p class="help-block">:message</p>'); ?>

	</div>
</div>

<div class="form-group<?php echo e($errors->has('post_image') ? ' has-error' : ''); ?>">
  <div class="col-md-12">
	<?php echo Form::label('post_image', 'Image', ['class'=>'']); ?>

    <?php echo Form::file('post_image'); ?>

    <?php if(isset($post) && $post->post_image): ?>
      <p>
      <?php echo Html::image(asset('img/cover/'.$post->post_image), null, ['class'=>'thumbnail img-rounded']); ?>

      </p>
    <?php endif; ?>
    <?php echo $errors->first('post_image', '<p class="help-block">:message</p>'); ?>

  </div>
</div>

<div class="form-group <?php echo e($errors->has('content') ? ' has-error':''); ?>">
	<div class="col-md-12">
		<?php echo Form::label('post_content', 'Content', ['class'=>'']); ?>

		<?php echo Form::textarea('post_content', null, ['class' => 'summernote', 'placeholder' => 'article']); ?>

	    <?php echo $errors->first('post_content','<p class="help-block">:message</p>'); ?>

	</div>
</div>

<div class="form-group <?php echo e($errors->has('name') ? ' has-error':''); ?>">
	<div class="col-md-12">
		<?php echo Form::label('updated_at', 'Auto Publish', ['class'=>'']); ?>

		<?php echo Form::date('updated_at', null, ['class'=>'form-control','placeholder'=>'Date','id'=>'title']); ?>

		<?php echo $errors->first('updated_at','<p class="help-block">:message</p>'); ?>

	</div>
</div>


<div class="form-group <?php echo e($errors->has('content') ? ' has-error':''); ?>">
	<div class="col-md-12">
	<?php if(isset($post) && $post->post_status == 0): ?>
		<?php echo Form::checkbox('post_status', '0', true); ?>

	<?php else: ?>
		<?php echo Form::checkbox('post_status', '0', false); ?>

	<?php endif; ?>
		<?php echo Form::label('post_status', 'Save As Draft ', ['class'=>'']); ?>

		<?php echo $errors->first('post_status','<p class="help-block">:message</p>'); ?>

	</div>	
</div>

<div class="form-group pull-right">
	<div class="col-md-6">
    	<?php echo Form::submit('Simpan', ['class'=>'btn btn-primary']); ?>

  	</div>
  	<div class="col-md-6">
  		<button type="button" onclick="goBack()" class="btn btn-default">Cancel</button>
  	</div>
</div>