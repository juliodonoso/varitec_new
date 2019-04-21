<div class="modal fade" id="editcli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Editar Cliente</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-body">
          <form id="formEditCli" role="" action="" method="post">
              <?php echo e(csrf_field()); ?>

             <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                   <div class="form-group <?php echo e($errors->has('clRut') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="clRut">Rut</label>
                        <input type="text" class="form-control" id="rut" maxlength="9" name="clRut" required>
                       <?php if($errors->has('clRut')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('clRut', 'Ingrese un Rut Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>  

                   <div class="form-group <?php echo e($errors->has('clNombre') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="clNombre">Nombre</label>
                        <input type="text" class="form-control" id="name" maxlength="50" name="clNombre" required>
                       <?php if($errors->has('clNombre')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('clNombre', 'Ingrese un Nombre Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>  

                   <div class="form-group <?php echo e($errors->has('clDireccion') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="clDireccion">Direccion</label>
                        <input type="text" class="form-control" id="dir" maxlength="25" name="clDireccion" required>
                       <?php if($errors->has('clDireccion')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('clDireccion', 'Ingrese una Direccion Válida')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>    

                   <div class="form-group <?php echo e($errors->has('clComuna') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="clComuna">Comuna</label>
                        <input type="text" class="form-control" id="com" maxlength="20" name="clComuna" required>
                       <?php if($errors->has('clComuna')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('clComuna', 'Ingrese una Comuna Válida')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>    

                   <div class="form-group <?php echo e($errors->has('clCiudad') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="clCiudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciu" maxlength="15" name="clCiudad" required>
                       <?php if($errors->has('clCiudad')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('clCiudad', 'Ingrese una Ciudad Válida')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>                                                                                                

                   <div class="form-group <?php echo e($errors->has('clTelefono') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="clTelefono">Telefono</label>
                        <input type="text" class="form-control" id="tlf" maxlength="9" name="clTelefono" required>
                       <?php if($errors->has('clTelefono')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('clTelefono', 'Ingrese un Telefono Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>     

                   <div class="form-group <?php echo e($errors->has('clEmail') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="clEmail">E-mail</label>
                        <input type="text" class="form-control" id="mai" maxlength="25" name="clEmail" required>
                       <?php if($errors->has('clEmail')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('clEmail', 'Ingrese un E-mail Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>          

               <div class="modal-footer">   
                <button type="submit" class="btn btn-primary pull-left">Actualizar</button>
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button> 
               </div> 
          </form>
      </div>
  </div>
</div>

