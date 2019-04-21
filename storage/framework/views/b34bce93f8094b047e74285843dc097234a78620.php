

<?php $__env->startSection('content'); ?>

<div class="content" >
  <div class="container-fluid"">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Cambio de Contraseña</h4>
                    <p class="category">Cambio de Contraseña para el ingreso al Sistema.</p>
                </div>
                <div class="card-content">
                    <div class="col-md-5 col-md-offset-3"> 
                        <form action="<?php echo e(route('config.updatepass')); ?>"  method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group <?php echo e($errors->has('rut') ? ' has-error' : ''); ?>"> 
                                <label for="pass1" class="form-control">Nueva Clave</label>
                                <input type="text" class="form-control" id="pass1" name="pass1" maxlength="10">
                                <?php if($errors->has('pass1')): ?>
                                <span class="help-block">
                                   <strong><?php echo e($errors->first('pass1', 'Ingrese una Contraseña Válida')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group <?php echo e($errors->has('rut') ? ' has-error' : ''); ?>"> 
                                <label for="pass2" class="form-control">Nueva Clave</label>
                                <input type="text" class="form-control" id="pass2" name="pass2" maxlength="10">
                                <?php if($errors->has('pass1')): ?>
                                <span class="help-block">
                                   <strong><?php echo e($errors->first('pass2', 'Ingrese una Contraseña Válida')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary pull-left">Actualizar</button>
                               <button type="button" class="btn btn-secondary pull-left">Cancelar</button> 
                            </div>
                        </form>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</div>
  <!-- /.col-md-5 -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>