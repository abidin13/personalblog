<div class="form-group {{ $errors->has('name') ? ' has-error':'' }}">
	<div class="col-md-12">
		{!! Form::label('title', 'Title', ['class'=>'']) !!}
		{!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Title','id'=>'title']) !!}
		{!! $errors->first('title','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group {{ $errors->has('tags') ? ' has-error':'' }}">
	<div class="col-md-12">
		{!! Form::label('tags', 'Tags', ['class'=>'']) !!}
		{!! Form::select('tags', ['1' => 'Programing', '2' => 'HTML', '3' => 'Css', '4' => 'Javascript'], null, ['class' => 'form-control chosen-select', 'placeholder' => '', 'multiple' => true]) !!}
		{!! $errors->first('tags','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group {{ $errors->has('content') ? ' has-error':'' }}">
	<div class="col-md-12">
		{!! Form::label('content', 'Content', ['class'=>'']) !!}
		{!! Form::textarea('content', null, ['class' => 'summernote', 'placeholder' => 'article']) !!}
		        <!-- <textarea name="article" class="summernote"></textarea> -->
		        <!-- <textarea name="article" class="summernote" placeholder="Article"></textarea> -->
	    {!! $errors->first('content','<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-12">
    	{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  	</div>
</div>