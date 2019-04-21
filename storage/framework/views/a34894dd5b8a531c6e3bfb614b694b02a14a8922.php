<div class="modal fade" id="editeBod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Editar Bodega</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-body">
          <form id="formEditbod" role="" action="" method="post">
              <?php echo e(csrf_field()); ?>

             <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                   <div class="form-group <?php echo e($errors->has('bgNombre') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="bgNombre">Nombre</label>
                        <input type="text" class="form-control" id="name" maxlength="50" name="bgNombre" required>
                       <?php if($errors->has('bgNombre')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('bgNombre', 'Ingrese un Nombre Válido')); ?></strong>
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

