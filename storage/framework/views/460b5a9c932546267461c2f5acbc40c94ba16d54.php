<?php echo Form::model($model,['url'=>$form_url,'method'=>'delete', 'class'=>'form-inline js-confirm','data-confirm' => $confirm_message]); ?>

	<a href="<?php echo e($edit_url); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> | 
	<?php echo Form::submit('Hapus',['class'=>'btn btn-xs btn-danger']); ?>	
<?php echo Form::close(); ?>