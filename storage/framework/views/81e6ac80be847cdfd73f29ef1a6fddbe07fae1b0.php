<div class="form-group <?php echo e($errors->has('name') ? ' has-error':''); ?>">
	<?php echo csrf_field(); ?>

	<div class="col-md-12">
		<?php echo Form::label('name', 'Name', ['class'=>'']); ?>

		<?php echo Form::text('name', null, ['class'=>'form-control','placeholder'=>'Name Tags','id'=>'name']); ?>

		<?php echo $errors->first('post_title','<p class="help-block">:message</p>'); ?>

	</div>
</div>
<<<<<<< HEAD
<div class="form-group">
	<div class="col-md-12">
    	<?php echo Form::submit('Simpan', ['class'=>'btn btn-primary']); ?>

  	</div>
=======
<div class="form-group pull-right">
	<div class="col-md-6">
    	<?php echo Form::submit('Simpan', ['class'=>'btn btn-primary']); ?>

  	</div>
  	<div class="col-md-6">
  		<button type="button" onclick="goBack()" class="btn btn-default">Cancel</button>
  	</div>
>>>>>>> master
</div>