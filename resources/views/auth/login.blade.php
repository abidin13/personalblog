@extends('layouts.app')

@section('content')
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                <h1>Log in with your email account</h1>
                    {!! Form::open(['url'=>'admin/postlogin', 'autocomplete'=>'off', 'id'=>'login-form']) !!}
                    {!! Form::hidden('_token', csrf_token()) !!}
                    <div class="form-group{{ $errors->has('email') ? ' has-error': ''}}">
                        {!! Form::label('email', 'Email', ['class'=>'sr-only']) !!}
                        {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'somebody@example.com', 'id'=>'email','name'=>'email']) !!}
                        {!! $errors->first('email','<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error': ''}}">
                        {!! Form::label('key', 'Password', ['class'=>'sr-only']) !!}
                        {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Password', 'id'=>'password','name'=>'password']) !!}
                        {!! $errors->first('password','<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="checkbox">
                        <span class="character-checkbox" onclick="showPassword()"></span>
                        <span class="label">Show password</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-custom btn-lg btn-block">Login</button>
                    </div>
                    {!! Form::close() !!}
                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Recovery password</h4>
            </div>
            <div class="modal-body">
                <p>Type your email account</p>
                <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom">Recovery</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endsection
