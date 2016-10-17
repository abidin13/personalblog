<?php $__env->startSection('content'); ?>
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <?php foreach($post as $potss): ?>  
            <div class="post-preview">
                <a href="<?php echo e(route('blog.shows.show', $potss->id)); ?>">
                    <h2 class="post-title">
                        <?php echo e($potss->post_title); ?>

                    </h2>
                    <h3 class="post-subtitle">
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#"><?php echo e($potss->users->name); ?></a> <?php echo e($potss->updated_at->toFormattedDateString()); ?> </p>
            </div>
            <hr>
        <?php endforeach; ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="<?php echo e($post->nextPageUrl()); ?>">Older Posts &rarr;</a>
                        <a href="<?php echo e($post->previousPageUrl()); ?>">&larr; News't Posts </a>
                    </li>
                </ul>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appblog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>