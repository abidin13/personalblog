{!! Form::model($model,['url'=>$form_url,'method'=>'delete', 'class'=>'form-inline js-confirm','data-confirm' => $confirm_message]) !!}
	<a href="{{ $edit_url }}" class="btn btn-xs btn-default"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> 
	{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-danger']) !!}	
{!! Form::close() !!}