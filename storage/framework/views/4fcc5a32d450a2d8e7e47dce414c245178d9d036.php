<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>
<div class="container">


	<br/>
	<a href="<?php echo e(route('pdfview',['download'=>'pdf'])); ?>">Download PDF</a>


	<table>
		<tr>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
		</tr>
		<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e(++$key); ?></td>
			<td><?php echo e($item->title); ?></td>
			<td><?php echo e($item->description); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
</div>