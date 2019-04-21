<?php if(session('msg-success')): ?>
<div class="alert alert-success alert-dismissible text-center" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close" >
		<span aria-hidden="true">&times;</span>
	</button>
	<?php echo e(session('msg-success')); ?>
</div>
<?php endif; ?>

<?php if(session('msg-error')): ?>
<div class="alert alert-danger alert-dismissible text-center" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<?php echo e(session('msg-error')); ?>
</div>
<?php endif; ?>
