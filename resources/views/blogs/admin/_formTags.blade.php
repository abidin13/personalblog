<div class="form-group {{ $errors->has('name') ? ' has-error':'' }}">
	{!! csrf_field() !!}
	<div class="col-md-12">
		{!! Form::label('name', 'Name', ['class'=>'']) !!}
		{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Name Tags','id'=>'name']) !!}
		{!! $errors->first('post_title','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group pull-right">
	<div class="col-md-6">
    	{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  	</div>
  	<div class="col-md-6">
  		<button type="button" onclick="goBack()" class="btn btn-default">Cancel</button>
  	</div>
</div>