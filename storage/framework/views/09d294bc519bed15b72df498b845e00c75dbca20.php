<div class="modal fade" id="editeprov" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Editar Provincia</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-body">
          <form id="formEditProv" role="" action="" method="post">
              <?php echo e(csrf_field()); ?>

             <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                   <div class="form-group <?php echo e($errors->has('ponombre') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="ponombre">Nombre de Provincia</label>
                        <input type="text" class="form-control" id="name" maxlength="18" name="ponombre" required>
                       <?php if($errors->has('ponombre')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('ponombre', 'Ingrese un Nombre Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>       
                   <div class="form-group <?php echo e($errors->has('poregion') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="poregion">Numero de Provincia</label>
                        <input type="int" class="form-control" id="num" maxlength="2" name="poregion" required>
                       <?php if($errors->has('poregion')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('poregion', 'Ingrese un Numero Válido')); ?></strong>
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

