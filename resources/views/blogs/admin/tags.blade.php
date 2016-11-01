@extends('layouts.adminblog')
@section('content')
	<header class="clearfix">
		<h2 class="page_title pull-left">Create Tags</h2>
	</header>
	<div class="content-inner">
		<div class="row">
			<div class="col-md-12">
                {!! Form::open(['url' => route('blog.admin.tags.store'), 'method' => 'post', 'files'=>'true' ,'class' => 'form-horizontal']) !!}
    				@include('blogs.admin._formTags')
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop
