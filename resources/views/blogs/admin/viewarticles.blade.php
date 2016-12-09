@extends('layouts.adminblog')
@section('content')
	<header class="clearfix">
		<h2 class="page_title pull-left">View Article</h2>
		<a href="{{ route('blog.admin.articles.create')}}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> New Article</a>
	</header>
	<div class="content-inner">
		<div class="row">
			<div class="col-md-12">
				{!! $html->table(['class'=>'table-striped']) !!}
			</div>
		</div>	
	</div>
@endsection
@section('scripts')
	{!! $html->scripts() !!}
@endsection