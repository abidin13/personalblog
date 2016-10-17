<?php $__env->startSection('content'); ?>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                <h1>Log in with your email account</h1>
                    <?php echo Form::open(['url'=>'blog/admin/postlogin', 'autocomplete'=>'off', 'id'=>'login-form']); ?>

                    <?php echo Form::hidden('_token', csrf_token()); ?>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error': ''); ?>">
                        <?php echo Form::label('email', 'Email', ['class'=>'sr-only']); ?>

                        <?php echo Form::email('email', null, ['class'=>'form-control','placeholder'=>'somebody@example.com', 'id'=>'email','name'=>'email']); ?>

                        <?php echo $errors->first('email','<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error': ''); ?>">
                        <?php echo Form::label('key', 'Password', ['class'=>'sr-only']); ?>

                        <?php echo Form::password('password', ['class'=>'form-control','placeholder'=>'Password', 'id'=>'password','name'=>'password']); ?>

                        <?php echo $errors->first('password','<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="checkbox">
                        <span class="character-checkbox" onclick="showPassword()"></span>
                        <span class="label">Show password</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-custom btn-lg btn-block">Login</button>
                    </div>
                    <?php echo Form::close(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>